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



        // * easy method
        $myFile =  $request->file("file")->store("images", "public");


        File::create([
            "images" => $myFile
        ]);

        return back()->with("success", "image  stored   successfully ");
    }



    public function update(Request $request, File $file)
    {

    // dd($request->all());
        request()->validate([
            "file" => "file|mimes:png,jpg|max:2048"
        ]);

        $path = $file->images;
        $storage = Storage::disk("public");
        // dd($storage);

        if ($storage->exists($path)) {
            $storage->delete($path);
            $newFile = request()->file('file')->store("images", "public");

            $file->update([
                "images" => $newFile
            ]);
        }

        return back();
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
