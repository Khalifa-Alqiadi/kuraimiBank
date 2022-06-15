@extends('front.layout.home')
@section('content')
    @foreach ($categories as $category)
        <div class="shadow border w-100 p-2">{{$category->name}}</div>
    @endforeach
@endsection