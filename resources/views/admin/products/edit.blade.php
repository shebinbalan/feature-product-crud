@extends('layouts.admin')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

<div class="card">
    <div class="card-header">
        <h4>Edit Products</h4>
        <div class="float-right">
            <a href="{{ url('products') }}" class="btn btn-primary">Back</a> 
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card-body">
    <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data" >
        @method('PUT')
        @csrf
        <div class="row">
       
        <div class="col-md-12 mb-3">
                    <label for="post_id" class="form-label">Posts</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">Select Post</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-12 mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" name="name" id="name" value="{{$product->name}}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{$product->slug}}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
            </div>
            <div class="col-md-12 mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" name="price" id="price"  value="{{$product->price}}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity"  value="{{$product->quantity}}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
                    @if($product->image)
                    <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="product-image" alt="Image here" style="width:100px;height:100px;">
                        @endif
        
            </div>
            <div class="col-md-12 mb-3">
                <label for="title" class="form-label">Status</label>
                <select class="form-control" name="status">
                        <option {{old('status',$product->status == 0 )? 'selected' :''}} value="0">Active</option>
                        <option {{old('status',$product->status == 1 )? 'selected' :''}} value="1">Inactive</option>
                    </select>
            </div>
            
           
            <div class="col-md-12">
             <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection