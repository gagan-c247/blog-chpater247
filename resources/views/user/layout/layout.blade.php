@include('user.layout.header')

    
      @foreach (['success','danger','warning'] as $session)
      @if (Session::has($session))
        <div class="container">
            <div class="row mt-5">
                <div class="offset-3 col-md-6">
                    <div class="alert alert-{{$session}} alert-dismissible fade show" role="alert">
                        <strong>{{$session}}!</strong> {{Session::get($session)}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      @endif
        
      @endforeach  
    
  
@yield('content')
@include('user.layout.footer')
