@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Update</h1>
  <hr>

 @if(!isset($sent))
 <form action="/update" method="POST">
    @csrf
    <select name="selected_shoe" id="">
      @foreach ($shoes as $shoe)
               <option value={{$shoe->id}}>{{$shoe->brand}}{{$shoe->model}}</option>
      @endforeach
  </select>
  <button type="submit">Submit</button>
  </form>
@else
<a href={{route('update')}}>&larr;Back</a>
<br>
   <form action="/catalog" method="POST" enctype="multipart/form-data">
  @method('PUT')
  @csrf
  <input type="number" name="price" value={{$shoe->price}}>
  <input type="file" name="image">
  <input type="hidden" name="id" id="" value={{$shoe->id}}>
  <button type="submit">Update</button>
</form>
 @endif
</div>
@endsection
