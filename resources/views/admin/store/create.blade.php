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
                        <h3 class="card-title">Add Store</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('stores.store') }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">User</label>
                                    <div class="col-sm-6">
                                        <select required name="user_id" class="form-control" id="user_id">
                                            <option value="">Select Users</option>
                                            @forelse ($users as $item)
                                                <option @if($item->id==auth()->user()->id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">City</label>
                                    <div class="col-sm-6">
                                        <select required name="city_id" class="form-control" id="city_id">
                                            <option value="">Select Cities</option>
                                            @forelse ($cities as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Area</label>
                                    <div class="col-sm-6">
                                        <select  class="form-control js-example-basic-single" name="area_three_id" id="area_three_id">
                                            <option disabled selected value="">Select Area</option>
                                            @foreach ($areathrees as $item)
                                                <option value="{{ $item->id }}">{{ @$item->name }} - {{@$item->areaTwo->name}} - {{@$item->areaOne->name}}</option>
                                            @endforeach
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
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="Enter Mobile">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-6" row="3">
                                        <textarea required class="form-control" name="description" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-6" row="3">
                                        <textarea required class="form-control" name="address" rows="4"></textarea>
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
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">NIC</label>
                                    <div class="col-sm-6">
                                        <input  type="number" class="form-control" id="nic" name="nic"
                                            placeholder="Enter NIC">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">ntn</label>
                                    <div class="col-sm-6">
                                        <input  type="number" class="form-control" id="ntn" name="ntn"
                                            placeholder="Enter ntn">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Open Timing</label>
                                    <div class="col-sm-6">
                                        <input  type="number" class="form-control" id="open_timing"
                                            name="open_timing" placeholder="Enter Open Timing">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Close Timing</label>
                                    <div class="col-sm-6">
                                        <input  type="number" class="form-control" id="close_timing"
                                            name="close_timing" placeholder="Enter Close Timing">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">
                                        <input  type="file" accept="image/*" class="form-control" id="image"
                                            name="image" placeholder="Image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Featured</label>
                                    <div class="col-sm-6">
                                        <select  name="featured" class="form-control" id="feautured">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
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
