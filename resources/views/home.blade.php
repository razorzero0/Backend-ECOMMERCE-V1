@extends('Components/layout/Main')
@section('container')

@if(session()->has('succes'))
<div id="alert-1" class="flex p-4 mb-4 bg-blue-100 rounded-lg dark:bg-blue-200" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-blue-700 dark:text-blue-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div class="ml-3 text-sm font-medium text-blue-700 dark:text-blue-800">
      A simple info alert with an <a href="#" class="font-semibold underline hover:text-blue-800 dark:hover:text-blue-900">example link</a>. Give it a click if you like.
    </div>
</div>
    @endif
<div class="mb-6">
    <form action="category" method="post">
        @csrf
    <label for="success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">Category</label>
    <input type="text" name="name">
    <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
</form>
  </div>
<div class="mb-6">
    <form action="product" method="post">
        @csrf
    <label for="success" class="block mb-2 text-sm font-medium text-green-700 dark:text-green-500">product</label>
    <input type="text" name="name" placeholder="name">
    <input type="number" name="category" placeholder="category">
    <input type="number" name="harga" placeholder="harga">
    <button type="submit" class="mt-2 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>
</form>
  </div>
@if($product)
  @foreach($product as $a)
    <h1>Rp.{{number_format($a->harga)}}</h1>
    {{ $a->name}}
  @endforeach
@endif

@if($cart)
  @foreach($cart as $a)
    @if($a->product && $a->user)
        {{ $a->product->name }}
        {{ $a->user->name }}
          @else
    @endif
  @endforeach
@endif

@endsection