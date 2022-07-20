<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品情報編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{route('owner.products.update', ['product' => $product->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                    <input type="text" id="name" name="name" value="{{$product->name}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">商品情報</label>
                                    <textarea id="information" name="information" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$product->information}}</textarea>
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
                                    <input type="number" id="price" name="price" value="{{$product->price}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                                    <input type="number" id="sort_order" name="sort_order" value="{{$product->sort_order}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="current_quantity" class="leading-7 text-sm text-gray-600">現在の在庫数</label>
                                    <div class="w-full bg-gray-100 bg-opacity-50 rounded border-0 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$quantity}}</div>
                                    <input type="hidden" id="current_quantity" name="current_quantity" value="{{$quantity}}" required>
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="quantity" class="leading-7 text-sm text-gray-600">数量</label>
                                    <div class="flex justify-around">
                                        <input type="number" id="quantity" name="quantity" min="0" max="99" value="0" required class="w-2/3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <div class="relative flex justify-around w-1/3 py-2">
                                            <div><input type="radio" id="type1" name="type" class="mr-1" value="{{\Constant::PRODUCT_LIST['add']}}" checked ><label for="type1">追加</label></div>
                                            <div><input type="radio" id="type0" name="type" class="mr-1" value="{{\Constant::PRODUCT_LIST['reduce']}}" ><label for="type0">削減</label></div>
                                        </div>
                                    </div>
                                    <span class="text-sm">0~99の範囲で入力してください</span>
                                </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="shop_id" class="leading-7 text-sm text-gray-600">販売する店舗</label>
                                <select id="shop_id" name="shop_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($shops as $shop)
                                  <option value="{{$shop->id}}" @if($shop->id === $shop->shop_id) selected @endif>
                                    {{$shop->name}}
                                  </option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="category" class="leading-7 text-sm text-gray-600">カテゴリー</label>
                                <select id="category" name="category" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                  @foreach($categories as $category)
                                  <optgroup label="{{$category->name}}">
                                    @foreach ($category->secondary as $secondary)
                                    <option value="{{$secondary->id}}" @if($secondary->id === $product->secondary_category_id) selected @endif>
                                        {{$secondary->name}}
                                    </option>
                                    @endforeach
                                  </optgroup>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative flex justify-around">
                                    <div>
                                        <input type="radio" id="is_selling1" name="is_selling" value="1" @if($product->is_selling === 1){ checked } @endif>
                                        <label for="is_selling1" class="leading-7 text-sm text-gray-600">販売中</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="is_selling2" name="is_selling" value="0" @if($product->is_selling === 0){ checked } @endif>
                                        <label for="is_selling2" class="leading-7 text-sm text-gray-600">停止中</label>
                                    </div>
                                </div>
                            </div>
                            <x-select-image :images="$images" name="image1" />
                            <x-select-image :images="$images" name="image2" />
                            <x-select-image :images="$images" name="image3" />
                            <x-select-image :images="$images" name="image4" />
                            <div hidden><x-select-image :images="$images" name="imageX"/></div>
                            <div class="mt-4 p-2 w-full flex">
                                <button type="button" onclick="location.href=`{{route('owner.products.index')}}`" class="flex mx-auto text-gray-600 bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                            </div>
                        </div>
                    </form>
                    <form id="delete_{{$product->id}}" method="POST" action="{{route('owner.products.destroy', ['product' => $product->id])}}">
                        @csrf
                        @method('delete')
                        <div class="mt-32 p-2 w-full flex">
                            <button data-id="{{ $product->id }}" type="button" onclick="deletePost(this)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/selectImage.js') }}"></script>
    <script> 
      function deletePost(e) { 
          'use strict'; 
          if (confirm('本当に削除してもいいですか?')) { 
              document.getElementById('delete_' + e.dataset.id).submit(); 
          } 
        } 
    </script>
</x-app-layout>
