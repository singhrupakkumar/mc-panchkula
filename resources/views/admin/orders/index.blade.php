@extends('admin.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="card-body d-flex justify-content-between">
                        <h4 class="card-title">Recipts List</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table recipts_datatable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Unique Code</th>
                                    <th>Price (INR)</th>
                                    <th>Stock Qty</th>
                                    <th>Name </th>
									<th>HKRN Id</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Order Type</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
