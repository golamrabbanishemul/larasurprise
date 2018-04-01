@extends('admin.admin_master')

@section('main_content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-inline pr-4">CREATE CATEGORIES</div>
        </div>
        <div class="card-body">
            @if(Session::get('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
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
            {!! Form::open(['route'=>['category.store'],'files'=>true]) !!}
            <div class="form-group">
                <label for="category">Main Category </label>
                <select id="parent-category" name="parent_category" class="form-control">
                    <option value="0">Main Category</option>
                    @foreach($parent_categories as $parent_category)
                        <option value="{{$parent_category->id}}">{{$parent_category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('name', 'Name:')}}
                {{Form::text('name',null,['class'=>'form-control','autofocus','required'])}}
            </div>
            <div class="form-group">
                {{Form::label('image','Add Category Banner Image')}}
                {{Form::file('image',['class'=>'form-control'])}}
            </div>

            <div class="form-group">
                <select name="publication_status" class="form-control">
                    <option value="1">Published</option>
                    <option value="0">Un Published</option>
                </select>
            </div>
            {{Form::submit('Create New Category',['class'=>'btn btn-success btn-block'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
