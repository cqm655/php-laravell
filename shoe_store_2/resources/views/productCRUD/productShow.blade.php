@extends('page.layout')
@section('content')


<hr>

@foreach($images1 as $image1)
@endforeach
@foreach($images2 as $image2)
@endforeach
@foreach($images3 as $image3)
@endforeach
@foreach($images4 as $image4)
@endforeach

<div class="container justify-content-center">
    <div class="row">
        <div class="col-sm-3">
            <div class="column-img">
                <img id="img-fit" src="/product_images/{{$image1->image}}" onclick="myFunction(this);">
            </div>
            <div class="column-img">
                <img id="img-fit" src="/product_images/{{$image2->image}}" onclick="myFunction(this);">
            </div>
            <div class="column-img">
                <img id="img-fit" src="/product_images/{{$image3->image}}" onclick="myFunction(this);">
            </div>
            <div class="column-img">
                <img id="img-fit" src="/product_images/{{$image4->image}}" onclick="myFunction(this);">
            </div>
        </div>
        <div class="col">
            <div class="row">
                <!-- Expanded image -->
                <img id="expandedImg" src="/product_images/{{$image1->image}}" onclick="myFunction(this);">
            </div>
        </div>
        <div class="col-sm">
          <h3>{{$product->product_name}}</h3>
          <hr>
          <br>
          <h6>{{$product->product_description}}</h6>
          <br>
          <h4>{{$product->product_price}} lei</h4>
          <hr>
          <h6>STIL: @php echo ucfirst("{$product->product_style}"); @endphp</h6> <!-- Uppercase fisrt letter -->
          <hr>
          <h6>Marimi: {{$product->product_size}}</h6>
        </div>
    </div>
</div>





<script>
function myFunction(imgs) {
    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    // Get the image text
    var imgText = document.getElementById("imgtext");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    imgText.innerHTML = imgs.alt;
    // Show the container element (hidden with CSS)
    expandImg.parentElement.style.display = "block";
}
</script>
@endsection