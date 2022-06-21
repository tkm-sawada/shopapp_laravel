@php 
if(session('status') === 'info'){ $bgColor = 'text-blue-600';} 
if(session('status') === 'alert'){$bgColor = 'text-red-600';} 
@endphp 

<!-- フラッシュメッセージ -->
@if (session('message'))
    <div class="message {{$bgColor}}">
        {{ session('message') }}
    </div>
@endif