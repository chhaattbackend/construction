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
                        <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Select Users :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" required name="user_id" id="user_id">
                                            @forelse ($users as $item)
                                                <option @if ($item->id == $customer->user_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" value="{{ $customer->name }}"
                                            id="name" name="name" placeholder="Enter Name">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone No.</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" value="{{ $customer->phone }}"
                                            id="phone" name="phone" placeholder="Enter Name">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email ID</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" value="{{ $customer->email }}"
                                            id="email" name="email" placeholder="Enter Name">

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Longitude</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" value="{{ $customer->longitude }}"
                                            id="longitude" name="longitude" placeholder="Enter Name">

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Latitude</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" value="{{ $customer->latitude }}"
                                            id="latitude" name="latitude" placeholder="Enter Name">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">
                                        <input required type="file" accept="image/*" class="form-control" id="image"
                                            name="image" placeholder="Enter Name">

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
