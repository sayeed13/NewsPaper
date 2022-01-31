@extends('admin.admin_master')

@section('index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            Edit Post
        </span>
        <form action="{{ route('update.posts', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label class="block text-sm">
                <span for="title" class="text-gray-700 dark:text-gray-400">Post Title</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    name="title" id="title" type="text" value="{{ $post->title }}">
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
                            required name="category_id" id="category_id">
                            <option selected disabled value="0">Select</option>
                            @foreach ($category as $cat)
                            <option {{ $cat->id == $post->category_id ? 'selected="selected"' : '' }} value="{{ $cat->id
                                }}">{{ $cat->cat_name }}</option>
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
                            required name="subcategory_id" id="subcategory_id">
                            <option selected disabled value="0">Select</option>
                            @foreach ($subcategory as $subcategory)
                            <option {{ $subcategory->id == $post->subcategory_id ? 'selected="selected"' : '' }}
                                value="{{
                                $subcategory->id
                                }}">{{ $subcategory->name }}</option>
                            @endforeach
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
                            required name="district_id" id="district_id">
                            <option selected disabled value="0">Select</option>
                            @foreach ($district as $dis)
                            <option {{ $dis->id == $post->district_id ? 'selected="selected"' : '' }} value="{{ $dis->id
                                }}">{{ $dis->district_name }}</option>
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
                            required name="subdistrict_id" id="subdistrict_id">
                            <option selected disabled value="0">Select</option>
                            @foreach ($subdistrict as $subdistrict)
                            <option {{ $subdistrict->id == $post->subdistrict_id ? 'selected="selected"' : '' }}
                                value="{{
                                $subdistrict->id
                                }}">{{ $subdistrict->subdistrict_name }}</option>
                            @endforeach
                        </select>
                    </label>
                </div>
            </div>


            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="5" name="description">{{ $post->description }}</textarea>
            </label>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tags</span>
                <input
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    value="{{ $post->tags }}" name="tags">
            </label>

            <div class="flex justify-center">
                <div class="mb-3 mt-4 w-96">
                    <label for="feature_image"
                        class="form-label block mb-2 text-gray-700 dark:text-gray-400 text-center">Upload
                        Featured
                        Image</label>
                    <input
                        class="form-control block w-full px-3 py-2 text-base font-normal dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0"
                        type="file" id="feature_image" name="feature_image">

                    <img for="oldimg" style="width: 300px; height:auto" class="mt-4"
                        src="{{ url('/storage/image/'. $post->feature_image) }}" alt="" />
                    {{-- <input type="hidden" id="oldimg" name="oldimg" value="{{ $post->feature_image }}"> --}}
                </div>
            </div>

            <br>
            <h3 class="text-center text-white">Extra Options</h3>
            <br>

            <div class="flex justify-between mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" name="headline" value="1" {{ $post->headline==1 ? 'checked' : '' }}
                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none
                    focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2">
                        Headline
                    </span>
                </label>
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" name="isfeatured" value="1" {{ $post->isfeatured==1 ? 'checked' : '' }}
                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none
                    focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2">
                        Featured
                    </span>
                </label>
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" name="feature_thumbnail" value="1" {{ $post->feature_thumbnail==1 ? 'checked'
                    : '' }}
                    class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none
                    focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2">
                        Thumbnail Style
                    </span>
                </label>
            </div>




            <div class="mt-4">
                <a href="">
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple mt-3">
                        Update
                    </button>
                </a>
            </div>

        </form>

    </div>


</div>


{{-- Filter Ajax Category--}}
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name ="category_id"]').on('change', function() {
            var category_id =$(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{ url('/get/subcategory/') }}/"+category_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $("#subcategory_id").empty();
                        $.each(data, function(key,value){
                            $("#subcategory_id").append('<option value="'+value.id+'">'+value.name+'</option>')
                        });
                    },
                }); 
            } else{
                alart('danger');
            }
        });
    });
</script>

{{-- Filter Ajax District --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name ="district_id"]').on('change', function() {
            var district_id =$(this).val();
            if(district_id) {
                $.ajax({
                    url: "{{ url('/get/subdistrict/') }}/"+district_id,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $("#subdistrict_id").empty();
                        $.each(data, function(key,value){
                            $("#subdistrict_id").append('<option value="'+value.id+'">'+value.subdistrict_name+'</option>')
                        });
                    },
                }); 
            } else{
                alart('danger');
            }
        });
    });
</script>

@endsection