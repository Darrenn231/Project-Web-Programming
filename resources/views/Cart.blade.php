@extends('./components/mainNav')

@section('title', 'Xiao Ding Dong')


@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-12 mx-auto">
        <h1 class="text-warning">你的购物车 | Your Cart</h1>
        @if($items->isEmpty())
        <div class="container text-warning" style="background-color: rgb(37, 37, 37); height:40px; text-align:center;"><h5>Your Cart is empty.....</h5></div>
        @else
        <table class="table">
          <thead style="background-color:rgb(22, 22, 22)">
            <tr>
              <th scope="col"class="text-warning text-center" style="width: 30%;">Food</th>
              <th scope="col"class="text-warning text-center" style="width: 10%;">Price</th>
              <th scope="col"class="text-warning text-center" style="width: 20%;">Quantity</th>
              <th scope="col"class="text-warning text-center" style="width: 20%;">Total</th>
              <th scope="col"class="text-warning text-center" style="width: 20%;"></th>
            </tr>
          </thead>
          <tbody style="background-color:rgb(72, 72, 72)">
            @php
                  $sum=0;
            @endphp
          @foreach($items as $item)
           <tr>
            <td class="text-white text-center">{{$item->food->item_name}}</td>
            <td class="text-white text-center">${{$item->food->item_price}}</td>
            <td class="text-white text-center">
              <input type="number" value = {{$item->quantity}} min="1" class="form-control" name="quantity" style="width: 70px">
            </td>
            <td class="text-white text-center">${{$item->quantity * $item->food->item_price}}</td>
            <td class="text-white text-center">

            <form action = "{{route('remove', $item->food_id)}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn-btn secondary text-warning" style="background-color: rgb(22, 22, 22)">Remove</button>
            <form>
            </td>
          </tr>
          @php
              $sum += $item->quantity * $item->food->item_price;
          @endphp
          @endforeach
          </tbody>
        </table>
         <h1 style="color: white; text-align:right;">Total Price: ${{$sum}}</h1>
         <div style="text-align: right"><a href="/checkout" style="text-decoration: none" class="btn btn-secondary text-warning">checkout</a></div>
        @endif
      </div>
    </div>
  </div>
@endsection