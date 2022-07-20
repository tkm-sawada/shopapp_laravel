<x-app-layout>
    <x-header/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="mb-4">
                        <x-flash-message status="session('status')"/>
                    </div>
                    @if(count($products) > 0)
                    @foreach($products as $product)
                    <div class="md:flex md:item-center md:mb-2 mb-10">
                        <div class="md:w-3/12 w-1/2">
                        @if($product->imageFirst !== null) 
                            <x-thumbnail filename="{{$product->imageFirst->filename ?? ''}}" type="products"/>
                        @else 
                            <x-thumbnail filename="" type="products"/>
                            <img src=""> 
                        @endif
                        </div>
                        <div class="md:w-4/12 md:ml-2">{{$product->name}}</div>
                        <div class="md:w-5/12 flex justify-around">
                            
                            <form method="post" action="{{ route('user.cart.update', ['item' => $product->id]) }}">
                                <div class="flex justify-around items-center">
                                    @csrf
                                    <select name="selectQuantity" onchange="submit(this.form)" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-1 pl-1 pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        @for ($i=1; $i<=$quantities[$product->id]; $i++)
                                            <option value="{{ $i }}" @if ($i === $product->pivot->quantity) selected @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                    個
                                </div>
                            </form>
                            
                            <div>{{number_format($product->price * $product->pivot->quantity)}}<span class="text-sm text-gray-700">円(税込)</span></div>

                            <div>
                                <form method="post" action="{{route('user.cart.delete', ['item' => $product->id])}}">
                                    @csrf
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>

                        </div>
                        
                    </div>
                    @endforeach

                    <div class="border-t border-gray-400 my-8"></div>
                    <div class="my-10">
                        小計: {{ number_format($totalPrice)}}<span class="text-sm text-gray-700">円(税込)</span> 
                    </div> 
                    <div> 
                        <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" onclick="location.href='{{ route('user.cart.checkout')}}'" >購入する</button> 
                    </div>                       
                    @else
                    カートに商品が入っていません。
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
