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
                        <h3 class="card-title"> Edit Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('products.update', [$product->id]) }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category A :</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" value="{{ url()->previous() }}" name="previous_url">
                                        <select class="form-control" name="a_category_id" id="a_category">
                                            @forelse ($acategories as $item)
                                                <option @if ($item->id == $product->a_category_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">


                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category B :</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="b_category_id" id="b_category">
                                            @forelse ($bcategories as $item)
                                                <option @if ($item->id == $product->b_category_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
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
                                                <option @if ($item->id == $product->c_category_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
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
                                                <option @if ($item->id == $product->d_category_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
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
                                                <option @if ($item->id == $product->e_category_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
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
                                                <option @if ($item->id == $product->f_category_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
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
                                                <option @if ($item->id == $product->brand_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse

                                        </select>
                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $product->name }}" id="name"
                                            name="name" placeholder="Enter Name">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $product->description }}"
                                            id="description" name="description" placeholder="Enter Name">

                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $product->price }}" id="price"
                                            name="price" placeholder="Enter Name">

                                    </div>
                                </div>




                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" value="{{ $product->quantity }}"
                                            id="quantity" name="quantity" placeholder="Enter Name">

                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Unit ID</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" value="{{ $product->unit_id }}" name="unit_id"
                                            id="unit_id">
                                            <option value="">Select Unit</option>
                                            @forelse ($units as $item)
                                                <option @if ($item->id == $product->unit_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-6">

                                        <input type="file" class="form-control" name="images[]" placeholder="Insert Image " multiple>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        {{-- <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div> --}}
                                        <button type="submit" class="btn btn-info">Submit</button>

                                        <form action="{{ route('products.update', [$product->id]) }}"
                                            method="POST" class="form-horizontal" enctype="multipart/form-data">
                                            @csrf
                                            <input hidden type="text" name='bool12' id="test12222" value="0">
                                            <button type="button" id="maderchod" class="btn btn-danger pt-0"
                                                onclick="add()">ASSIGN</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->
                            {{-- <div class="card-footer">
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

    <script>
        function add() {

            a = document.getElementById('test12222');
            a.value = '1';
           a.backgroundcolor='blue !important';
           $("#maderchod").css('background-color', ' green');
        }
    </script>
@endsection
