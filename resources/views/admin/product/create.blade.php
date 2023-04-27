@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Product</h4>
                    <form action="{{ route('admin.product.store') }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="cat_id">Select Category</label>
                                <select class="form-control @error('cat_id') is-invalid @enderror"
                                    id="cat_id" name="cat_id">
                                    <option value="">Select Category</option>
                                    @foreach ($cat as $val)
                                        <option value="{{ $val->id }}">
                                            {{ $val->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cat_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="name">Product Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                          
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="unique_code">Unique Code</label>
                                    <input type="text" class="form-control @error('unique_code') is-invalid @enderror"
                                        id="unique_code" name="unique_code" value="{{ old('unique_code') }}">
                                    @error('unique_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
							<div class="col-md-6">
                                 <div class="form-group">
                                    <label for="product_unit">Unit</label>
                                    <input type="text" class="form-control @error('product_unit') is-invalid @enderror"
                                        id="product_unit" name="product_unit" value="{{ old('product_unit') }}">
                                    @error('product_unit')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="product_stock">Stock Qty</label>
                                    <input type="number" min="0"  class="form-control @error('product_stock') is-invalid @enderror"
                                        id="product_stock" name="product_stock" value="{{ old('product_stock') }}">
                                    @error('product_stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}">
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="textarea" class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description"  value="{{ old('description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                              
                            
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_img">Upload Image</label>
                                    <input type="file" class="form-control @error('product_img') is-invalid @enderror"
                                        id="city" name="product_img" value="{{ old('product_img') }}">
                                    @error('product_img')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            </div>
                            

                        
                        <div class="float-right">
                            <a href="{{ route('admin.product.index') }}" class="btn btn-outline-primary">Back</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
