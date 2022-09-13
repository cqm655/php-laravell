@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Delete</h1>
  <hr>
  @foreach ($shoe as $shoes)
       <div class="shoe">
           <img src="{{"images/" . $shoes -> image}}" alt="" height="250px">
           <p>{{$shoes->brand}}{{$shoes->model}}</p>
           <a class="btn btn-danger" href="/delete/{{$shoes->id}}">Delete</a>
           <form action="/catalog" method="pOST">
@csrf
@method('DELETE')
<input type="hidden" name="id" id="" value={{$shoes->id}}>
<button class="btn btn-danger" type="submit">Delete2</button>
        </form>
       </div>

  @endforeach
    </div>
</div>
@endsection
