@extends('admin.admin_master')

@section('index')
<div class="container grid px-6 py-2 mx-auto">
    {{-- Section Heading --}}
    <div class="flex justify-between">
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Edit Category
            </h4>
        </div>
        <div>
            <a href="{{ route('add.category') }}">
                <button
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Add New
                </button>
            </a>
        </div>
    </div>

    {{-- Add Category Form --}}
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">


        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Edit Category
            </span>
            <form action="{{ route('update.category', $category->id) }}" method="POST">
                @csrf
                <div class="relative text-gray-500 focus-within:text-purple-600">
                    <input
                        class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                        name="name" type="text" value="{{ $category->cat_name }}">
                    <a href="">
                        <button type="submit"
                            class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Update
                        </button>
                    </a>
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </form>
        </label>
    </div>


</div>
@endsection