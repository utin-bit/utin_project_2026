<?php

namespace App\Http\Controllers;

use App\Models\DocumentationFile;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DocumentationFileController extends Controller
{
    //
    public function index()
    {
        $files = DocumentationFile::latest()->get();
        return view('documentation', compact('files'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'attachment' => 'required|mimes:jpg,jpeg,png,gif,webp,pdf,doc,docx,xls,xlsx,ppt,pptx,txt,csv|max:5120',
        ]);

        $file = $request->file('attachment');
        $extension = strtolower($file->getClientOriginalExtension());

        $folder = Str::startsWith($file->getMimeType(), 'image/') ? 'image' : 'document';
        $path = $file->store($folder, 'public');

        DocumentationFile::create([
            'title' => $request->title,
            'file_path' => $path,
            'file_type' => $extension,
        ]);

        return redirect()->back()->with('success', 'File berhasil diunggah!');
    }
}
