@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create</h1>
    <form action="/catalog" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="form-control" type="text" id="brand" name="brand" placeholder="Show Brand">
        <br>
        <input class="form-control" type="text" id="model" name="model" placeholder="Show Model">
        <br>
        <input class="form-control" type="number" id="size" name="size" placeholder="Show Size" min=10 max=50>
        <br>
        <input class="form-control"  type="text" id="color" name="color" placeholder="Show Color">
        <br>
        <input class="form-control" type="text" id="type" name="type" placeholder="Show Type">
        <br>
        <input class="form-control" type="number" id="price" name="price" placeholder="Show Price" min=50 max=1000>
        <br>
        <input  class="form-control"type="file" id="file" name="image">
        <br>
        <button type="submit" id="submit" class="btn btn-outline-primary" >Create Shoe</button>
    </form>
</div>

{{-- <script src="{{asset("js/create_validate.js")}}"></script> --}}
@endsection
