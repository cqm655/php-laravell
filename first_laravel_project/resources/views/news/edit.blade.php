
@extends('index')
@section('page_title', "edit news")

@section("main_content")



<div class="container">
 
 @foreach($news as $item)

 @endforeach
    <div class="col-8">
        <h1>Edit post</h1>
        <form method="get" action="{{ route('news.edit') }}" enctype="multipart/form-data">
            @csrf
           
            <div class="form-group">
                <label for="name">Post Name</label>
                <input type="text" class="form-control" id="name" name="name" value={{$item->name}}>
            </div>
            <div class="form-group">
                <label for="body">Content</label>
                <textarea class="form-control" id="body" rows="3" name="body">{{$item->body}}</textarea>
            </div>
            <div class="form-group">
                <br>
                <input type="image" src="{{ Storage::url("images/".$item->image) }}" width="30%" class="form-control-file" id="image" name="image" >
            </div>  
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>


@stop