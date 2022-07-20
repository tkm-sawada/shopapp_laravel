<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('店舗情報作成') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{route('owner.products.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">商品名</label>
                                    <input type="text" id="name" name="name" value="{{old('name')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">商品情報</label>
                                    <textarea id="information" name="information" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{old('information')}}</textarea>
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="price" class="leading-7 text-sm text-gray-600">価格</label>
                                    <input type="number" id="price" name="price" value="{{old('price')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="sort_order" class="leading-7 text-sm text-gray-600">表示順</label>
                                    <input type="number" id="sort_order" name="sort_order" value="{{old('sort_order')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="quantity" class="leading-7 text-sm text-gray-600">初期在庫数</label>
                                    <input type="number" id="quantity" name="quantity" value="{{old('quantity')}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    <span class="text-sm">0~99の範囲で入力してください</span>
                                </div>
                            </div>
                            <div class="p-2 w-1/2 mx-auto">
                              <div class="relative">
                                <label for="shop_id" class="leading-7 text-sm text-gray-600">販売する店舗</label>
                                <select id="shop_id" name="shop_id" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    @foreach($shops as $shop)
                                  <option value="{{$shop->id}}">
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
                                    <option value="{{$secondary->id}}">
                                        {{$secondary->name}}
                                    </option>
                                    @endforeach
                                  </optgroup>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <x-select-image :images="$images" name="image1" />
                            <x-select-image :images="$images" name="image2" />
                            <x-select-image :images="$images" name="image3" />
                            <x-select-image :images="$images" name="image4" />
                            <div hidden><x-select-image :images="$images" name="imageX"/></div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative flex justify-around">
                                    <div>
                                        <input type="radio" id="is_selling" name="is_selling" value="1" checked >
                                        <label for="is_selling" class="leading-7 text-sm text-gray-600">販売中</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="is_selling" name="is_selling" value="0">
                                        <label for="is_selling" class="leading-7 text-sm text-gray-600">停止中</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 p-2 w-full flex">
                                <button type="button" onclick="location.href=`{{route('owner.products.index')}}`" class="flex mx-auto text-gray-600 bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('js/selectImage.js') }}"></script>
</x-app-layout>
