@extends('page.layout')
@section('content')


<div class="row justify-content-between">
    <div class=" col-md-4 d-flex justify-content-center" id="addProduct">
        <form action="/product-update" method="POST" enctype="multipart/form-data">
            @csrf
            <div class=" form-group">
                <label for="title" class="mt-2">Product Title</label>
                <input type="text" class="form-control" name="title" required placeholder="Enter product title" value="{{$product->product_name}}"><br>
            </div>

            <div class="form-group">
                <label for="style" class="mt-2">Style</label><br>
                <select name="style" id="type">
                    <!-- set selected option from productCreate.blade -->
                    <option value="{{$product->product_style}}" selected>{{$product->product_style}}</option>
                    <!-- the rest of options -->
                    <option value="athleisure">Athleisure</option>
                    <option value="casual">Casual</option>
                    <option value="outdoor">Outdoor</option>
                    <option value="formal">Formal</option>
                </select><br>
            </div>
            <div class="form-group">
                <label class="mt-2">Color</label><br>
                <select name="color" id="color">
                    <option value="{{$product->product_color}}" selected>{{$product->product_color}}</option>
                    <option value="black">Black</option>
                    <option value="blue">Blue</option>
                    <option value="brown">Brown</option>
                    <option value="white">White</option>
                    <option value="white">Grey</option>
                    <option value="white">Yellow</option>
                    <option value="white">Brown</option>
                </select><br>
            </div>
            <div class="form-group">
                <label class="mt-2">Size</label><br>
                <div class="div-btn-check" style="display: flex;">
                    <input type="text" class="form-control" name="size" value="{{$product->product_size}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="mt-2">Gender</label><br>
                <div class="div-btn-check" style="display: flex;">
                    <select name="gender" id="">
                        <option value="{{$product->gender}}" selected>{{$product->gender}}</option>
                        <option value="male">Barbati</option>
                        <option value="female">Femei</option>
                        <option value="other">Altii</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="product_container" style="width:100px ;">
                <label class="mt-2">Price</label>
                <input value="{{$product->product_price}}" type="number" class="form-control " name="price" required min=300 max=10000 step="10" placeholder="Price"><br>
            </div>
            <div class="form-control">
                <label>Description</label>
                <input value="{{$product->product_description}}" type="text" class="form-control" name="description" required placeholder="Enter description">
            </div>
            <div class="form-group">
                <label for="files" class="form-label mt-2">Upload Images:</label>
                <input type="file" name="images[]" class="form-control" multiple accept="image/*">
            </div>
            <div class="mt-4">
                <input type="hidden" value="{{$product->id}}" name="id">
                <button type="submit" class="btn btn-primary">Save Product</button>
            </div>
        </form>
    </div>

    @foreach($image as $item)
    @endforeach
    @foreach($image1 as $item1)
    @endforeach
    @foreach($image2 as $item2)
    @endforeach
    @foreach($image3 as $item3)
    @endforeach

    <!-- Preview images from DB, if they are -->
    <div class="col-md-7 justify-content-between">
        <div class="row">
            @if(empty($item) )
            @elseif(!empty($item))
            <div class="w-50 p-3"><img id="img-fit-edit" src="/product_images/{{$item->image}}" alt=""></div>
            @endif
            @if(empty($item1) )
            @elseif(!empty($item1))
            <div class="w-50 p-3"><img id="img-fit-edit" src="/product_images/{{$item1->image}}" alt=""></div>
            @endif
            @if(empty($item2) )
            @elseif(!empty($item2))
            <div class="w-50 p-3"><img id="img-fit-edit" src="/product_images/{{$item2->image}}" alt=""></div>
            @endif
            @if(empty($item3) )
            @elseif(!empty($item3))
            <div class="w-50 p-3"><img id="img-fit-edit" src="/product_images/{{$item3->image}}" alt=""></div>
            @endif

        </div>
    </div>




</div>


@endsection