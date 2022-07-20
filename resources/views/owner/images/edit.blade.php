<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('画像情報編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{route('owner.images.update', ['image' => $image->id])}}">
                        @method('put')
                        @csrf
                        <div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="title" class="leading-7 text-sm text-gray-600">タイトル</label>
                                    <input type="text" id="title" name="title" value="{{$image->title}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <x-thumbnail :filename="$image->filename" type="products"/>
                                </div>
                            </div>
                            <div class="mt-4 p-2 w-full flex">
                                <button type="button" onclick="location.href=`{{route('owner.images.index')}}`" class="flex mx-auto text-gray-600 bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                            </div>
                        </div>
                    </form>
                    <form id="delete_{{$image->id}}" method="POST" action="{{route('owner.images.destroy', ['image' => $image->id])}}">
                        @csrf
                        @method('delete')
                        <div class="mt-32 p-2 w-full flex">
                            <button data-id="{{ $image->id }}" type="button" onclick="deletePost(this)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script> 
      function deletePost(e) { 
          'use strict'; 
          if (confirm('本当に削除してもいいですか?')) { 
              document.getElementById('delete_' + e.dataset.id).submit(); 
          } 
        } 
    </script>
</x-app-layout>
