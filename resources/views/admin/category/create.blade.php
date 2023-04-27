@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    <form action="{{ route('admin.category.store') }}" class="form-sample" method="post" enctype='multipart/form-data'>
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">

                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="description">description</label>
                                    <input type="textarea" class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description"  value="{{ old('description') }}">
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                             
                            
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cat_image">Upload Image</label>
                                    <input type="file" class="form-control @error('cat_image') is-invalid @enderror"
                                        id="city" name="cat_image" value="{{ old('cat_image') }}">
                                    @error('cat_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            

                        </div>
                        <div class="float-right">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-outline-primary">Back</a>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
