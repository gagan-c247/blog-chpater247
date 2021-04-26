@extends('admin.app',['title' => $blog->exists ? 'Edit Blog' : 'Create Blog'])

@section('content')

<div class="row">
    <div class="offset-2 col-8">
        <div class="card">
            <div class="card-body">
                {!!
                    Form::model($blog,[
                        'route'=> $blog->exists ? ['blog.update',$blog->id] : ['blog.store'],
                        'method'=> $blog->exists ? 'PUT' : 'POST',
                        'id' => 'form_blog_id',
                        'class'=> 'form-horizontal form-material',
                        'Files'=>true,
                    ])    
                !!}
                {{-- <form action="{{route('blog.update',$blog->id)}}" method="PUT" class="form-horizontal form-material"> --}}
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Blog Title</label>
                        <div class="col-md-12 border-bottom p-0">
                            <input type="text" name="title" placeholder="Johnathan Doe" class="form-control p-0 border-0" value="{{isset($blog->title) && $blog->title != '' ? $blog->title : ''}}"> </div>
                    </div>
                    <div class="form-group mb-4">
                        <label class="col-md-12 p-0">Blog Content</label>
                        <div class="col-md-12 border-bottom p-0">
                            <textarea rows="5" name="content" class="form-control p-0 border-0">{{isset($blog->content) && $blog->content != '' ? $blog->content : ''}}</textarea>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-success">{{ $blog->exists ?  'Edit' : 'Create'}}</button>
                        </div>
                    </div>
                {{-- </form> --}}
                {!! Form::close()!!}
            </div>
        </div>
    </div>
</div>

@endsection