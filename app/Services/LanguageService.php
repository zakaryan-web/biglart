<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Collection;
use LaravelLang\Translator\Facades\Translate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use App\Facades\Setting;
use App\Models\Language;
use App\Models\LanguageFields;
use App\Models\LanguageString;

class LanguageService
{
    private string|null $defaultLanguage;
    private string|null $siteLanguage;
    private string|null $userLanguage;
    private string $thisLanguage;
    private Collection $Languages;
    private Collection $Fields;
    private Collection $Strings;

    public function __construct(Request $request)
    {
        $this->loadLanguages();
        $this->loadFields();

        $this->defaultLanguage = Config::get('app.locale') ?? null;
        $this->siteLanguage = Setting::get('global.language', null);
        $this->userLanguage = $request->user() ? $request->user()->language : $request->cookie('language', null);
        $this->thisLanguage = match (true) {
            $this->Languages->contains('key', $this->userLanguage) => $this->userLanguage,
            $this->Languages->contains('key', $this->siteLanguage) => $this->siteLanguage,
            $this->Languages->contains('key', $this->defaultLanguage) => $this->defaultLanguage,
            default => 'ru',
        };

        $this->loadStrings();
    }

    public function get($Key, $Condition = null, $Data = null): string
    {
        $field = match ($this->Fields->contains('key', $Key)) {
            true => $this->Fields->firstWhere('key', '=', $Key),
            false => $this->set($Key),
        };

        if(!$this->Strings->contains('field_id', $field->id)){
            return $this->getLocalizationString(($field->default_value ?? $Key), $Condition, $Data);
        }

        return $this->getLocalizationString($this->Strings->firstWhere('field_id', $field->id)->value, $Condition, $Data);
    }

    public function set ($Key, $default = null, $description = null){
        $field = match ($this->Fields->contains('key', $Key)) {
            true => $this->update($Key, $default, $description),
            false => $this->create($Key, $default, $description),
        };
        $this->loadFields();
        return $field;
    }

    private function update ($Key, $default = null, $description = null) {
        return match ($this->Fields->contains('key', $Key)) {
            true => function () use ($Key, $default, $description) {
                $field = $this->Fields->firstWhere('key', '=', $Key);
                if($description !== null) $field->description = $description;
                if($default !== null) $field->default_value = $default;
                $field->save();
                return $field;
            },
            false => $this->create($Key, $default, $description),
        };
    }

    private function create ($Key, $default = null, $description = null) {
        return LanguageFields::create([
            "key" => $Key,
            "description" => $description,
            "default_value" => $default
        ]);
    }

    public function translateText($text)
    {
        if($this->thisLanguage != 'ru'){
            $key = md5('translate_'.$this->thisLanguage.'_'.$text);
            $text = Cache::has($key) ? Cache::get($key) : Translate::text($text, $this->thisLanguage);
            Cache::add($key, $text);
        }

        return $text;
    }

    public function getThisLanguage()
    {
        return $this->thisLanguage;
    }

    public function getLanguages(): Collection
    {
        return $this->Languages;
    }

    public function getFields(): Collection
    {
        return $this->Fields;
    }

    public function getStrings(): Collection
    {
        return $this->Strings;
    }

    public function setLanguage($Language): void
    {
        if($Language != $this->thisLanguage){
            $this->thisLanguage = $Language;
            cookie('language', $Language);
            App::setLocale($this->thisLanguage);
            if(Auth::check()){
                Auth::user()->update(['language' => $Language]);
            }
            $this->loadStrings();
        }
    }

    private function loadLanguages(): void
    {
        $this->Languages = Language::select(['key', 'name'])->where([['status', 1]])->get();
    }

    private function loadFields(): void
    {
        $this->Fields = LanguageFields::select(['id', 'key', 'description', 'default_value'])->get();
    }

    private function loadStrings(): void
    {
        $this->Strings = LanguageString::select(['id', 'language', 'field_id', 'value'])->where('language', $this->thisLanguage)->whereHas('language', function (Builder $query) {
            $query->where('status', 1);
        })->has('field')->get();
    }

    private function getLocalizationString($Text, $Condition = null, $Data = null): string
    {
        return match (true) {
            is_array($Data) => trans_choice($Text, $Condition, $Data),
            is_numeric($Condition) => trans_choice($Text, $Condition),
            is_array($Condition) => trans($Text, $Condition),
            default => trans($Text),
        };
    }
}
