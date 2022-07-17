@extends('page.layout')
@section('content')



<div class="row justify-content-between">
    @if(session('success'))
<div class="alert alert-dismissible alert-success">
    <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Success!</h4>
    <p class="mb-0">New product added successfully</p>
</div>
@elseif(session('deleted'))
<div class="alert alert-dismissible alert-danger">
    <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
    <h4 class="alert-heading">Deleted!</h4>
    <p class="mb-0">Product deleted successfully</p>
</div>
    @endif
    <div class=" col-md-4" id="addProduct">
        <h3>Add Product</h3>
        <form action="/add-product" method="post" enctype="multipart/form-data" >
   
                        @csrf
    <div class=" form-group">
        <label  for="title" class="mt-2">Product Title</label>
        <input type="text" class="form-control" name="title" required placeholder="Enter product title"><br>
    </div>

    <div class="form-group">
        <label for="style" class="mt-2">Style</label><br>
        <select name="style" id="type">
            <option value="athleisure">Athleisure</option>
            <option value="casual">Casual</option>
            <option value="outdoor">Outdoor</option>
            <option value="formal">Formal</option>
        </select><br>
    </div>
    <div class="form-group">
        <label class="mt-2">Color</label><br>
        <select name="color" id="color">
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
           <input type="text" class="form-control" name="size" required>
        </div>
    </div>
    <div class="form-group">
        <label class="mt-2">Gender</label><br>
        <div class="div-btn-check" style="display: flex;">
           <select name="gender" id="">
            <option value="male">Barbati</option>
            <option value="female">Femei</option>
            <option value="other">Altii</option>
           </select>
        </div>
    </div>
    <br>
    <div class="product_container" style="width:100px ;">
        <label class="mt-2">Price</label>
        <input type="number" class="form-control " name="price" required min=300 max=10000 step="10" placeholder="Price"><br>
    </div>
    <div class="form-control">
        <label>Description</label>
        <input type="text" class="form-control" name="description" required placeholder="Enter description">
    </div>
    <div class="form-group">
        <label for="files" class="form-label mt-2">Upload Images:</label>
        <input type="file" name="images[]" class="form-control" multiple accept="image/*">
    </div>
    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Save Product</button>
    </div>
    </form>
</div>
<div class="col-md-7" id="addProduct">
    <h3>Products</h3>
    <input type="text" id="search" placeholder="Insert product Title">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Style</th>
                <th>Color</th>
                <th>Size</th>
                <th>Price</th>
                <th>Nr.</th>
            </tr>
        </thead>
        <tbody>
        <!-- for serial number -->
            @php $i=1; @endphp 
            @forelse($products as $product)
            <tr>
               <td>{{$i++}}</td>
               <td>{{$product->product_name}}</td>
               <td>{{$product->product_style}}</td>
               <td>{{$product->product_color}}</td>
               <td>{{$product->product_size}}</td>
               <td>{{$product->product_price}} lei</td>
               <td>{{$product->images->count()}}</td>
               <td>
                <a href="{{route('product.images', $product->id)}}" class="btn btn-outline-dark">View</a>
               </td>
               <td>
               <form action="/product-delete" method="post">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="id">
                    <button class="btn btn-outline-danger">DEL</button>
                </form>
               </td>
               <td>
                <form action="/product-edit" method="POST">
                    @csrf
                    <input type="hidden" value="{{$product->id}}" name="id">
                    <button class="btn btn-outline-success">Edit</button>
                </form>
                <!-- /{{$product->id}} -->
               </td>
            </tr>
            @empty
            <!-- if product is empty -->
            <tr>
                <td colspan="7" class="text-center">No products yet</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>

@endsection