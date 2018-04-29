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
        <div class="category-body py-5 mb-5">
            <h1 class="display-5 title">{{@$category->title}}</h1>
            {!! $category->description!!}
        </div>
    </div>
    @endif
    @php($i=0)
    @foreach($sub_categories as $sub_category)
        @php($i++)
        @if($i%2 == 0)
            <div class="bg-info py-3 category-row">
                @else
                    <div class="bg-primary py-3 category-row">
                        @endif
                        <div class="container py-5">
                            <div class="row">

                                <div class="order-2 order-md-1 col-md-6 order-md-2">
                                    <div class="section-title text-white bar">{{@$sub_category->name}}</div>
                                    <div class="text-white">{!!str_limit(@$sub_category->description,300) !!}</div>
                                   @if(!count($sub_category->post)>0)
                                    <button onclick='location.href = "{{url('category-page/'.@$sub_category['id'])}}"' type="button"
                                            class="btn btn-outline-light    ">More
                                    </button>
                                        @else
                                        <button onclick='location.href = "{{url('post-page/'.@$sub_category['id'])}}"' type="button"
                                            class="btn btn-outline-light    ">More
                                    </button>
                                       @endif
                                </div>
                                <div class=" order-1 order-md-2 col-md-6">
                                    <img src="{{asset('images/'.@$sub_category->image)}}" class="img-fluid rounded"
                                         alt="Responsive image">
                                </div>

                            </div>
                        </div>
                    </div>
            @endforeach
@endsection