@extends('admin.admin_master')

@section('main_content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-inline pr-4">ALL GALLERIES</div>
            <div class="d-inline"><a href="{{route('galleries.create')}}" class="btn btn-outline-primary btn-sm"> Add New
                    +</a></div>
        </div>
        <div class="card-body">
            @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show success_msg" role="alert">
                    <h4>{{Session::get('message')}}</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <table class="table table-bordered  mt-1">
                <thead class="bg-light">
                <tr>
                    <th scope="col">TITLE</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $galleries as $gallery)
                    <tr>
                        <td>{{$gallery->title}}</td>
                        <td>
                            @if(!empty($gallery->image))
                                <img width="100" height="60" src="{{asset('gallery_images/'.$gallery->image)}}" alt="image">
                            @endif
                        </td>
                        <td>
                            @if($gallery->publication_status==1)
                                <a class="btn btn-success justify-content-center" href="{{asset('unpublished-gallery/'.$gallery->id)}}">
                                    <i class="far fa-thumbs-down"></i>
                                </a>
                            @else
                                <a class="btn btn-danger justify-content-center" href="{{asset('published-gallery/'.$gallery->id)}}">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            {!! Html::decode(Html::linkRoute('galleries.edit','<i class="far fa-edit"></i>', [$gallery->id],['class'=>'btn btn-info','style'=>'float:left; margin-right:5px'])) !!}
                            {!! Form::open(['route'=>['galleries.destroy',$gallery->id],'method'=>'DELETE']) !!}
                            {{Form::button( '<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=>'return confirm("Are You Sure You Want To Delete This! ")'])}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
