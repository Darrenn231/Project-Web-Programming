@extends('./components/mainNav')

@section('title', 'Xiao Ding Dong')


@section('content')
<div class="container mt-5">
    <h1 class = "text-warning">交易记录 | Transaction History</h1>

    @if($th->isEmpty())
        <div class="container" style="background-color: rgb(37, 37, 37); height:40px; text-align:center; color:white"><h5>Food is not available</h5></div>
        @else
        <table class="table">
    <thead style="background-color:rgb(22, 22, 22)">
      <tr>
        <th scope="col"class="text-warning text-center" style="width: 20%;">Transaction ID</th>
        <th scope="col"class="text-warning text-center" style="width: 20%;">Purchase Date</th>
        <th scope="col"class="text-warning text-center" style="width: 40%;">Food Name</th>
        <th scope="col"class="text-warning text-center" style="width: 20%;">Total Price</th>
        
      </tr>
    </thead>
    <tbody style="background-color:rgb(72, 72, 72)">
    @foreach($th as $ths)
      @foreach($ths->details as $td)
        <tr>
          <td class="text-white text-center">{{$td->transaction_id}}</td>
        <td class="text-white text-center">{{$td->created_at->format('Y-m-d')}}</td>
        <td class="text-white text-center">{{$td->food->item_name}}[x{{$td->quantity}}]</td>
        <td class="text-white text-center">${{$td->food->item_price * $td->quantity}}</td>
      </tr>
      @endforeach
    
    @endforeach
    </tbody>
</table>
    @endif

</div>
@endsection