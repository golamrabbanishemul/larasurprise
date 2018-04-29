@extends('admin.admin_master')
@section('title','All Categories')

@section('main_content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-inline pr-4">ALL CATEGORIES</div>
            <div class="d-inline"><a href="{{route('category.create')}}" class="btn btn-outline-primary btn-sm"> Add New
                    +</a></div>
        </div>

        @if(Session::get('message'))
            <div class="alert alert-success alert-dismissible fade show success_msg" role="alert">
                <h4>{{Session::get('message')}}</h4>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered  mt-1">
                <thead class="bg-light">
                <tr>
                    <th scope="col">CATEGORY</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>
                            @if(!empty($category->image))
                                <img width="100" height="60" src="{{asset('images/'.$category->image)}}" alt="image">
                            @endif
                        </td>
                        <td>
                            @if($category->publication_status==1)
                                <a class="btn btn-success" href="{{asset('unpublished-category/'.$category->id)}}"
                                   style="float: left;margin-right: 3px;">
                                    <i class="far fa-thumbs-down"></i>
                                </a>
                            @else
                                <a class="btn btn-danger" href="{{asset('published-category/'.$category->id)}}"
                                   style="float: left;margin-right: 3px;">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            {!! Html::decode(Html::linkRoute('category.edit','<i class="far fa-edit"></i>', [$category->id],['class'=>'btn btn-info','style'=>'float:left; margin-right:5px'])) !!}
                            {!! Form::open(['route'=>['category.destroy',$category->id],'method'=>'DELETE']) !!}
                            {{Form::button( '<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=>'return confirm("Are You Sure You Want To Delete This! ")'])}}
                            {{Form::close()}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
