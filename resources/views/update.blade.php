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
        <h2 class="text-warning">更新食物 | UpdateFood</h2>
        <div class="container">
    
            <form method="POST" action="{{ route('updateFood', ['id' => $items->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="form-group">
                    <label for="item_name" class="text-warning">Item Name:</label>
                    <input type="text" name="item_name" placeholder="{{ old('item_name', $items->item_name) }}" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="bdesc" class="text-warning">Brief Description:</label>
                    <input type="text" name="bdesc" class="form-control" placeholder="{{ old('bdesc', $items->bdesc) }}" required>
                </div>
    
                <div class="form-group">
                    <label for="desc" class="text-warning">Detailed Description:</label>
                    <input type="text" name="desc" class="form-control" placeholder="{{ old('desc', $items->desc) }}" required>
                </div>
    
                <div class="form-group">
                    <div class="form-group">
                        <label for="Category" class="text-warning">Category</label>
                        <select class="form-control" id="country" name="item_category">
                          <option value="" disabled selected>Select food category</option>
                          <option value="Main Course">Main Course</option>
                          <option value="Beverage">Beverage</option>
                          <option value="Dessert">Dessert</option>
                        </select>
                    </div>
                </div>
    
                <div class="form-group">
                    <label for="item_price" class="text-warning">Price:</label>
                    <input type="number" name="item_price" placeholder="{{ old('item_price', $items->item_price) }}" class="form-control" required>
                </div>
    
                <div class="form-group">
                    <label for="item_image" class="text-warning">Image:</label>
                    <input type="file" name="item_image" class="form-control">
                </div>
    
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
    
        </div>

@endsection