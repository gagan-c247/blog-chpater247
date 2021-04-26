@extends('user.layout.layout')
@section('header')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script> --}}

@endsection
@section('content')
    <div class="container">
        <table class="table" id="table_id">
            <thead>
                <tr>
                    <th width="10%">#id</th>
                    <th width="20%">title</th>
                    <th width="50%">content</th>
                    <th width="10%">Created At</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($blogs) && $blogs != '[]')
                    @foreach ($blogs as $blog)
                        <tr>
                            <td>
                                {{'#'.$blog->id}}
                            </td>
                            <td class="font-weight-bold">
                                {{isset($blog->title) && $blog->title != '' ? $blog->title : ''}}
                            </td>
                            <td>
                                {{ isset($blog->content) && $blog->content != '' ? $blog->content : ''}}
                            </td>
                            <td>
                                {{isset($blog->created_at) && $blog->created_at != '' ? Carbon\Carbon::parse($blog->created_at, 'UTC')->isoFormat(' d MMM YYYY, h:mm a') : ''}}
                            </td>
                            <td>
                                <a href="{{route('blog.edit',$blog->id)}}"  > <i class="fa fa-edit" style="font-size:20px"></i></a>
                                 <a href=""  ><i class="fa fa-trash" style="font-size:20px"></i></a> 
                            </td>
                        </tr>
                    @endforeach
                @else
                
                        <tr   class="text-center font-weight-bold">
                            <td colspan="3" rowspan="5"  > 
                                <h3>Sorry No data Found!</h3>
                            </td>
                        </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
@endsection