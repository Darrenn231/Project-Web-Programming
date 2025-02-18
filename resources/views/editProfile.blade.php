@extends('./components/mainNav')
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
<div class="container mt-3">
    <h2>Update Profile</h2>
    <form action="{{ route('update', $user->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name" class="text-warning">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email" class="text-warning">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone_number" class="text-warning">Phone Number</label>
            <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address" class="text-warning">Address</label>
            <textarea name="address" class="form-control" required>{{ $user->address }}</textarea>
        </div>

        <div class="form-group">
            <label for="profile_image" class="text-warning">Profile Image</label>
            <input type="file" name="profile_image" class="form-control-file" style="background-color: white">
        </div>

        <div class="form-group">
            <label for="password" class="text-warning">Current Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>

@endsection