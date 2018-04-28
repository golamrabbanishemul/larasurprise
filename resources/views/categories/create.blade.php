@extends('admin.admin_master')
@section('title','Create Category')
@section('main_content')
    <div class="col-sm-10 mb-5 pb-5">
        <div class="card mt-3">
            <div class="card-header">
                <div class="d-inline pr-4">CREATE CATEGORIES</div>
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
                {!! Form::open(['route'=>['category.store'],'files'=>true]) !!}
                <div class="form-group">
                    <label for="parent-category">Main Category </label>
                    <select id="parent-category" name="parent_category" class="form-control">
                        <option value="0">Main Category</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="sub_category">Sub Category </label>
                    <select id="sub_category" name="sub_category" class="form-control">
                        {{--<option value="">Select Sub Category</option>--}}
                    </select>
                </div>
                    <div class="form-group">
                    <label for="sub_sub_category">Sub Sub Category </label>
                    <select id="sub_sub_category" name="sub_subcategory" class="form-control">
                        {{--<option value="">Select Sub Category</option>--}}
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('name', 'Name:')}}
                    {{Form::text('name',null,['class'=>'form-control','autofocus','required'])}}
                </div>
                <div class="form-group">
                    {{Form::label('title', 'Title:')}}
                    {{Form::text('title',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::textarea('description',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    <label for="position">Select Position</label>
                    <select name="position" id="position" class="form-control">
                        <option value="">Select Position</option>
                        <option value="1">Position-1</option>
                        <option value="2">Position-2</option>
                        <option value="3">Position-3</option>
                        <option value="4">Position-4</option>
                        <option value="5">Position-5</option>
                        <option value="6">Position-6</option>
                        <option value="7">Position-7</option>
                    </select>
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
    </div>
@endsection
