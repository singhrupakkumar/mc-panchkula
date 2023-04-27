@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Change Password</h4>
                    <form action="{{ route('admin.change.password') }}"  class="form-sample" method="post" >
                        @csrf
                        <p class="card-description"></p>
                        <div class="row">
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="current_password">Current Password</label>
                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror"
                                        id="current_password" name="current_password" value="{{ old('current_password') }}">
                                    @error('current_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror"
                                        id="new_password" name="new_password" value="{{ old('new_password') }}">
                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> 
                            <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="new_confirm_password">New Confirm Password</label>
                                    <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror"
                                        id="new_confirm_password" name="new_confirm_password" value="{{ old('new_confirm_password') }}">
                                    @error('new_confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
