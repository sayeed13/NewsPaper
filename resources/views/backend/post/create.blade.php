@extends('admin.admin_master')

@section('index')
<div class="container grid px-6 py-2 mx-auto">
    {{-- Section Heading --}}
    <div class="flex justify-between">
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                All Posts
            </h4>
        </div>
        <div>
            <a href="{{ route('posts.create') }}">
                <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Add New
                </button>
            </a>
        </div>
    </div>

    {{-- Add Category Form --}}
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <span class="text-gray-700 dark:text-gray-400">
            Add New Post
        </span>
        <form action="{{ route('posts.store') }}" method="POST">
            @csrf
            <label class="block text-sm">
                <span for="title" class="text-gray-700 dark:text-gray-400">Post Title</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="title" id="title" type="text" placeholder="Your Post Title">
            </label>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="flex flex-row w-full">
                <div class="basis-1/4 mt-4 px-2">
                    <label class="text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Parent Category
                        </span>
                        <select
                            class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            required name="category_id">
                            <option selected>Select</option>
                            @foreach ($category as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->cat_name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="basis-1/4 mt-4 px-2">
                    <label class="text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Parent Sub-Category
                        </span>
                        <select
                            class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            required name="subcategory_id">
                            <option selected>Select</option>
                            <option>Category Name</option>
                        </select>
                    </label>
                </div>
                <div class="basis-1/4 mt-4 px-2">
                    <label class="text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Parent District
                        </span>
                        <select
                            class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            required name="district_id">
                            <option selected>Select</option>
                            @foreach ($district as $dis)
                            <option value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
                <div class="basis-1/4 mt-4 px-2">
                    <label class="text-sm">
                        <span class="text-gray-700 dark:text-gray-400">
                            Parent Sub-District
                        </span>
                        <select
                            class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            required name="subdistrict_id">
                            <option selected>Select</option>
                            <option>Category Name</option>
                        </select>
                    </label>
                </div>
            </div>


            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="5" placeholder="Enter some long form content." name="description"></textarea>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tags</span>
                <input
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    placeholder="Enter some tag form content." name="tags">
            </label>

            <label class="inline-block mb-2 mt-2 text-gray-500" for="feature_image">Upload
                Featured Image(jpg,png,svg,jpeg)</label>
            <div class="flex items-center justify-center w-full" style="height: 150px; background: #fff;
                border: 1px solid gray;">
                <label class="flex flex-col w-full">
                    <div class="flex flex-col items-center justify-center pt-7">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                            Select a photo</p>
                    </div>
                    <input type="file" name="feature_image" id="feature_image" class="opacity-0" />
                </label>
            </div>

            <br>
            <h3 class="text-center text-white">Extra Options</h3>
            <br>

            <div class="flex justify-between mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" name="headline"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2">
                        Headline
                    </span>
                </label>
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" name="isfeatured"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2">
                        Featured
                    </span>
                </label>
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" name="feature_thumbnail"
                        class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2">
                        Thumbnail Style
                    </span>
                </label>
            </div>




            <div class="mt-4">
                <a href="">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mt-3">
                        Publish
                    </button>
                </a>
            </div>

        </form>

    </div>


</div>
@endsection