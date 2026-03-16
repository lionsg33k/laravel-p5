<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //


    public function index()
    {

        // $images =  File::where("images")->get();
        $images =  File::all();

        // dd($images);
        return view("files.images", compact("images"));
    }

    public function store(Request $request)
    {

        request()->validate([
            "file" => "file|mimes:png,jpg|max:2048"
        ]);


        $myFile =  $request->file("file")->store("images", "public");


        // dd($myFile);

        File::create([
            "images" => $myFile
        ]);

        return back()->with("success", "image  stored   successfully ");
    }




    public function destroy(File $file)
    {


        $path = $file->images;
        $storage = Storage::disk("public");
        // dd($storage);

        if ($storage->exists($path)) {
            $storage->delete($path);
            
            $file->delete();
        }

        return back();
    }
}
