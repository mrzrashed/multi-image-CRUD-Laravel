<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MultipleUploadController extends Controller
{
    function index()
    {
        return view('image');
    }

    function upload(Request $request)
    {
        $image_code = array();
        $images = $request->file('file');
        foreach ($images as $key => $image) {
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $image_code[$key] = $new_name;
        }

        $output = implode(",", $image_code);
        DB::table('images')->insert(
            ['image' => $output]
        );

        // Ridirect to all image page
        return redirect()->route('view');

    }

    function view()
    {
        $image = array();
        $data = Image::all('image');
        $image = array();
        foreach ($data as $key=>$value) {
            $image[$key] = $value->image;
        }
        return view('welcome', compact('image'));
    }

    function delete($img)
    {
        // search the existing Image
        $data = Image::all('image');
        $image = array();
        foreach ($data as $key => $value) {
            $image = $value->image;
        }
        $var = explode(",", $image);
        $key = array_search($img, $var);
        // delete the image
        unset($var[$key]);
        $output = implode(",", $var);
        DB::table('images')->where('image', $image)->update(['image' => $output]);
        // delete from stroage
        unlink(public_path('images' . '\\' . $img));
        return back();
    }

    function edit($img)
    {
        return view('view', compact('img'));
    }

    function update(Request $request)
    {
        // search the existing Image
        $img = $request->img;
        $data = Image::all('image');
        $allImage = array();
        foreach ($data as $key => $value) {
            $allImage = $value->image;
        }

        $var = explode(",", $allImage);
        $key = array_search($img, $var);

        // Update the image and unlink privious one
        $image = $request->file;
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $var[$key] = $new_name;
        $output = implode(",", $var);
        DB::table('images')->where('image', $allImage)->update(['image' => $output]);
        unlink(public_path('images' . '\\' . $img));

        // reload the page with new image
        $img =  $new_name;
        return view('view', compact('img'));
    }
}
