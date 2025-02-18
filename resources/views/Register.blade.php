@extends('./components/LogRegNav')

@section('title', 'Xiao Ding Dong')

@section('error')
@if($errors->any())
<div class="fixed-top">  
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="padding: 8px; font-size: 14px;">
        <strong>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@endif
@endsection

@section('content')
<div class="container">
    
        <h2 class="text-white text-center">Register</h2>
        <form method="POST" action="{{ url('/register') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="text-white">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Has to end with @gmail.com">
            </div>

            <div class="mb-3">
                 <label for="name" class="text-white">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Minimum 5 Characters, Maximum 50 Characters">
            </div>
            
            <div class="mb-3">
                <label for="password" class="text-white">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Minimum 5 Characters, Maximum 255 Characters">
            </div>
            <div class="mb-3">
                <label for="Cpassword" class="text-white">Confirm Password</label>
                <input type="password" name="Cpassword" class="form-control" placeholder="Has to be the same with Password">
            </div>
        
            <button type="submit" class="btn btn-secondary">Register</button>
            <div class = "text-white">Already have an account? <a href ="/login" class="text-warning">Login</a></div>
</div>
@endsection