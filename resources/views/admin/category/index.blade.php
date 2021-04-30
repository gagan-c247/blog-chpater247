@extends('admin.app',['title'=>'Category'])

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">{{$category->exists ? 'Edit' : 'Add'}} Category</h3>
            </div>
            {!!Form::model($category,[
                'route' => $category->exists ? ['category.update',$category->id] : ['category.store'],
                'method' => $category->exists ? 'PUT' : 'POST',
                'id'=> 'category_form_id',
                'files' => true,
                ])!!}
            {{-- <form method="POST" action="{{route('category.store')}}"> --}}
                @csrf
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="">name</label>
                    <input type="text" class="form-control" name="name" value="{{$category->name ?? ''}}">
                   
                </div>
              
                <div class="form-group form-check-inline text-md-center">
                    <label for=""></label>
                    <input type="radio" class="form-check-input" name="type" value="block" checked> Block
                </div>

                <div class="form-group ">
                    <div class="d-block">
                    <input type="submit" class=" btn btn-primary w-100">
                </div>
                </div>
            {{-- </form> --}}
            {{Form::close()}}
        </div>
    </div>
    <div class="col-md-8">
        <div class="white-box">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Created_at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categoies as $category)
                        <tr>
                            <td>{{$category->name ?? '' }}</td>
                            <td class="text-capitalize">{{$category->type ?? '' }}</td>
                            <td> {{$category->created_at ??  '' }}</td>
                            <td>
                                <a href=""><i class="fa fa-trash"></i></a>
                                <a href="{{route('category.edit',$category->id)}}"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                   
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection