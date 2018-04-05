@extends('admin.admin_master')
@section('main_content')
    <div class="card mt-3">
        <div class="card-header"><h2>Edit Post</h2></div>
        <div class="card-body">

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-sm-12">
                {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT','files'=>true]) !!}
                <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title',null,['class'=>'form-control'])}}
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    {{Form::label('description','Post Description')}}
                    {{Form::textarea('description', null, ['class'=>'form-control']) }}
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        @foreach($categories as $category)
                            @if($category->id == $post->category_id)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('home','Show Home Page')}}
                    {{Form::checkbox('home',null, ['class'=>'checkbox-inline']) }}
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('image','Current Image')}}<br>
                    <img src="{{asset('images/'.$post->image)}}" alt="image" width="80" height="80">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('image','Post Image')}}
                    {{Form::file('image', ['class' => 'form-control']) }}
                </div>
            </div>


            <div class="col-sm-12">
                <div class="form-group">
                    <select name="publication_status"
                            class="form-control">
                        @if($post->publication_status > 0 )
                            <option selected value="{{$post->publication_status}}">Publish</option>
                        @endif
                        <option value="0">Un Publish</option>
                        <option value="1">Publish</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div> {!! Form::close() !!}</div>
    </div><!--/row-->
@endsection
