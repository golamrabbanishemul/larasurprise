<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
    {{--<title>Surprise Communication</title>--}}
    <title>@yield('title')</title>
    <style>
        html,body{
            font-size: 16px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">SURPRISE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3">
            <div class="card mt-3">
                <div class="card-header"><a class="text-muted card-link" href="{{route('home')}}">DASHBOARD</a></div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <a href="{{route('category.index')}}" class="list-group-item list-group-item-action rounded-0">
                            Manage Categories
                        </a>
                        <a href="{{route('posts.index')}}" class="list-group-item list-group-item-action">Manage Posts</a>
                        <a href="{{route('galleries.index')}}" class="list-group-item list-group-item-action">Manage Gallery</a>
                        <a href="{{route('gposts.index')}}" class="list-group-item list-group-item-action">Manage Gallery Image</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-9 mb-5 pb-5">
            @yield('main_content')
        </div>
    </div>
</div>
<div class="container-fluid fixed-bottom bg-dark py-3 mt-5">
    <div class="row">

        <p class="text-center text-white">&copy;surprise communication</p>

    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script>
//create category page get category
        $.ajax({
            type:'GET',
            dataType:'json',
            url:"{{route('parent-category')}}",
            success: function (data) {
                $.each(data,function (key, value) {
                    $('#parent-category').append($('<option>').text(value.name).attr('value',value.id));
                })
            }
        });
//create category page get sub category
    
    $('body').on('change','#parent-category',function () {
        var id = $(this).val();
       $.ajax({
           type:'GET',
           dataType:'json',
           url:"{{url('subcategory')}}"+"/"+id,
           beforeSend: function () {
               $('#sub_category').html("");
           },
           success: function (data) {
               $('#sub_category').append($('<option>').text('select sub category').attr('value',''));

               $.each(data, function (key, value) {
                   $('#sub_category').append($('<option>').text(value.sub_category_name).attr('value', value.sub_category_id));
               });
           }

       }) ;
    });

    $('body').on('change','#sub_category',function () {
        var id = $(this).val();
       $.ajax({
           type:'GET',
           dataType:'json',
           url:"{{url('sub-subcategory')}}"+"/"+id,
           beforeSend: function () {
               $('#sub_sub_category').html("");
           },
           success: function (data) {
               $('#sub_sub_category').append($('<option>').text('select sub sub category').attr('value',''));

               $.each(data, function (key, value) {
                   $('#sub_sub_category').append($('<option>').text(value.sub_subcategory_name).attr('value', value.sub_subcategory_id));
               });
           }

       }) ;
    });

//    for flash message
$('.success_msg,.error_msg').delay(5000).slideUp();



//for tinymce  Editor
//===============================
$(document).ready(function () {
    tinymce.init({
        selector: "textarea",
        theme: "modern",
        paste_data_images: true,
        plugins: ["advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern"],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "print preview media | forecolor backcolor emoticons",
        image_advtab: true,
        file_picker_callback: function (callback, value, meta) {
            if (meta.filetype == 'image') {
                $('#upload').trigger('click');
                $('#upload').on('change', function () {
                    var file = this.files[0];
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        callback(e.target.result, {alt: ''});
                    };
                    reader.readAsDataURL(file);
                });
            }
        },
        templates: [{title: 'Test template 1', content: 'Test 1'}, {
            title: 'Test template 2',
            content: 'Test 2'
        }]
    });
})
</script>
</body>
</html>