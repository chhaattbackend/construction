@extends('admin.layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <!-- /.card -->
                <!-- Form Element sizes -->
                <!-- /.card -->
                <!-- /.card -->
                <!-- Input addon -->
                <!-- /.card -->
                <!-- Horizontal Form -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Edit Store Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('storeproducts.update', $storeproduct->id) }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Store ID</label>
                                    <div class="col-sm-6">
                                        <select required name="store_id" class="form-control" id="store_id">
                                            <option value="">Select Category</option>
                                            @forelse ($stores as $item)
                                                <option @if ($item->id == $storeproduct->store_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product ID</label>
                                    <div class="col-sm-6">
                                        <select required name="product_id" class="form-control" id="product_id">
                                            <option value="">Select Category</option>
                                            @forelse ($products as $item)
                                                <option @if ($item->id == $storeproduct->product_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Brand ID</label>
                                    <div class="col-sm-6">
                                        <select required name="brand_id" class="form-control" id="brand_id">
                                            <option value="">Select Category</option>
                                            @forelse ($brands as $item)
                                                <option @if ($item->id == $storeproduct->brand_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Store Price</label>
                                    <div class="col-sm-6">
                                        <input required type="number" value="{{ $storeproduct->store_price }}"
                                            class="form-control" id="store_price" name="store_price"
                                            placeholder="Enter Store Price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-6">
                                        <input required type="number" value="{{ $storeproduct->qty }}" class="form-control"
                                            id="qty" name="qty" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-6">
                                        <select required name="status" class="form-control" id="status">
                                            <option @if ($storeproduct->status == 1) selected @endif value="1">Active</option>
                                            <option @if ($storeproduct->status == 0) selected @endif value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Unit ID</label>
                                    <div class="col-sm-6">
                                        <select required name="unit_id" class="form-control" id="unit_id">
                                            <option value="">Select Category</option>
                                            @forelse ($units as $item)
                                                <option @if ($item->id == $storeproduct->unit_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        {{--
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div>
                                        --}}
                                        <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            {{--
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default float-right">Cancel</button>
                            </div>
                            <!-- /.card-footer --> --}}
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div>
@endsection
