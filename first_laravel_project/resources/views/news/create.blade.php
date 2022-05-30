
@extends('index')
@section('page_title', "create news")

@section("main_content")

<div class="container">
    <div class="col-8">
        <h1>Add post</h1>
        <form method="post" action="{{ route('news.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Post Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="body">Content</label>
                <textarea class="form-control" id="body" rows="3" name="body"></textarea>
            </div>
            <div class="form-group">
                <br>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>

@stop