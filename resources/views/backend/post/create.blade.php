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
                    name="title" type="text" placeholder="Your Post Title">
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
                            <option>Category Name</option>
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
                            required name="category_id">
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
                            required name="category_id">
                            <option selected>Select</option>
                            <option>Category Name</option>
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
                            required name="category_id">
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
                    rows="5" placeholder="Enter some long form content."></textarea>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tags</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="2" placeholder="Enter some tag form content."></textarea>
            </label>




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