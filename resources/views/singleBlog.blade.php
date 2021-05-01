@extends('user.layout.layout')
@section('header')
@endsection
@section('content')
    <div class="row">
        <div class="offset-2 col-md-8">
            <main class="border">
                <div class="text-center img-fluid">
                    <img src="https://images.template.net/wp-content/uploads/2014/11/wallpaper-for-facebook-cover-page.jpg" alt="">
                </div>
                <header class="mr-5 ml-5">
                    <div class="border">
                        <h1 class="text-center">{{$blog->title ?? ''}}</h1>
                        <p class="text-center">{{$blog->created_at ?? ''}}</p>
                        <p class="text-center"><span class="font-weight-bold">category: </span>{{$blog->blogcategory->category->name ?? '-'}}</p>
                    </div>
                </header>

                <section class="p-4">
                    <p class="text-center">{{$blog->content ?? ""}}</p>
                </section>
                <footer>
                    @forelse ($blog->comment as $comment)
                        <div class="row">
                            <div class=" col-12">
                            <div class="comment  p-3 border-top   ">
                                <h1 class="text-capitalize">{{$comment->title}}</h1>
                                <p >{{$comment->content}} 
                                </p>
                                <span class="text-right font-weight-bold">-Ajay </span><span>{{$comment->created_at ?? ""}}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-center font-weight-bold">No Comment found!!!</p>
                    @endforelse
                 
                </footer>
            </main>

            <footer class="mt-3">
                <div class="row">
                    <div class="offset-2 col-md-8">
                        <h5 class="font-weight-bold">Comment Section</h5>
                        <form action="{{route('comment.store')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">name</label>
                                        <input type="text" name="name" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">title</label>
                                        <input type="text" name="title" value="" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
            
                            <div class="form-group">
                                <label for="">Comment</label>
                                <textarea type="text" name="comment" value="" class="form-control"></textarea>
                                <input type="hidden" name="blog_id" value="{{$blog->id ?? ''}}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </footer>


        </div>
    </div>
@endsection
@section('footer')
@endsection
