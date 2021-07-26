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
                        <h3 class="card-title">Add User Service</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('userservices.update', $userservice->id) }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">User</label>
                                    <div class="col-sm-6">
                                        <select required name="store_id" class="form-control" id="store_id">
                                            <option value="">Select Category</option>
                                            @forelse ($users as $item)
                                                <option @if ($item->id == $userservice->user_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }} - {{@$item->store->name}}</option>
                                            @empty

                                            @endforelse>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Service ID</label>
                                    <div class="col-sm-6">
                                        <select required name="service_id" class="form-control" id="service_id">
                                            <option value="">Select Category</option>
                                            @forelse ($services as $item)
                                                <option @if ($item->id == $userservice->service_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse>
                                        </select>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Store Price</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" id="store_price"
                                            name="store_price" placeholder="Enter Store Price"
                                            value="{{ $userservice->store_price }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" id="qty" name="qty"
                                            placeholder="Enter Quantity" value="{{ $userservice->qty }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-6">
                                        <select required name="status" class="form-control" id="status">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Unit ID</label>
                                    <div class="col-sm-6">
                                        <select name="unit_id" class="form-control" id="unit_id">
                                            <option value="">Select Category</option>
                                            @forelse ($units as $item)
                                                <option @if ($item->id == $userservice->unit_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse>

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
