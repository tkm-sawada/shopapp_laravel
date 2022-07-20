<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('店舗情報') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="my-4">
                        <x-flash-message status="session('status')"/>
                    </div>
                    <div class="flex flex-wrap -m-4">
                        @foreach ($shops as $shop)
                        <div class="md:w-1/2 p-4 flex">
                            <a href="{{route('owner.shops.edit', ['shop' => $shop->id])}}">
                                <div class="bg-gray-100 p-6 rounded-lg">
                                    <div class="mb-4">
                                        @if ($shop->is_selling === 1)
                                        <span class="text-white bg-indigo-600 border-0 p-2 rounded">販売中</span>
                                        @else
                                        <span class="text-white bg-red-600 border-0 p-2 rounded">停止中</span>
                                        @endif
                                    </div>
                                    <div class="text-lg text-gray-900 font-medium title-font mb-4">{{$shop->name}}</div>
                                    <x-thumbnail :filename="$shop->filename" type="shops"/>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
