<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('商品管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="my-4">
                        <x-flash-message status="session('status')"/>
                    </div>
                    <div class="md:px-4 py-3 mr-auto">
                        <button onclick="location.href=`{{route('owner.products.create')}}`" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規作成</button>
                    </div>
                    <div class="flex flex-wrap my-4">
                        @foreach ($owner as $owner)
                            @foreach ($owner->shop as $shop)
                                @foreach ($shop->product as $product)
                                <div class="w-1/2 sm:w-1/4 p-4">
                                    <div class="flex relative p-2 border rounded-md">
                                        <a href="{{route('owner.products.edit', ['product' => $product->id])}}">
                                            <x-thumbnail :filename="$product->imageFirst->filename ?? ''" type="products"/>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            @endforeach
                        @endforeach
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
