@extends('admin.admin_master')

@section('index')
<div class="container grid px-6 py-2 mx-auto">
    {{-- Section Heading --}}
    <div class="flex justify-between">
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                All Social Links
            </h4>
        </div>
    </div>

    {{-- Add Category Form --}}
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <form action="{{ route('update.social', $socialLinks->id) }}" method="POST">
            @csrf
            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Facebool Url</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="facebook" type="text" value="{{ $socialLinks->facebook }}">
            </label>
            @error('facebook')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Twitter Url</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="twitter" type="text" value="{{ $socialLinks->twitter }}">
            </label>
            @error('twitter')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Youtube Url</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="youtube" type="text" value="{{ $socialLinks->youtube }}">
            </label>
            @error('youtube')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Instagram Url</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="instagram" type="text" value="{{ $socialLinks->instagram }}">
            </label>
            @error('instagram')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">LinkedIn Url</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="linkedin" type="text" value="{{ $socialLinks->linkedin }}">
            </label>
            @error('linkedin')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror

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