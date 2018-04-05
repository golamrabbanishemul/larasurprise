@extends('admin.admin_master')

@section('main_content')
    <div class="card mt-3">
        <div class="card-header">
            <div class="d-inline pr-4">ALL POSTS</div>
            <div class="d-inline"><a href="{{route('posts.create')}}" class="btn btn-outline-primary btn-sm"> Add New
                    +</a></div>
        </div>
        <div class="card-body">
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
                @foreach( $posts as $post)
                    <tr>
                        <td>{{$post->title}}</td>
                        <td>
                            @if(!empty($post->image))
                                <img width="100" height="60" src="{{asset('images/'.$post->image)}}" alt="image">
                            @endif
                        </td>
                        <td>
                            @if($post->publication_status==1)
                                <a class="btn btn-success justify-content-center" href="{{asset('unpublished-post/'.$post->id)}}">
                                    <i class="far fa-thumbs-down"></i>
                                </a>
                            @else
                                <a class="btn btn-danger justify-content-center" href="{{asset('published-post/'.$post->id)}}">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            {!! Html::decode(Html::linkRoute('posts.edit','<i class="far fa-edit"></i>', [$post->id],['class'=>'btn btn-info','style'=>'float:left; margin-right:5px'])) !!}
                            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}
                            {{Form::button( '<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger','onclick'=>'return confirm("Are You Sure You Want To Delete This! ")'])}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
