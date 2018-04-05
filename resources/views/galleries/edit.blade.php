@extends('admin.admin_master')
@section('main_content')
    <div class="card mt-3">
        <div class="card-header"><h2>Edit Gallery</h2></div>
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
                {!! Form::model($gallery,['route'=>['galleries.update',$gallery->id],'method'=>'PUT','files'=>true]) !!}
                <div class="form-group">
                    {{Form::label('title','Title')}}
                    {{Form::text('title',null,['class'=>'form-control'])}}
                </div>
            </div>
                
            <div class="col-sm-6">
                <div class="form-group">
                    {{Form::label('image','Current Image')}}<br>
                    <img src="{{asset('gallery_images/'.$gallery->image)}}" alt="image" width="80" height="80">
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
                        @if($gallery->publication_status > 0 )
                            <option selected value="{{$gallery->publication_status}}">Publish</option>
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
