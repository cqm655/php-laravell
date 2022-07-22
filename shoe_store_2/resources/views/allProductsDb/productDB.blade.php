@extends('page.layout')
@section('content')
@if(session('deleted'))
    <div class="alert alert-dismissible alert-danger">
        <button type="button" class="btn btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Deleted!</h4>
        <p class="mb-0">Product deleted successfully</p>
    </div>
    @endif
<div class="col-md-7" id="addProduct">
        <h3>Products</h3>
        <div id="pagination_data">
              @include("allProductsDb.productPagination",['product' => $product])
         </div>
    </div>


    <!-- Handle Pagination -->
<script>
    $(function() {
      $(document).on("click", "#pagination a,#search_btn", function() {

        //get url and make final url for ajax 
        var url = $(this).attr("href");
        var append = url.indexOf("?") == -1 ? "?" : "&";
        var finalURL = url + append + $("#searchform").serialize();

        //set to current url
        window.history.pushState({}, null, finalURL);

        $.get(finalURL, function(data) {

          $("#pagination_data").html(data);

        });

        return false;
      })

    });
  </script>
@endsection