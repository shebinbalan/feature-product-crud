@extends('layouts.admin')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">
        <h4>Show Products</h4> 
        <div class="float-right"> 
            <a href="{{ url('products') }}" class="btn btn-primary">Back</a> 
        </div>
    </div>
    <div class="card-body">
  
      
        <div class="row">
        <div class="col-md-12 mb-3">
                <label for="due_date" class="form-label">User Name</label>
                <input type="" class="form-control" name="name" id="title" value="{{ $product->category->name }}" readonly>  
            </div>
            <div class="col-md-12 mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="" class="form-control" name="name" id="name" value="{{ $product->name }}" readonly>  
            </div>
            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="" class="form-control" name="description" id="description" value="{{ $product->description }}" readonly>  
            </div>
            <div class="col-md-12 mb-3">
                <label for="due_date" class="form-label">Price</label>
                <input type="" class="form-control" name="	price" id="	price" value="{{ $product->price }}" readonly>  
            </div>
            <div class="col-md-12 mb-3">
                <label for="title" class="form-label">Quantity</label>
                <input type="" class="form-control" name="name" id="name" value="{{ $product->quantity }}" readonly>  
            </div>
            <div class="col-md-12 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="" class="form-control" name="slug" id="slug" value="{{ $product->slug }}" readonly>  
            </div>
          
            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Status</label>
                <input type="" class="form-control" name="status" id="status" value="{{($product->status==0)? 'Active' :'Inactive'}}" readonly>  
            </div>
            <div class="col-md-12 mb-3">
                <label for="description" class="form-label">Image</label>
               
            </div>
            <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="product-image" alt="Image here" style="width:200px;height:200px;">
        </div>
   
</div>
</div>

@endsection