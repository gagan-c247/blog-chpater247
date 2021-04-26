@extends('admin.app',['title'=>'All Blog'])

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">Blog Detail</h3>
                {{-- <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                    <select class="form-select shadow-none row border-top">
                        <option>March 2021</option>
                        <option>April 2021</option>
                        <option>May 2021</option>
                        <option>June 2021</option>
                        <option>July 2021</option>
                    </select>
                </div> --}}
            </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr>
                            <th class="border-top-0" width="10%">#</th>
                            <th class="border-top-0" width="20%">title</th>
                            <th class="border-top-0" width="40%">Content</th>
                            <th class="border-top-0" width="10%">Created At</th>
                            <th class="border-top-0" width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($blogs) && $blogs != '')
                        @foreach ($blogs as $blog)
                        <tr>
                            <td>{{isset($blog->id) && $blog->id != '' ?'#'.$blog->id : ''}}</td>
                            <td class="txt-oflo text-capitalize">{{isset($blog->title) && $blog->title != '' ?$blog->title : ''}}</td>
                            <td class="txt-oflo">{{isset($blog->content) && $blog->content != '' ? $blog->content  : ''}}</td>
                            <td><span class="text-success">{{isset($blog->created_at) && $blog->created_at != '' ? Carbon\Carbon::parse($blog->created_at, 'UTC')->isoFormat(' d MMM YYYY, h:mm a') : ''}}</span></td>
                            <td>
                                <a href="{{route('blog.edit',$blog->id)}}" ><i class="fa fa-edit text-dark"></i></a>
                                <a href=""><i class="fa fa-trash text-danger"></i></a>  
                            </td>
                        </tr> 
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection