@extends('layouts.app')

@section('content')
<div class="container">
    <a href="/catalog">&larr;</a>
  <h1>Cart</h1>

  <hr>
  @foreach ($cartItems as $shoe)
       <div class="shoe">
           <img src="{{"images/" . $shoe -> image}}" alt="" height="250px">
           <br>
           <p>{{$shoe->brand}}</p>
           <p>{{$shoe->model}}</p>
           <p>{{$shoe->price}}$</p>
       </div>
  @endforeach
    </div>
</div>
@endsection
