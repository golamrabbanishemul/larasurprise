@extends('admin.admin_master')
@section('main_content')
    <div class="container">
        <div class="row">
            <div class="card mt-3">
                <div class="card-header">
                    EDIT CATEGORY
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
                    {!! Form::model($category,['route'=>['category.update',$category->id],'method'=>'PUT', 'files'=>true]) !!}
                    <div class="form-group">
                        {{Form::label('name','Edit Category Name')}}
                        {{Form::text('name',null,['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        <label for="parent_cat">Parent Category</label><br>
                        <select name="parent_cat" id="parent_cat" class="form-control">
                            <option value="0">Parent Category</option>
                            @foreach($allcat as $catrec)
                                <option value="{{$catrec['id']}}">
                                    {{$catrec['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Current Image</label><br>
                        <img src="{{asset('images/'.$category->image)}}" width="80" height="80" alt="">
                    </div>

                    <div class="form-group">
                        {{Form::label('image','Banner Image')}}
                        {{Form::file('image',['class'=>'form-control'])}}
                    </div>

                    <div class="form-group">
                        {{Form::label('publication_status','Publication Status')}}
                        <br>
                        {{Form::select('publication_status',['Un Published','Published'],null,['class'=>'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::submit('Update',['class'=>'btn btn-info'])}}
                        {{Html::linkRoute('category.index','Cancel',[],['class'=>'btn btn-danger'])}}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection