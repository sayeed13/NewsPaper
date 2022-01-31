@extends('admin.admin_master')

@section('index')
<div class="container grid px-6 py-2 mx-auto">
    {{-- Section Heading --}}
    <div class="flex justify-between">
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                All SEO Field
            </h4>
        </div>
    </div>

    {{-- Add Category Form --}}
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <form action="{{ route('update.seo', $seo->id) }}" method="POST">
            @csrf
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Meta Author</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="meta_author" type="text" value="{{ $seo->meta_author }}">
            </label>
            @error('meta_author')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Meta Title</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="meta_title" type="text" value="{{ $seo->meta_title }}">
            </label>
            @error('meta_title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Meta Keywords</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="meta_keywords" type="text" value="{{ $seo->meta_keywords }}">
            </label>
            @error('meta_keywords')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Meta Description</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="5" name="meta_description">{{ $seo->meta_description }}</textarea>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Google Analytics</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="5" name="google_analytics">{{ $seo->google_analytics }}</textarea>
            </label>

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Google Verification</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="google_verification" type="text" value="{{ $seo->google_verification }}">
            </label>
            @error('google_verification')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Alexa Analytics</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="5" name="alexa_analytics">{{ $seo->alexa_analytics }}</textarea>
            </label>

            <div class="mt-4">
                <a href="">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mt-3">
                        Save
                    </button>
                </a>
            </div>

        </form>

    </div>


</div>
@endsection