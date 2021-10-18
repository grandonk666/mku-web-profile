<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Matakuliah;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    public function add_attachment(Request $request)
    {
        if (!$request->hasFile('file')) {
            return response("file does not exists", 400);
        }

        $attachment = $request->file('file')->store("attachment");

        if ($request->model_type) {
            if ($request->model_type == 'post') {
                $post = Post::find($request->model_id);
                $post->attachments()->create([
                    'filename' => $attachment
                ]);
            } elseif ($request->model_type == 'matakuliah') {
                $matakuliah = Matakuliah::find($request->model_id);
                $matakuliah->attachments()->create([
                    'filename' => $attachment
                ]);
            }
        }

        return response()->json([
            'url' => asset("storage/" . $attachment),
            'filename' => $attachment
        ], 200);
    }

    public function remove_attachment(Request $request)
    {
        if (!$request->image) {
            return response("infalid file name", 400);
        }
        if (!Storage::exists($request->image)) {
            return response("file does not exists", 400);
        }

        Storage::delete($request->image);

        if ($request->model_type) {
            if ($request->model_type == 'post') {
                $post = Post::find($request->model_id);
                $post->attachments()->firstWhere('filename', $request->image)->delete();
            } elseif ($request->model_type == 'matakuliah') {
                $matakuliah = Matakuliah::find($request->model_id);
                $matakuliah->attachments()->firstWhere('filename', $request->image)->delete();
            }
        }

        return response()->json(["filename" => $request->image], 200);
    }
}
