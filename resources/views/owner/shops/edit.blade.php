<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('店舗情報編集') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{route('owner.shops.update', ['shop' => $shop->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="name" class="leading-7 text-sm text-gray-600">名前</label>
                                    <input type="text" id="name" name="name" value="{{$shop->name}}" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="information" class="leading-7 text-sm text-gray-600">店舗情報</label>
                                    <textarea type="text" id="information" name="information" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{$shop->information}}</textarea>
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative w-1/2">
                                    <x-thumbnail :filename="$shop->filename" type="shops"/>
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">画像</label>
                                    <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-blue-500 focus:bg-white focus:ring-2 focus:ring-blue-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                            <div class="p-2 md:w-1/2 mx-auto">
                                <div class="relative flex justify-around">
                                    <div>
                                        <input type="radio" id="is_selling" name="is_selling" value="1" @if($shop->is_selling === 1){ checked } @endif>
                                        <label for="is_selling" class="leading-7 text-sm text-gray-600">販売中</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="is_selling" name="is_selling" value="0" @if($shop->is_selling === 0){ checked } @endif>
                                        <label for="is_selling" class="leading-7 text-sm text-gray-600">停止中</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 p-2 w-full flex">
                                <button type="button" onclick="location.href=`{{route('owner.shops.index')}}`" class="flex mx-auto text-gray-600 bg-gray-200 border-0 py-2 px-8 focus:outline-none hover:bg-gray-400 rounded text-lg">戻る</button>
                                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
