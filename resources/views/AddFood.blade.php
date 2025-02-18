@extends('./components/mainNav')

@section('title', 'Xiao Ding Dong')


@section('content')

    <div class="container mt-3">
        <h2 class="text-warning">添加新食物 | Add New Food</h2>
        <form action="{{ route('addFood') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="item_name" class="text-warning">Food Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Minimum 5 Character" required>
            </div>

            <div class="form-group">
                <label for="bdesc" class="text-warning">Food Brief Description</label>
                <input type="text" class="form-control" id="bdesc" name="bdesc" placeholder="Maximum 100 Character" required>
            </div>

            <div class="form-group">
                <label for="desc" class="text-warning">Food Full Description</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Maximum 255 Character" required></textarea>
            </div>

            <div class="form-group">
                <label for="item_category" class="text-warning">Food Category:</label>
                <input type="text" class="form-control" id="item_category" name="item_category" placeholder="Category" required>
            </div>

            <div class="form-group">
                <label for="item_price" class="text-warning">Food Price</label>
                <input type="number" class="form-control" id="item_price" name="item_price" placeholder="Must be greater than 0" required>
            </div>

            <div class="form-group">
                <label for="item_image" class="text-warning">Food Picture</label>
                <input type="file" class="form-control" id="item_image" name="item_image">
            </div>
            
            <a href="/" class="btn btn-secondary" style="background-color: rgb(22, 22, 22); color:white;">Cancel</a>
            <button type="submit" class="btn btn-secondary"  style="background-color:rgb(22, 22, 22); color:white">Save</button>
        </form>
    </div>

@endsection