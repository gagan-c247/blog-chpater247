@extends('admin.app',['title'=>'All User'])

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <div class="white-box">
            <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">All User</h3>
                <div class="col-md-3 col-sm-4 col-xs-6 ms-auto">
                    <select class="form-select shadow-none row border-top">
                        <option>March 2021</option>
                        <option>April 2021</option>
                        <option>May 2021</option>
                        <option>June 2021</option>
                        <option>July 2021</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table no-wrap">
                    <thead>
                        <tr>
                            <th class="border-top-0">#</th>
                            <th class="border-top-0">Name</th>
                            <th class="border-top-0">Status</th>
                            <th class="border-top-0">Email</th>
                            <th class="border-top-0">Created At</th>
                            <th class="border-top-0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($alluser) && $alluser != '')
                        @foreach ($alluser as $user)
                        @if ($user->user != '')
                        <tr>
                            <td>{{isset($user->id) && $user->id != '' ?'#'.$user->id : ''}}</td>
                            <td class="txt-oflo text-capitalize">{{isset($user->name) && $user->name != '' ?$user->name : ''}}</td>
                            <td>-</td>
                            <td class="txt-oflo">{{isset($user->email) && $user->email != '' ? $user->email  : ''}}</td>
                            <td><span class="text-success">{{isset($user->created_at) && $user->created_at != '' ? Carbon\Carbon::parse($user->created_at, 'UTC')->isoFormat(' d MMM YYYY, h:mm a') : ''}}</span></td>
                            <td>
                                <a href="" ><i class="fa fa-edit text-dark"></i></a>
                                <a href=""><i class="fa fa-trash text-danger"></i></a>
                            </td>
                        </tr>
                        @endif
                        
                        
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection