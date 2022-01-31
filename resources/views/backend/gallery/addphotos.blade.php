@extends('admin.admin_master')

@section('index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="container grid px-6 py-2 mx-auto">
    {{-- Section Heading --}}
    <div class="flex justify-between">
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                New Photo Gallery
            </h4>
        </div>
        <div>
            <a href="{{ route('add.photo') }}">
                <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Add New
                </button>
            </a>
        </div>
    </div>

    {{-- Add Category Form --}}
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <form action="{{ route('store.photo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Photo Title</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="title" type="text" placeholder="Your Post Title">
            </label>
            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror



            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Type
                </span>
                <select
                    class="w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    required name="photo_type" id="photo_type">
                    <option value="0">Big Photo</option>
                    <option value="1">Small Photo</option>
                </select>
            </label>

            <div class="flex justify-center">
                <div class="mb-3 mt-4 w-96">
                    <label for="photo" class="form-label block mb-2 text-gray-700 dark:text-gray-400 text-center">Upload
                        Photo</label>
                    <input
                        class="form-control block w-full px-3 py-2 text-base font-normal dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0"
                        type="file" id="photo" name="photo">
                </div>
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