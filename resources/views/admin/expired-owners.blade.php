<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('期限切れオーナー管理') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="md:p-6 bg-white border-b border-gray-200">
                    
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 mx-auto">
                            <div class="py-4">
                                <x-flash-message status="session('status')"/>
                            </div>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">名前</th>
                                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">メールアドレス</th>
                                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">期限切れ日時</th>
                                            <th class="md:px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($expiredOwners as $owner)
                                        <tr>
                                            <td class="md:px-4 py-3">{{$owner->name}}</td>
                                            <td class="md:px-4 py-3">{{$owner->email}}</td>
                                            <td class="md:px-4 py-3">{{$owner->deleted_at}}</td>
                                            <form id="delete_{{$owner->id}}" method="POST" action="{{ route('admin.expired-owners.destroy', ['owner' => $owner->id]) }}">
                                                @csrf
                                                <td class="md:px-4 py-3">
                                                    <button type="button" data-id="{{ $owner->id }}" onclick="deletePost(this)"  class="flex mx-auto text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded text-lg">完全に削除</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$expiredOwners->links()}}
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script> 
        function deletePost(e) { 
            'use strict'; 
            if (confirm('完全に削除します。本当によろしいですか?')) { 
                document.getElementById('delete_' + e.dataset.id).submit(); 
            } 
        } 
    </script>
</x-app-layout>
