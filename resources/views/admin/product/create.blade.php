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
                        <h3 class="card-title">Add Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('products.store') }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category A :</label>
                                    <div class="col-sm-6">
                                        <select required class="form-control" name="a_category_id" id="a_category_id">
                                            <option value="">Select Category</option>
                                            @forelse ($acategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category B :</label>
                                    <div class="col-sm-6">
                                        <select required class="form-control" name="b_category_id" id="b_category_id">
                                            <option value="">Select Category</option>
                                            @forelse ($bcategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category C :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="c_category_id" id="c_category_id">
                                            <option value="">Select Category</option>
                                            @forelse ($ccategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category D :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="d_category_id" id="d_category_id">
                                            <option value="">Select Category</option>
                                            @forelse ($dcategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category E :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="e_category_id" id="e_category_id">
                                            <option value="">Select Category</option>
                                            @forelse ($ecategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category F :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="f_category_id" id="f_category_id">
                                            <option value="">Select Category</option>
                                            @forelse ($fcategories as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Brand :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="brand_id" id="brand_id">
                                            <option value="">Select Category</option>
                                            @forelse ($brand as $item)
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
                                    <input hidden type="text" name="created_by" value="{{auth()->user()->email}}">
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Slug</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="slug" name="slug"
                                            placeholder="Enter Slug">
                                    </div>
                                    <div class="col-1">
                                    <i onclick="slugGen()" class="fas fa-bars"></i>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="description" name="description"
                                            placeholder="Enter Description">

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="price" name="price"
                                            placeholder="Enter Price">

                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-6">
                                        <input required type="text" class="form-control" id="quantity" name="quantity"
                                            placeholder="Enter Quantity">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">
                                        <input required type="file" accept="image/*" class="form-control" id="image"
                                            name="images[]" placeholder="Insert Image" multiple>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Unit ID</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="unit_id" id="unit_id">
                                            <option value="">Select Unit</option>
                                            @forelse ($units as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                        <a href="{{route('products.index')}}"><button type="button" class="btn btn-danger">Done</button></a>
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
