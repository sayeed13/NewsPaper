<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Image;

class GalleryController extends Controller
{
    public function PhotoGallery()
    {
        $photo = DB::table('photos')->orderBy('id', 'desc')->paginate('5');
        return view('backend.gallery.photos', compact('photo'));
    }

    public function addPhotoGallery()
    {
        return view('backend.gallery.addphotos');
    }

    public function storePhotoGallery(Request $request)
    {

        $request->validate([
            'photo' => 'required|image',
            'photo_type' => 'required|integer',
            'title' => 'required|max:255',
        ]);

        $data = array();
        $data['photo_type'] = $request->photo_type;
        $data['title'] = $request->title;

        //Image Rename
        $image_rename = uniqid() . '-' . $request->photo->getClientOriginalName();

        //Store File
        $request->photo->storeAs('public/image', $image_rename);

        // Use File
        $data['photo'] = $image_rename;

        DB::table('photos')->insert($data);

        return Redirect()->route('gallery.photo');
    }


    public function deletePhotoGallery($id)
    {
        DB::table('photos')->where('id', $id)->delete();

        return Redirect()->route('gallery.photo');
    }
}
