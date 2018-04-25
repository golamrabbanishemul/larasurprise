@extends('master')
@section('content')
    <!-- section1 -->
    <div class="jumbotron jumbotron-fluid text-center bg-white my-5">
        <div class="container">
            <h1 class="display-5 title">Welcome to Surprise Product PTE LTD</h1>
            <p class="lead px-5">Our products and services are designed to spark enthusiasm, improve quality of life,
                and help conserve natural resources. We want to deliver top quality and reliability. </p>
            {{--<a href="details.html" class="btn btn-outline-info">More</a>--}}
        </div>
    </div>
    <!-- section1 end -->
    @php($i=0)
    @foreach($services as $service)
        <?php $i++;?>
        @if(1 == $service->position)

            <!-- section2 -->
            <div class="section2 bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="order-2 order-md-1 col-md-6 order-md-2">
                            <div class="section-title text-uppercase text-white bar">{{@$service->name}}</div>
                            <div class="text-white">{!! str_limit(@$service->description,300) !!}</div>
                            <button onclick='location.href = "{{url('category-page/'.@$service['id'])}}"' type="button"
                                    class="btn btn-outline-light">More
                            </button>
                        </div>
                        <div class=" order-1 order-md-2 col-md-6">
                            <img src="{{asset('images/'.@$service->image)}}" class="img-fluid rounded"
                                 alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section2 end -->
            @continue
        @endif
        @if(2 == $service->position)
            <!-- section3 -->
            <div class="section3 bg-white text-dark">
                <div class="container">
                    <div class="row">
                        <div class="order-2 order-md-1 col-md-6 order-md-2">
                            <div class="section-title text-uppercase bar">{{@$service->name}}</div>
                            <div>{!! str_limit(@$service->description,300) !!}</div>
                            <button onclick='location.href = "{{url('category-page/'.@$service['id'])}}"'
                                    type="button" class="btn btn-outline-light">More
                            </button>
                        </div>
                        <div class=" order-1 order-md-2 col-md-6">
                            <img src="{{asset('images/'.@$service->image)}}" class="img-fluid rounded"
                                 alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section3 end -->
            @continue
        @endif
        @if(3 == $service->position)
            <!-- section4 -->
            <div class="section4 bg-dark my-3 text-white">
                <div class="container">
                    <div class="row">
                        <div class="order-2 order-md-1 col-md-6 order-md-2">
                            <div class="section-title text-uppercase bar">{{@$service->name}}</div>
                            <div class="text-white">{!! str_limit(@$service->description,300) !!}</div>
                            <button onclick='location.href = "{{url('category-page/'.@$service['id'])}}"' type="button"
                                    class="btn btn-outline-info">More
                            </button>
                        </div>
                        <div class=" order-1 order-md-2 col-md-6">
                            <img src="{{asset('images/'.@$service->image)}}" class="img-fluid rounded"
                                 alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section4 end -->
            @continue
        @endif
        @if(4 == $service->position)
            <!-- section5 -->
            <div class="section5 my-3">
                <div class="container">
                    <div class="row">
                        <div class="order-2 order-md-1 col-md-6 order-md-2">
                            <div class="section-title text-uppercase bar">{{@$service->name}}</div>
                            <div>{!! str_limit(@$service->description,300) !!}</div>
                            <button onclick='location.href = "{{url('category-page/'.@$service['id'])}}"' type="button"
                                    class="btn btn-outline-info">More
                            </button>
                        </div>
                        <div class=" order-1 order-md-2 col-md-6">
                            <img src="{{asset('images/'.@$service->image)}}" class="img-fluid rounded"
                                 alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section5 end -->
            @continue
        @endif
        @if(5 == $service->position)
            <!-- section6 -->
            <div class="section6 my-3">
                <div class="container">
                    <div class="row">
                        <div class="order-2 order-md-1 col-md-6 order-md-2">
                            <div class="section-title text-uppercase bar">{{@$service->name}}</div>
                            <div class="text-dark">{!! str_limit(@$service->description,300) !!}</div>
                            <button onclick='location.href = "{{url('category-page/'.@$service['id'])}}"' type="button"
                                    class="btn btn-outline-info">More
                            </button>
                        </div>
                        <div class=" order-1 order-md-2 col-md-6">
                            <img src="{{asset('images/'.@$service->image)}}" class="img-fluid rounded"
                                 alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section6 end -->
            @continue
        @endif
        @if(6 == $service->position)
            <!-- section7 -->
            <div class="section7 bg-dark">
                <div class="container">
                    <div class="row">
                        <div class="order-2 order-md-1 col-md-6 order-md-2">
                            <div class="section-title text-white text-uppercase bar">{{@$service->name}}</div>
                            <div class="text-white">{!! str_limit(@$cat6->description,300) !!}</div>
                            <button onclick='location.href = "{{url('category-page/'.@$service['id'])}}"' type="button"
                                    class="btn btn-outline-info">More
                            </button>
                        </div>
                        <div class=" order-1 order-md-2 col-md-6">
                            <img src="{{asset('images/'.@$service->image)}}" class="img-fluid rounded"
                                 alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>
            <!-- section7 end -->
            @continue
        @endif

        @if($i %2 == 0)
            <div class="bg-white mt-5 py-5">
        @else
                    <div class="bg-dark text-white mt-5 py-5">

                        @endif
                <div class="container">
                    <div class="row">
                        <div class="order-2 order-md-1 col-md-6 order-md-2">
                            <div class="section-title bar text-uppercase">{{@$service->name}}</div>
                            <div class="text-dark">{!! str_limit(@$service->description,300) !!}</div>
                            <button onclick='location.href = "{{url('category-page/'.@$service['id'])}}"' type="button"
                                    class="btn btn-outline-info">More
                            </button>
                        </div>
                        <div class=" order-1 order-md-2 col-md-6">
                            <img src="{{asset('images/'.@$service->image)}}" class="img-fluid rounded"
                                 alt="Responsive image">
                        </div>
                    </div>
                </div>
            </div>

    @endforeach
@endsection