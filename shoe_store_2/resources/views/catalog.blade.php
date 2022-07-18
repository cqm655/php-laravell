@extends('page.layout')
@section('content')
@include('mapsView.mapsView')
<div class="img-fitt"></div>
<!-- <img id="img-fit-div" src="https://images.pexels.com/photos/267301/pexels-photo-267301.jpeg?cs=srgb&dl=pexels-pixabay-267301.jpg&fm=jpg" alt=""> -->
<img id="img-fit-div" src="https://thegadgetflow.com/wp-content/uploads/2022/05/Fibonacci-Shoes-Temperature-Regulating-Footwear-04-1200x900.jpg" alt="">

<div class="container d-flex" id="img-container">
    <div class="row" id="row-img">
        <div class="col-sm">
            <div class="image-container">
                <a href="#"><img id="img" src="https://cdn11.bigcommerce.com/s-pkla4xn3/images/stencil/1280x1280/products/20790/183133/Men-shoes-2018-fashion-new-arrivals-warm-winter-shoes-men-High-quality-frosted-suede-shoes-men__70277.1545975473.jpg" alt=""></a>
            </div>
        </div>
    </div>
    <div class="row" id="row-img">
        <div class="col-sm" >
            <div class="image-container">
                <a href="#"> <img id="img" src="https://i0.wp.com/ventsmagazine.com/wp-content/uploads/2020/03/Ladies-Comfortable-Fashion-Platform-Shoes-Casual-Women-Shoes-Solid-Short-Knight-Boots-Ladies-Wedges-Female-Flat.jpg" alt=""></a>
            </div>
        </div>
    </div>

</div>

<div>

   
    @foreach($last as $image)
    @endforeach

    @foreach($last1 as $image1)
    @endforeach

    @foreach($last2 as $image2)
    @endforeach

    @foreach($last3 as $image3)
    @endforeach
   
<h2>Check Out NEW Collection </h2>
<hr>

@if(empty($image) || empty($image1) || empty($image2) || empty($image3))

@elseif(!empty($image) && !empty($image1) && !empty($image2) && !empty($image3))

<a href="/product-show/{{$product}}"> <div class="slideshow-container"> <!-- $product = id -->
        <div class="mySlides fade">
            <img src="storage/product_images/{{$image->image}}" id="last-img" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="storage/product_images/{{$image1->image}}" id="last-img" style="width:100%">
        </div>
        <div class="mySlides fade">
            <img src="storage/product_images/{{$image2->image}}" id="last-img" style="width:100%;">
        </div>
        <div class="mySlides fade">
            <img src="storage/product_images/{{$image3->image}}" id="last-img" style="width:100%;">
        </div>
    </div>
</a>
@endif
   
</div>

<hr>
<h5>Find us</h5>
<div class="container">
    <div class="row">
        <div class="col">
            <div id="map"></div>
        </div>
        <div class="col">
            <h4>INCALTAMINTE ROSSO IN MOLDOVA</h4>
            <h6>Incaltamintea ROSSO demult timp a cucerit clienții din Moldova cu calitatea și confortul sau. Acum aveti posibilitatea sa faceti cunostinta cu intreaga colectie de pantofi ROSSO prezentate in magazinele din Chisinau pe site-ul oficial al ROSSO în Moldova. Va propunem sa apreciati confortul si calitatea incaltamintei ROSSO.</h6>
        </div>
    </div>
</div>


<script>
    var myIndex = 0;
    carousel();

    function carousel() {
        var i;
        var x = document.getElementsByClassName("mySlides");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        myIndex++;
        if (myIndex > x.length) {
            myIndex = 1
        }
        x[myIndex - 1].style.display = "block";
        setTimeout(carousel, 9000);
    }

    
    let slideIndex = 0;

showSlides();
    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
       
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        
        slides[slideIndex - 1].style.display = "block";
        
        setTimeout(showSlides, 4000); // Change image every 4 seconds
    }
   
</script>


@endsection