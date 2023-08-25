@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Update Product') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action = "{{url('/update-invoice',[$id])}}" method = "put">
                        @csrf
                        <label>Invoice Number</label>
                        <input type="text" class="form-control form-control-sm" name="inv_num" value="{{$invoice->invoice_number}}"><br>

                        <label>Invoice Date</label>
                        <input type="text" class="form-control form-control-sm" name="inv_date" value="{{$invoice->invoice_date}}"><br>

                        <label>Customer Name</label>
                        <input type="text" class="form-control form-control-sm" name="cust_name" value="{{$invoice->customer_name}}"><br><br>

                        <label>Product Name</label>
                        <input type="text" class="form-control form-control-sm" name="prod_name" value="{{$invoice->product_name}}">

                        <label>Quantity</label>
                        <input type="number" min=0 class="form-control form-control-sm" name="qty" value="{{$invoice->quantity}}">

                        <label>Price</label>
                        <input type="text" class="form-control form-control-sm" name="price" value="{{$invoice->price}}"><br>

                        <label>Total Amount</label><br><br>
                        <input type="text" class="form-control form-control-sm" name="total" value="{{$invoice->total}}"><br><br>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ url('/home') }}" class="btn btn-xs btn-default">Go back to Home</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
