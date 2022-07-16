@extends('page.layout')
@section('content')
<h2>Images for : <span class="text-primary">{{$product->product_name}}</span></h2>
<h2>Style : <span class="text-primary">{{$product->product_style}}</span></h2>
<a href="/product-create" class="btn btn-primary">Go back</a>
<div class="row mt-4">
@foreach($images as $image)
    <div class="col-md-3">
        <div class="card text-white bg-secondary mb3" style="max-width: 20rem;">
            <div class="card-body">
                <img src="/product_images/{{$image->image}}" class="card-img-top" alt="">
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection