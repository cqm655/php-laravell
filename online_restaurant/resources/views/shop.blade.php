@extends('layout')

@section('page_title', "Shop")

@section("main_content")
<h1>Shop </h1>
{{$user}}
{{-- @php
    print_r($product);

@endphp --}}
{{-- @for ($i = 0; $i < count($product); $i++)
    <p>{{$product[$i]}}</p>
@endfor --}}
{{-- <ul>
    @foreach ($product as $item)
    <li>{{$item}}</li>
@endforeach
</ul>

@if($age>=18){
</p>old enought</p>
}@else{
    <p>not old enough</p>
}
@endif --}}

@unless($age>=18) 
<p>old enought</p>
@endunless

{{$language}}
<br>

<img src="images/1.jpg" alt="food-image" width="300px" height="300px">


@stop