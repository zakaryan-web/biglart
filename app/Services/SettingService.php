<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Collection;

class SettingService
{
    private Collection $Items;
    public function __construct()
    {
        $this->Items = Setting::all();
    }

    public function get ($Key, $default = false){
        return $this->Items->contains($Key) ? $this->Items->find($Key)->value : ($default !== false ? $default : null);
    }

    public function getAll (): Collection
    {
        return $this->Items->pluck('value', 'key');
    }

    public function set ($Key, $Value){
        return $this->Items->contains($Key) ? $this->update($Key, $Value) : $this->create($Key, $Value);
    }

    private function update ($Key, $Value) {
        $this->Items->find($Key)->update(['value' => $Value]);
        return $this->get($Key);
    }

    private function create ($Key, $Value) {
        $this->Items->push(Setting::create([
            "key" => $Key,
            "value" => $Value
        ]));
        return $this->get($Key);
    }
}
