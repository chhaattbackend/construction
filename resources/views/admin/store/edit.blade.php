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
                        <form action="{{ route('stores.update', $store->id) }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">User ID</label>
                                    <div class="col-sm-6">
                                        <select required name="user_id" class="form-control" id="user_id">
                                            <option value="">Select Category</option>
                                            @forelse ($users as $item)
                                                <option @if ($item->id == $store->user_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">City ID</label>
                                    <div class="col-sm-6">
                                        <select required name="city_id" class="form-control" id="city_id">
                                            <option value="">Select Category</option>
                                            @forelse ($cities as $item)
                                                <option @if ($item->id == $store->city_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Area</label>
                                    <div class="col-sm-6">
                                        <select required name="area_three_id" class="form-control" id="area_three_id">
                                            <option value="">Select Category</option>
                                            @forelse ($areathree as $item)
                                            <option disabled  value="">Select Area</option>
                                                <option @if ($item->id == $store->area_three_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }} - {{@$item->areaTwo->name}} - {{@$item->areaOne->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                        <input required type="text" value="{{ $store->name }}" class="form-control"
                                            id="name" name="name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input required type="text" value="{{ $store->email }}" class="form-control"
                                            id="email" name="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" value="{{ $store->phone }}"
                                            id="phone" name="phone" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Mobile</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" value="{{ $store->mobile }}"
                                            id="mobile" name="mobile" placeholder="Enter Mobile">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-6" row="3">
                                        <textarea required class="form-control" value="" name="description"
                                            rows="6">{{ $store->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-6" row="3">
                                        <textarea required class="form-control" value="" name="address"
                                            rows="6">{{ $store->address }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-6">
                                        <select  name="status" class="form-control" id="status">
                                            <option @if ($store->status == 1) selected @endif value="1">Active</option>
                                            <option @if ($store->status == 0) selected @endif value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">NIC</label>
                                    <div class="col-sm-6">
                                        <input  type="number" value="{{ $store->nic }}" class="form-control"
                                            id="nic" name="nic" placeholder="Enter NIC">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">ntn</label>
                                    <div class="col-sm-6">
                                        <input  type="number" value="{{ $store->ntn }}" class="form-control"
                                            id="ntn" name="ntn" placeholder="Enter ntn">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Open Timing</label>
                                    <div class="col-sm-6">
                                        <input  type="number" value="{{ $store->open_timing }}" class="form-control"
                                            id="open_timing" name="open_timing" placeholder="Enter Open Timing">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Close Timing</label>
                                    <div class="col-sm-6">
                                        <input  type="number" class="form-control"
                                            value="{{ $store->close_timing }}" id="close_timing" name="close_timing"
                                            placeholder="Enter Close Timing">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">
                                        <img class="form-img"
                                        src="https://chhatt.s3.ap-south-1.amazonaws.com/construction/store/{{ $store->image }}">
                                        <input  type="file" accept="image/*" class="form-control" id="image"
                                            name="image" placeholder="Image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">featured</label>
                                    <div class="col-sm-6">
                                        <select  name="featured" class="form-control" id="feautured">
                                            <option @if ($store->featured == 1) selected @endif value="1">Active</option>
                                            <option @if ($store->featured == 0) selected @endif value="0">Inactive</option>
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
