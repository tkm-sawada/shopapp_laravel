<x-app-layout>
    <x-header/>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="md:flex md:justify-around">
                        <div class="md:w-1/2 z-0">
                            <!-- Slider main container -->
                            <div class="swiper">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- Slides -->
                                    @foreach ($productImages as $productImage)
                                    <div class="swiper-slide">
                                        <img src="{{asset('storage/products/' . $productImage)}}" alt="{{ $productImage }}">
                                    </div>
                                    @endforeach
                                </div>
                                <!-- If we need pagination -->
                                <div class="swiper-pagination"></div>
                            
                                <!-- If we need navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            
                                <!-- If we need scrollbar -->
                                <div class="swiper-scrollbar"></div>
                            </div>
                        </div>
                        <div class="md:w-1/2 ml-4">
                            <h2 class="text-sm title-font text-gray-500 tracking-widest">{{ $product->category->name }}</h2>
                            <h1 class="text-gray-900 text-3xl title-font font-medium mb-4">{{ $product->name }}</h1>
                            <p class="leading-relaxed">{{ $product->information }}</p>

                            <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5"></div>
                            
                            <span class="title-font font-medium text-2xl text-gray-900">{{ number_format($product->price) }}</span><span class="text-sm text-gray-700">円(税込)</span>
                            
                            <form method="post" action="{{ route('user.cart.add') }}">
                                <div class="flex justify-around items-center mt-6">
                                    @csrf
                                    <div>
                                        <div class="flex ml-auto justify-around items-center">
                                            <span class="mr-3 text-sm">数量</span>
                                            <div class="relative">
                                                <select name="quantity" class="py-1 rounded border appearance-none border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 text-base">
                                                    @for ($i=1; $i<=$quantity; $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        </div>
                                    <div>
                                        <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">カートに入れる</button>
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="border-t border-gray-400 my-8"></div>
                    <div class="mb-4 text-center">この商品を販売しているショップ</div>
                    <div class="mb-4 text-center">{{$product->shop->name}}</div>
                    <div class="mb-4 text-center">
                        @if($product->shop->filename !== null) 
                          <img class="mx-auto w-40 h-40 object-cover rounded-full" src="{{ asset('storage/shops/' . $product->shop->filename )}}"> 
                        @else 
                          <img src=""> 
                        @endif
                    </div>
                    <div class="mb-4 text-center">
                        <button data-micromodal-trigger="modal-1" type="button" class=" ml-auto text-black bg-gray-400 border-0 py-2 px-6 focus:outline-none hover:bg-gray-500 rounded">ショップの詳細を見る</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal micromodal-slide z-50" id="modal-1" aria-hidden="true">
      <div class="modal__overlay" tabindex="-1" data-micromodal-close>
        <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
          <header class="modal__header">
            <h2 class="text-xl text-gray-700" id="modal-1-title">
              {{$product->shop->name}}
            </h2>
            <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
          </header>
          <main class="modal__content" id="modal-1-content">
            <p>
              {{$product->shop->information }}
            </p>
          </main>
          <footer class="modal__footer">
            <button type="button" class="modal__btn" data-micromodal-close aria-label="Close this dialog window">閉じる</button>
          </footer>
        </div>
      </div>
    </div>
    <script src="{{ mix('js/swiper.js') }}"></script>
</x-app-layout>
