
@extends('./components/mainNav')

@section('title', 'Xiao Ding Dong')

@section('content')
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
<div class="container mt-5 ">
    <h1 class="text-info text-warning">菜单 | Menu</h1><br>
    <form action = "/category" method = "POST">
      @csrf
      <button type="submit" class="btn text-warning" name = "button1" style="background-color: rgb(22, 22, 22)" value="1">主菜 | Main Course</button>
  
      <button type="submit" class="btn text-warning" name = "button2" style="background-color: rgb(22, 22, 22)" value="1">饮料 | Beverages</button>
  
      <button type="submit" class="btn text-warning" name = "button3" style="background-color: rgb(22, 22, 22)" value="1">甜点 | Desserts</button>
    </form>
</div>

<br>
@if($cat== 'Beverage')
  <div class="container mt-3 text-warning" style="background-color: rgb(37, 37, 37); height:50px; text-align:center"><h3>饮料 | Beverage</h3></div>
  @else
    @if($cat == 'Dessert')
      <div class="container mt-3 text-warning" style="background-color: rgb(37, 37, 37); height:50px; text-align:center"><h3>甜点 | Dessert</h3></div>
    @else
      @if($cat == 'Main Course')
      <div class="container mt-3 text-warning" style="background-color: rgb(37, 37, 37); height:50px; text-align:center"><h3>主菜 | MainCourse</h3></div>
      @else
      <div class="container mt-3 text-warning" style="background-color: rgb(37, 37, 37); height:50px; text-align:center"><h3>菜单 | Menu</h3></div>
      @endif
    @endif
@endif
<br>

<div class="container">
  <div class="row">
    @foreach ($items as $item)
    <div class="col-md-4 mb-4">
     <a href="{{url('foodDetail', $item->id)}}" style="text-decoration: none;">
        
          <div class="card card-fixed-size" style="width: 21rem; background-color:rgb(22, 22, 22)">
            <img src="{{ asset('foodImages/' . $item->item_image)}}" class="card-img-top img-fluid card-image" alt="Image Alt Text" style="max-height: 225px; min-height:225px">
            <div class="card-body">
              <h5 class="card-title text-warning">{{$item->item_name}}</h5>
            </div>
          </div>
     </a>  
      </div>   
    @endforeach
    
  </div>
</div>

@endsection