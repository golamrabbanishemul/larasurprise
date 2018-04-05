@extends('admin.admin_master')
@section('main_content')
    <div class="col-sm-10">
        <div class="card mt-3">
            <div class="card-header">
                <div class="d-inline pr-4">CREATE POST</div>
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
                {!! Form::open(['route'=>['posts.store'],'files'=>true]) !!}
                <div class="form-group">
                    <label for="title">Title </label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group">
                    {{Form::label('description','Post Description')}}
                    {{Form::textarea('description', null, ['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('image','Add Post Banner Image')}}
                    {{Form::file('image',['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    {{Form::label('home','Show In Home Page')}}
                    {{ Form::checkbox('home') }}
                </div>
                <div class="form-group">
                    <select name="publication_status" class="form-control">
                        <option value="1">Published</option>
                        <option value="0">Un Published</option>
                    </select>
                </div>
                {{Form::submit('Create New Post',['class'=>'btn btn-success btn-block'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
