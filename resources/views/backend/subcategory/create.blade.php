@extends('admin.admin_master')

@section('index')
<div class="container grid px-6 py-2 mx-auto">
    {{-- Section Heading --}}
    <div class="flex justify-between">
        <div>
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                All Sub-Categories
            </h4>
        </div>
        <div>
            <a href="{{ route('add.subcategory') }}">
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
            Add Sub-Category
        </span>
        <form action="{{ route('store.subcategory') }}" method="POST">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Sub Category Name</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="name" type="text" placeholder="Sub-Category Name">
            </label>
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Parent Category Name
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    required name="category_id">
                    <option selected>Select</option>
                    @foreach ($category as $category)
                    <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                    @endforeach

                </select>
            </label>

            <div class="mt-4">
                <button type="submit"
                    class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mt-3">
                    Publish
                </button>
            </div>

        </form>

    </div>


</div>
@endsection