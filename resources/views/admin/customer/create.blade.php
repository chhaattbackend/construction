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
                        <h3 class="card-title">Add Customer</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Users</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" required name="user_id" id="user_id">
                                            @forelse ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Name">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone No.</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Phone No.">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input required type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter Email">

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Longitude</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" id="longitude" name="longitude"
                                            placeholder="Enter Longitude">

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Latitude</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" id="latitude" name="latitude"
                                            placeholder="Enter Latitude">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">
                                        <input required type="file" accept="image/*" class="form-control" id="image"
                                            name="image" placeholder="Enter Image">

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
