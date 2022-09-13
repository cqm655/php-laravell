@extends('layout')

@section('page_title', "Create")

@section("main_content")
<h1>Create </h1>

<form action="/shop" method="POST">
    {{-- cross side request forge ceva important, cerut de laravel --}}
    @csrf 
    <input type="text" name="title" placeholder="title">
    <br>
    <textarea name="description" placeholder="description" cols="30" rows="10"></textarea>
    <br>
    <input type="number" name="price" placeholder="price">
    <br>
    <input type="submit" value="Create">
</form>


@stop