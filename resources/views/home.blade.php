<!DOCTYPE html>
<head>
    <title>Laravel Inventory</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<style>

.laravel{
  background-color: #00001a;
}
.products {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.products td, .productss th {
  border: 1px solid #ddd;
  padding: 8px;
}

.products tr:nth-child(even){background-color: #f2f2f2;}

.products tr:hover {background-color: #ddd;}

.products th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ff3333;
  color: white;
}
.form{
 display:none;
}
.card-header{
  text-align:center;
}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 8px 10px;
  text-align: center;
  text-decoration: none;
  float: right;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
.preview {
  background-color: white;
  color: black;
  border: 2px solid #001133;
}

.preview:hover {
  background-color: #001133;
  color: white;
}
</style>
</head>
<body class="laravel">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>{{ __('Product List') }}</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table id="products" class="products">
                        <tr>
                            <th>Product Name</th>
                            <th style="text-align: center;">Unit</th>
                            <th style="text-align: center;">Price</th>
                            <th>Date of Expiry</th>
                            <th>Available Inventory</th>
                            <th>Available Inventory Cost</th>
                            <th>Image</th>
                            <th colspan="2" style="text-align: center;">Actions</th>

                        </tr>
                        @foreach($products as $data)

                            <tr>
                            <td>{{$data->product_name}}</td>
                            <td>{{$data->unit}}</td>
                            <td>{{$data->price}}</td>
                            <td>{{$data->date_of_expiry}}</td>
                            <td>{{$data->available_inventory}}</td>
                            <td>{{$data->available_inventory_cost}}</td>
                            <td>{{$data->image}}</td>
                            <td><a href="#" onclick="document.getElementById('updateProductForm').style.display='block'">Edit</a></td>
                            <td><a href="{{ url('/delete-product',[$data->id]) }}">Delete</a></td>
                            </tr>

                            <div id="updateProductForm" class="w3-modal">
                            <div class="w3-modal-content">
                                <header class="w3-container w3-red">
                                <span onclick="document.getElementById('updateProductForm').style.display='none'"
                                    class="w3-button w3-display-topright">&times;</span>
                                <h1>Update Product</h1>
                                </header>

                                <div class="w3-container">
                                    <form action="{{ url('/update-product',[$data->id]) }}" method="post">
                                                        @csrf
                                                        <label>Product Name</label>
                                                        <input type="text" class="form-control form-control-sm" name="product_name">

                                                        <label>Unit</label>
                                                        <input type="text" class="form-control form-control-sm" name="unit">

                                                        <label>Price</label>
                                                        <input type="text" class="form-control form-control-sm" name="price">

                                                        <label>Date of Expiry</label>
                                                        <input type="text" class="form-control form-control-sm" name="date_of_expiry">

                                                        <label>Available Inventory</label>
                                                        <input type="number" class="form-control form-control-sm" name="available_inventory">

                                                        <label>Available Inventory Cost</label>
                                                        <input type="text" class="form-control form-control-sm" name="available_inventory_cost">

                                                        <label>Image</label>
                                                        <input type="text" class="form-control form-control-sm" name="image">

                                                        <button type="submit" class="button preview">Update</button>
                                    </form>
                                </div>
                            </div>
                            </div>
                        @endforeach
                    </table>
                <button onclick="document.getElementById('createProductForm').style.display='block'" class="button preview">Add Product</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="createProductForm" class="w3-modal">
  <div class="w3-modal-content">

    <header class="w3-container w3-red">
    <span onclick="document.getElementById('createProductForm').style.display='none'"
        class="w3-button w3-display-topright">&times;</span>
      <h1>Add Product</h1>
    </header>

    <div class="w3-container">
    <form action="{{url('/create-product')}}" method="post">
                        @csrf
                        <label>Product Name</label>
                        <input type="text" class="form-control form-control-sm" name="product_name">

                        <label>Unit</label>
                        <input type="text" class="form-control form-control-sm" name="unit">

                        <label>Price</label>
                        <input type="text" class="form-control form-control-sm" name="price">

                        <label>Date of Expiry</label>
                        <input type="text" class="form-control form-control-sm" name="date_of_expiry">

                        <label>Available Inventory</label>
                        <input type="number" class="form-control form-control-sm" name="available_inventory">

                        <label>Available Inventory Cost</label>
                        <input type="text" class="form-control form-control-sm" name="available_inventory_cost">

                        <label>Image</label>
                        <input type="text" class="form-control form-control-sm" name="image">

                        <button type="submit" class="button preview">Create</button>
    </form>
    </div>
  </div>
</div>
</body>
</html>


