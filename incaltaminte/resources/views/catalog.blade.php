@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Catalog</h1>
  <form action="/sort" method="POST">
    @csrf
<select name="type">
    <option value="Sneakers">Sneakers</option>
    <option value="Boots">Boots</option>
    <option value="Highheel">highHeels</option>
</select>
<button class="btn btn-success" type="submit">Sort</button>
</form>
  <hr>
  @foreach ($shoes as $shoe)
       <div class="shoe">
           <img src="{{"images/" . $shoe -> image}}" alt="" height="250px">
           <br>
           <p>{{$shoe->brand}}</p>
           <p>{{$shoe->model}}</p>
           <p>{{$shoe->price}}$</p>

           <form action="/cart" method="POST">
            @csrf
            <input type="hidden" name="shoe_id" value={{$shoe->id}}>
                  <button class="btn btn-dark" type="submit">Add to cart</button>
           </form>
       </div>
  @endforeach
    </div>
</div>
@endsection
