@extends('admin.admin_master')
@section('title','Edit Gallery Image')
@section('main_content')
    <div class="col-sm-10">
        <div class="card mt-3">
            <div class="card-header"><h2>Edit Gallery Image</h2></div>
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
                {!! Form::model($galleryPost,['route'=>['gposts.update',$galleryPost->id],'method'=>'PUT','files'=>true]) !!}
                <div class="form-group">
                    {{Form::label('image','Current Image')}}<br>
                    <img src="{{asset('gallery_images/'.$galleryPost->image)}}" alt="image" width="80" height="80">
                </div>

                <div class="form-group">
                    {{Form::label('image','Gallery Image')}}
                    {{Form::file('image', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{Form::label('title','Caption')}}
                    {{Form::text('title',null,['class'=>'form-control'])}}
                </div>
                <div class="form-group">
                    <label for="gallery_id">Select Gallery</label>
                    <select name="gallery_id" id="gallery_id" class="form-control">
                        @foreach($galleries as $gallery)
                            @if($gallery->id == $galleryPost->gallery_id)
                                <option selected value="{{$gallery->id}}">{{$gallery->title}}</option>
                            @else
                                <option value="{{$gallery->id}}">{{$gallery->title}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('publication_status','Publication Status')}}
                    <br>
                    {{Form::select('publication_status',['Un Published','Published'],null,['class'=>'form-control'])}}
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-default">Cancel</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection
