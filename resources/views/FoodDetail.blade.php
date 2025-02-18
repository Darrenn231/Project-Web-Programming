@extends('./components/mainNav')
@section('title', 'Xiao Ding Dong')


@section('content')
<div class="container mt-5">
    <h1 class="text-warning">食物细节 | Food Detail</h1> 
</div>
<div class="container mt-5">
    <div class="card" style="height: 65vh; background-color:rgb(22, 22, 22)">
        <div class="row no-gutters">
            <div class="col-md-6">
                <img src="{{asset('foodImages/' .$items->item_image)}}" class="card-img" alt="Card Image" style="object-fit: cover;">
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h5 class="card-title text-warning">{{$items->item_name}}</h5><hr>
                    <h6 class="card-text text-warning">Food Type:</h6>
                    <p class ="card-text text-white">{{$items->item_category}}</p><hr>

                    <h6 class="card-text text-warning">Food Price:</h6>
                    <p class ="card-text text-white">${{$items->item_price}}</p><hr>

                    <h6 class="card-text text-warning">Brief Description:</h6>
                    <p class ="card-text text-white">{{$items->bdesc}}</p><hr>

                    <h6 class="card-text text-warning">About This Food</h6>
                    <p class ="card-text text-white">{{$items->desc}}</p><hr>

                    @can('isUser')
                    <form action ="{{route('addCart', $items->id)}}" method = "POST">
                        @csrf
                        <input type="submit" name="button" class="btn btn-dark text-warning" value="Add to Cart">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                <script>
                                    setTimeout(function() {
                                        document.querySelector('.alert').style.display = 'none';
                                    }, 5000);
                                </script>
                            </div>
                        @endif
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection