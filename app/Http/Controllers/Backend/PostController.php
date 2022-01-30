<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\District;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\Subdistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::join('categories', 'posts.category_id', 'categories.id')
            ->join('districts', 'posts.district_id', 'districts.id')
            ->select('posts.*', 'categories.cat_name', 'districts.district_name')
            ->orderBy('id', 'desc')->paginate('10');


        return view('backend.post.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $district = District::all();
        return view('backend.post.create', [
            'category' => $category,
            'district' => $district,
        ]);
    }

    // Ajax Category Filter
    public function filterSubCategory($category_id)
    {
        $sub = SubCategory::where('category_id', $category_id)->get();
        return response()->json($sub);
    }

    // Ajax District Filter
    public function filterSubDistrict($district_id)
    {
        $subd = Subdistrict::where('district_id', $district_id)->get();

        return response()->json($subd);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
        ]);

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->district_id = $request->district_id;
        $post->subdistrict_id = $request->subdistrict_id;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->headline = $request->headline;
        $post->isfeatured = $request->isfeatured;
        $post->feature_thumbnail = $request->feature_thumbnail;



        //Image Rename
        $image_rename = uniqid() . '-' . $request->feature_image->getClientOriginalName();

        //Store File
        $request->feature_image->storeAs('public/image', $image_rename);

        // Use File
        $post->feature_image = $image_rename;


        // $image = $request->feature_image;
        // if ($image) {
        //     $image_rename = uniqid() . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->resize(500, 300)->save('/image/postimg/' . $image_rename);
        //     $post->feature_image = '/image/postimg/' . $image_rename;

        // }

        $post->save();

        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $category = Category::all();
        $subcategory = SubCategory::where('category_id', $post->category_id)->get();
        $district = District::all();
        $subdistrict = Subdistrict::where('district_id', $post->district_id)->get();

        return view('backend.post.edit', [
            'post' => $post,
            'category' => $category,
            'subcategory' => $subcategory,
            'district' => $district,
            'subdistrict' => $subdistrict,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->subcategory_id = $request->subcategory_id;
        $post->district_id = $request->district_id;
        $post->subdistrict_id = $request->subdistrict_id;
        $post->description = $request->description;
        $post->tags = $request->tags;
        $post->headline = $request->headline;
        $post->isfeatured = $request->isfeatured;
        $post->feature_thumbnail = $request->feature_thumbnail;



        //Image Rename
        $image_rename = uniqid() . '-' . $request->feature_image->getClientOriginalName();

        //Store File
        $request->feature_image->storeAs('public/image', $image_rename);

        // Use File
        $post->feature_image = $image_rename;


        // $image = $request->feature_image;
        // if ($image) {
        //     $image_rename = uniqid() . '.' . $image->getClientOriginalExtension();
        //     Image::make($image)->resize(500, 300)->save('/image/postimg/' . $image_rename);
        //     $post->feature_image = '/image/postimg/' . $image_rename;

        // }

        $post->update();

        return Redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
