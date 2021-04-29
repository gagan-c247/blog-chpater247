@extends('user.layout.layout')
@section('header')
    <style>
        .blog{
            padding: 10px;
            border: 1px solid #c6c6c6;
            border-radius: 5px;
            background: #efe9e9;
        }
        .blog-title{
            border-top-right-radius: 42px;
            border-bottom-left-radius: 26px;
            border-top: 1px solid #fff;
            border-right: 1px solid #fff;
            background: #c29a64;
            color: #705736;
        }
        }
        .blog-img{
            text-align: center;
        }
        img{
            height: auto;
            width: 100%;
        }
        
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-2 col-8 mt-5">
                <h1 class="text-center font-weight-bold mb-5">Blogs</h1>
            </div>
            
            @if (isset($blogs) && $blogs != '')
            @foreach ($blogs as $blog)
            <div class="col-4">    
                <div class="blog mb-3">
                    <div class="blog-img ">
                        @if(isset($blog->file) && $blog->file != '')
                            <img src="{{url()->current().'/storage/images/'.$blog->file->filepath}}" alt="">
                        @else
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcPCPgExN5aLYw8z3XGz7e_C4V02yxwlcywg&usqp=CAU" alt="">
                        @endif
                    </div>
                    <div class="blog-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="text-uppercase font-weight-bold p-2 blog-title">{{$blog->title}}</h4>
                            </div>
                           <div class="col-md-4">
                               <div class="p-2" style="display:block;     
                                                        
                                                        font-size:13px;
                                                        padding: 2px;
                                                        ">
                                    <time class="font-weight-bold  text-right" >{{isset($blog->created_at) && $blog->created_at != '' ? Carbon\Carbon::parse($blog->created_at, 'UTC')->isoFormat(' d MMM YYYY') : ''}}</time>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                           <a href="{{route('singleblog',$blog->id)}}"> <p>{{$blog->content}}</p></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
@endsection
@section('footer')
    
@endsection

   