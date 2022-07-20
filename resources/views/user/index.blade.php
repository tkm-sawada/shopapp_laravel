<x-app-layout>
  <x-header/>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">

                <div class="flex flex-wrap my-4">
                  @foreach ($products as $product)
                  <div class="w-1/2 md:w-1/4 p-4 ">
                    <div class="border rounded-md p-2 md:p-4">
                      <a href="{{ route('user.items.show', ['item' => $product->id]) }}" >
                        <x-thumbnail filename="{{$product->filename ?? ''}}" type="products"/>
                        <div class="mt-4">
                          <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">{{ $product->category }}</h3>
                          <h2 class="text-sm md:text-lg text-gray-900 title-font font-medium">{{ $product->name }}</h2>
                          <p class="mt-1">{{ number_format($product->price) }}<span class="text-sm text-gray-700">円(税込)</span></p>
                        </div>
                      </a>
                    </div>
                  </div>
                  @endforeach
                </div>
                
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
