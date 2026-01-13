<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Files\deleteFileRequest;
use App\Http\Requests\User\Files\uploadFileRequest;
use App\Models\Documents;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
    public function index()
    {
        return $this->vUser('files/index', ['User\FilesController' => true]);
    }

    public function upload(uploadFileRequest $request) {
        $file = $request->file('file')->store('users/'.$request->user()->id.'/files', [
            'disk' => 'public'
        ]);
        return response()->json([
            'success' => true,
            'file' => Documents::create([
                'user_id' => $request->user()->id,
                'directory_id' => $request->get('id', null),
                'file' => $file,
                'url' => Storage::url($file),
                'name' => $request->file('file')->getClientOriginalName(),
                'extension' => $request->file('file')->extension(),
                'mimetype' => $request->file('file')->getMimeType(),
                'status' => 1,
            ])
        ]);
    }

    public function delete(deleteFileRequest $request) {
        return response()->json([
            'success' => Documents::where([
                ['id', $request->get('id')],
                ['user_id', $request->user()->id]
            ])->delete()
        ]);
    }
}
