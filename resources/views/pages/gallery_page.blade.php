@extends('master')
@section('title', 'Image Gallery')
@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <div class="category" style="background: url({{asset('images/'.@$category->image)}});background-size: cover;
                    background-position: top center;">
                <div class="category-name text-white font-weight-bold px-1 text-uppercase">
                    {{@$category->name}}
                </div>
            </div>
        </div>
    </div>
    @foreach($galleries as $gallery)
        <div class="section-gallery">
            <div class="container">
                <div class="row">
                    <div class="gallery">
                        <span class="gallery-title">{{$gallery->title}}</span>
                        <div class="gallery-body">
                            <div class="row">
                                @foreach($gallery->gallery_posts as $gallery_post)
                                    <div class="col-sm-3">
                                        <div class="gallery-image">
                                            <div class="card">
                                                <img class="card-img-top"
                                                     src="{{asset('gallery_images/'.$gallery_post->image)}}"
                                                     alt="Card image cap">
                                                @if($gallery_post->title)
                                                    <div class="card-body">
                                                        <p class="card-text">{{$gallery_post->title}}</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endforeach

@endsection