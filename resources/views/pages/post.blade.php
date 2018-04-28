@extends('master')
@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <div class="category" style="background: url({{asset('images/'.$category->image)}});background-size: cover;
                    background-position: top center;">
                <div class="category-name text-white font-weight-bold px-1 text-uppercase">
                    {{$category->name}}
                </div>
            </div>
        </div>
    </div>
    @if($category->description)
    <div class="container">
        <div class="category-body pb-5">
            {!! $category->description!!}
        </div>
    </div>
    @endif
    <div class="container">
        <div class="row food-wrapper">
            @foreach($posts as $post)
                <div class="col-sm-3 food">
                    <div class="card">
                        <img class="card-img-top" src="{{asset('images/'.@$post->image)}}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{@$post->title}}</h5>
                            <p class="card-text text-center">{{@$post['price']}}</p>
                        </div>
                    </div>
                </div>


         @endforeach
        </div>
    </div>
@endsection