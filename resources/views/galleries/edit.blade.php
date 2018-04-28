@extends('admin.admin_master')
@section('title','Edit Gallery')
@section('main_content')
    <div class="col-sm-10">
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
            <div class="col-sm-12">
                <div class="form-group">
                    {{Form::label('publication_status','Publication Status')}}
                    <br>
                    {{Form::select('publication_status',['Un Published','Published'],null,['class'=>'form-control'])}}
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div> {!! Form::close() !!}</div>
    </div><!--/row-->
    </div><!--/row-->
@endsection
