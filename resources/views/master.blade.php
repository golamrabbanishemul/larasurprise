<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <title>Hello, world!</title>
</head>
<body>
<head>
    <nav class="navbar navbar-expand-md navbar-primary bg-white fixed-top navbar-custom">

        <a class="navbar-brand" href="{{url('/')}}"><i class="fas fa-assistive-listening-systems"></i> SURPRISE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <?php
                    $menus =\App\Category::where('parent_category',0)->get();
                    foreach ($menus as $menu):
                        $men[]=$menu->id;
                        endforeach;


                $submenus = \App\Category::whereIn('parent_category',$men)->get();

               ?>

                <li class="nav-item">
                    <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
                </li>
                @foreach($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{$menu->name}}</a>

                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($submenus as $submenu)
                        @if($submenu->parent_category == $menu->id)
                                    <li><a class="dropdown-item dropdown-toggle" href="#">{{$submenu->name}}</a>
                                    </li>
                            @endif
                        @endforeach
                                </ul>
                    </li>
                @endforeach

            </ul>

            {{--<div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
                {{--<ul class="navbar-nav ml-auto">--}}
                    {{--<li class="nav-item active">--}}
                        {{--<a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">ABOUT</a>--}}
                    {{--</li>--}}

                    {{--<li class="nav-item dropdown">--}}
                        {{--<a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                            {{--SERVICES--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">--}}
                            {{--<li><a class="dropdown-item dropdown-toggle" href="#">TELECOMMUNICATION</a>--}}
                                {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                    {{--<li><a class="dropdown-item" href="#">UNDERGROUND FIBER LAYING SERVICE</a></li>--}}
                                    {{--<li><a class="dropdown-item" href="#">UNDERGROUND OPTICAL FIBER CABLE</a></li>--}}
                                    {{--<li><a class="dropdown-item" href="#">FIBER ACCESSORIES</a></li>--}}


                                    {{--<li><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>--}}
                                        {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                            {{--<li><a class="dropdown-item" href="#">Subsubmenu action aa</a></li>--}}
                                            {{--<li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                    {{--<li><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>--}}
                                        {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                            {{--<li><a class="dropdown-item" href="#">Subsubmenu action bb</a></li>--}}
                                            {{--<li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</li>--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li><a class="dropdown-item" href="#">HARDWARE & SOFTWARE</a></li>--}}
                            {{--<li><a class="dropdown-item" href="#">SURVEILLANCE SYSTEM</a></li>--}}
                            {{--<li><a class="dropdown-item" href="#">CONSTRUCTION</a></li>--}}


                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">CONTACTS</a>--}}
                    {{--</li>--}}
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">MEDIA</a>--}}
                    {{--</li><li class="nav-item">--}}
                        {{--<a class="nav-link" href="#">CLIENTS</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}

        </div>
    </nav>
</head>

@yield('content')

<!-- section8 -->
<div class="section8 bg-primary py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 contactus">
                <h5 class="text-white">Contact Us</h5>
                <p class="text-white">We are a leading end-to-end infrastructure support provider having Nationwide
                    Telecommunication Transmission Network.
                </p>
                <p class="text-white"><i class="fas fa-map-marker"></i> 18, Karwan Bazar Commercial Area Dhaka -1205,
                    Bangladesh.</p>
                <p class="text-white"><i class="fas fa-phone"></i> +880 2 222333444-5</p>
                <p class="text-white"><i class="fas fa-envelope"></i> info@surprisecommunications.net</p>
            </div>
            <div class="col-12 col-md-4">
                <h5 class="text-white">Contact With Social</h5>
                <ul class="social">
                    <li><a target="_Blank" href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i></a>
                        Facebook
                    </li>
                    <li><a target="_Blank" href="#"><i class="fab fa-linkedin-in"></i></a> Linkedin</li>
                    <li><a target="_Blank" href="#"><i class="fab fa-twitter"></i></a> Twitter</li>
                </ul>
            </div>
            <div class="col-12 col-md-3 col-offset-md-1">
                <h5 class="text-white">Any Query</h5>
                <form class="border border-mute rounded p-2">
                    <div class="form-group my-0 py-0">
                        <label for="name" class="text-white my-0">
                            <small>Name</small>
                        </label>
                        <input type="text" class="form-control form-control-sm py-0" id="name" aria-describedby="name"
                               placeholder="Enter Name">
                    </div>
                    <div class="form-group my-0">
                        <label for="exampleInputEmail1" class="text-white my-0">
                            <small>Email address</small>
                        </label>
                        <input type="email" class="form-control form-control-sm py-0" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group my-0">
                        <label for="exampleFormControlTextarea1" class="text-white my-0">
                            <small>Example textarea</small>
                        </label>
                        <textarea class="form-control form-control-sm py-0" id="exampleFormControlTextarea1"
                                  rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-light my-1 py-0">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- section8 end -->


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"
        integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ"
        crossorigin="anonymous"></script>

<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</body>
</html>