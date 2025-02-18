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
<div class="container mt-5">
    <h1 style="text-align: center" class="text-warning">查看 | Checkout</h1>
    <h3 style="color: white">Billing Information</h3>
</div>

<div class="container mt-3">
    <form action="{{route('checkout')}}" method="POST">
      @csrf
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="fullName" class="text-warning">Full Name</label>
              <input type="text" class="form-control"  name="fullName">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="phone_number" class="text-warning">Phone Number</label>
              <input type="text" class="form-control"  name="phone_number">
            </div>
          </div>
        </div>
  
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
                <label for="country" class="text-warning">Country</label>
                <select class="form-control" id="country" name="country">
                  <option value="" disabled selected>Select your country</option>
                  <option value="Indonesia">Indonesia</option>
                  <option value="Netherland">Netherland</option>
                  <option value="monaco">Monaco</option>
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="city" class="text-warning">City</label>
              <input type="text" class="form-control"  name="city">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="cardName" class="text-warning">Card Name</label>
              <input type="text" class="form-control"  name="cardName">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="card_number" class="text-warning">Card Number</label>
              <input type="text" class="form-control"  name="card_number">
            </div>
          </div>
        </div>

        <h3 style="color: white">Additional Information</h3>

        <label for="Address" class="text-warning">Address</label>
        <input type="text" class="form-control"  name="address">
        
        <label for="zip" class="text-warning">ZIP/Postal Code</label>
        <input type="text" class="form-control"  name="zip">
        <br>

        <div style="text-align: right">
            <a href="/cart" class="btn btn-secondary text-warning" style="text-decoration: none">Cancel</a>
            <button class="btn btn-secondary text-warning">Place Order</button>
        </div>
    </form>
</div>


    

@endsection