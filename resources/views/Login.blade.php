
@extends('./components/LogRegNav')

@section('title', 'Xiao Ding Dong')


@section('error')
@if($errors->any())
<div class="fixed-top">  
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 14px;">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@endsection



@section('content')
<div class="container">
        <h1 class="text-white text-center">Login</h1>
        <form action="/login" method = "POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label text-white text-center">Email</label>
                <input type="email" class="form-control"  name="email" placeholder="Has to end with @gmail.com">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control"  name="password"  placeholder="Minimum 5 Characterd, Maximum 255">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label text-white" for="exampleCheck1">Remember me</label>
              </div>
            <div class = "mb-3 d-grid">
                <button type="submit" class="btn btn-secondary" href = "/">Login</button>
            </div>
            <div class = "text-white">Don't have an account? <a href ="/register" class="text-warning">Sign up</a></div>
        </form>
    
</div>
@endsection