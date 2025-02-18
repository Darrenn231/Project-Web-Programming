@extends('./components/mainNav')


@section('title', 'Xiao Ding Dong')

@section('content')
    <h1 class = "container mt-3 text-warning">搜索食物 | Search Food</h1>
    <div class = "container mt-3">
        <form action="/search" method = "POST">
            <div class="input-group mb-3 ">
                @csrf
                <input type="text" class="form-control w-75" placeholder="Search" name = "search">
                <button class="btn btn-dark my-2 my-sm-0 text-white" type="submit" name = "button"  value ="1">Search</button>
            </div>
        </form>
        <div style="color: white; background-color:rgb(22, 22, 22)">
            <form id="search-form" action="{{route('submit')}}" method="post">
                @csrf
                <label><input type="checkbox" name="category[]" value="Main Course">Main Course</label>
                <label><input type="checkbox" name="category[]" value="Dessert">Dessert</label>
                <label><input type="checkbox" name="category[]" value="Beverage">Beverage</label> 
            </form>
        </div>
        <hr>
        @if($items->isEmpty())
        <div class="container" style="background-color: rgb(37, 37, 37); height:40px; text-align:center; color:white"><h5>Food is not available</h5></div>
        @endif
        <br>

        <div class="container">
            <div class="row">
                @foreach($items as $item)
                <div class="col-md-6 mb-3">
                <a href="{{url('foodDetail', $item->id)}}" style="text-decoration: none;">
                <div class="card" style="background-color:rgb(22, 22, 22)">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('foodImages/' .$item->item_image)}}" class="card-img" alt="Card image">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body text-white">
                                <h5 class="card-title">{{$item->item_name}}</h5>
                                <h6>category</h6>
                                <p class="card-text">{{$item->item_category}}</p>
                                <hr>
                                <h6>Description</h6>
                                <p class="card-text">{{$item->bdesc}}</p>
                            </div>

                        </div>
                    </div>
                </div>
                </a>
                </div>
                @endforeach
            </div>

        </div>
        </div>



        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script>
            $(document).ready(function () {
                $('input[type=checkbox]').on('change', function () {
                    $('#search-form').submit();
                });
            });
        </script>
@endsection