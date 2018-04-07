@extends('master')
@section('content')
    <!-- section1 -->
    <div class="jumbotron jumbotron-fluid text-center bg-white my-5">
        <div class="container-fluid">
            <h1 class="display-5">Welcome <br>To Surprise Communication</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            <a href="details.html" class="btn btn-outline-info">More</a>
        </div>
    </div>
    <!-- section1 end -->

    <!-- section2 -->
    <div class="section2 bg-primary py-5">
        <div class="container">
            <div class="row">
                <div class="order-2 order-md-1 col-md-8 order-md-2">
                    <div class="section-title text-white bar">{{@$cat1->name}}</div>
                    <div class="text-white">{!! str_limit(@$cat1->description,300) !!}</div>
                    <button onclick='location.href = "{{url('category-page/'.@$cat1['id'])}}"' type="button" class="btn btn-outline-light">More</button>
                </div>
                <div class=" order-1 order-md-2 col-md-4">
                    <img src="{{asset('images/'.@$cat1->image)}}" class="img-fluid rounded" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
    <!-- section2 end -->

    <!-- section3 -->
    <div class="section3 bg-dark py-5">
        <div class="container">
            <div class="row">
                <div class="order-2 order-md-1 col-md-8 order-md-2">
                    <div class="section-title text-white bar">{{@$cat2->name}}</div>
                    <div class="text-white">{!! str_limit(@$cat2->description,300) !!}</div>
                    <button onclick='location.href = "{{url('category-page/'.@$cat2['id'])}}"'  type="button" class="btn btn-outline-light">More</button>
                </div>
                <div class=" order-1 order-md-2 col-md-4">
                    <img src="{{asset('images/'.@$cat2->image)}}" class="img-fluid rounded" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
    <!-- section3 end -->

    <!-- section4 -->
    <div class="section4 bg-white py-5 my-3">
        <div class="container">
            <div class="row">
                <div class="order-2 order-md-1 col-md-8 order-md-2">
                    <div class="section-title bar">{{@$cat3->name}}</div>
                    <div class="text-dark">{!! str_limit(@$cat3->description,300) !!}</div>
                    <button onclick='location.href = "{{url('category-page/'.@$cat3['id'])}}"'  type="button" class="btn btn-outline-info">More</button>
                </div>
                <div class=" order-1 order-md-2 col-md-4">
                    <img src="{{asset('images/'.@$cat3->image)}}" class="img-fluid rounded" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
    <!-- section4 end -->

    <!-- section5 -->
    <div class="section5 bg-dark py-5 my-3">
        <div class="container">
            <div class="row">
                <div class="order-2 order-md-1 col-md-8 order-md-2">
                    <div class="section-title text-white bar">{{@$cat4->name}}</div>
                    <div class="text-white">{!! str_limit(@$cat4->description,300) !!}</div>
                    <button onclick='location.href = "{{url('category-page/'.@$cat4['id'])}}"'  type="button" class="btn btn-outline-light">More</button>
                </div>
                <div class=" order-1 order-md-2 col-md-4">
                    <img src="{{asset('images/'.@$cat4->image)}}" class="img-fluid rounded" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
    <!-- section5 end -->

    <!-- section6 -->
    <div class="section6 bg-white py-5 my-3">
        <div class="container">
            <div class="row">
                <div class="order-2 order-md-1 col-md-8 order-md-2">
                    <div class="section-title bar">{{@$cat5->name}}</div>
                    <div class="text-dark">{!! str_limit(@$cat5->description,300) !!}</div>
                    <button onclick='location.href = "{{url('category-page/'.@$cat5['id'])}}"'  type="button" class="btn btn-outline-info">More</button>
                </div>
                <div class=" order-1 order-md-2 col-md-4">
                    <img src="{{asset('images/'.@$cat5->image)}}" class="img-fluid rounded" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
    <!-- section6 end -->

    <!-- section7 -->
    <div class="section7 bg-dark py-5">
        <div class="container">
            <div class="row">
                <div class="order-2 order-md-1 col-md-8 order-md-2">
                    <div class="section-title text-white bar">{{@$cat6->name}}</div>
                    <div class="text-white">{!! str_limit(@$cat6->description,300) !!}</div>
                    <button onclick='location.href = "{{url('category-page/'.@$cat6['id'])}}"'  type="button" class="btn btn-outline-info">More</button>
                </div>
                <div class=" order-1 order-md-2 col-md-4">
                    <img src="{{asset('images/'.@$cat6->image)}}" class="img-fluid rounded" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>
    <!-- section7 end -->
@endsection