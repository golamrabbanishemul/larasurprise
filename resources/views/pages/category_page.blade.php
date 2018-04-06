@extends('master')
@section('main_content')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="category">
                <div class="category-image">
                    <img src="{{asset('images/'.$category->image)}}" class="img-fluid" alt="image">
                </div>
                <div class="category-name text-white font-weight-bold px-1 text-uppercase">{{$category->name}}</div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="category-body px-2">
            {!! $category->description!!}
        </div>
    </div>
    @foreach($posts as $post)
        <div class="bg-primary py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="order-2 order-md-1 col-md-8 order-md-2">
                        <div class="section-title text-white bar">{{@$post->title}}</div>
                        <div class="text-white">{!! @$post->description !!}</div>
                    </div>
                    <div class=" order-1 order-md-2 col-md-4">
                        <img src="{{asset('images/'.@$post->image)}}" class="img-fluid rounded" alt="Responsive image">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection