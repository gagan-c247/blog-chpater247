@include('admin.adminlayout.header')
  
@foreach (['success','danger','warning'] as $session)
@if (Session::has($session))
      <div class="row mt-1">
          <div class="offset-2 col-8">
              <div class="alert alert-{{$session}} alert-dismissible fade show" role="alert">
                  <strong>{{$session}}!</strong> {{Session::get($session)}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          </div>
      </div>
@endif
  
@endforeach  

@yield('content')

@include('admin.adminlayout.footer')

