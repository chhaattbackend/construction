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
                        <h3 class="card-title">Add Store Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <div class="col-md-12">
                        <form action="{{ route('storeproducts.store') }}" method="POST" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Store</label>
                                    <div class="col-sm-6">
                                        <select required  name="store_id" class="form-control" id="store_id">
                                            <option value="">Select Stores</option>
                                            @forelse ($stores as $item)
                                                <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="card-tools">

                                        <div class="input-group input-group-sm" style="width: 335px;">
                                            <input type="text"  value="{{@$seacrh}}" name="keyword" id="keyword" class="form-control float-right"
                                                placeholder="Search" style="height:37px;">

                                            <div class="input-group-append">
                                                <button type="submit"   class="btn btn-default mr-2"><i
                                                        class="fas fa-search"></i></button>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                                {{-- <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product ID</label>
                                    <div class="col-sm-6">
                                        <select required name="product_id" class="form-control" id="product_id">
                                            <option value="">Select Products</option>
                                            @forelse ($products as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- ----------------------------------------------------------------------------------------------------------------------------------------- --}}

                                <div class="cards cards1">
                                    @forelse ($products as $item)
                                        @php $same=false; @endphp
                                        @foreach ($storeproducts as $item2)
                                            @if ($item2->product_id == $item->id)
                                                @php $same=true; @endphp


                                            @endif
                                        @endforeach




                                        {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
                                        <div class="card card1">
                                            <input type="checkbox" class="form-control" name="product_ids[]"
                                                value="{{ $item->id }}" /><br>
                                            @if ($same)
                                                <center><label for="" class="text-danger">Already added</label></center>
                                            @endif
                                            <img class="m-auto" style="height: 150px ; width: 200px ; object-fit: fill; " src="{{ asset('images') }}/{{ $item->image }}" />
                                            <p class="text-center border-bottom border-3 border-dark pb-2" style="word-wrap:break-line;">
                                               <strong> {{ $item->name }} </strong>
                                            </p>
                                            <p style="word-wrap:break-line;">
                                                <strong>  B Category: </strong> {{ @$item->b_category->name }}
                                            </p>
                                            <p style="word-wrap:break-line;">
                                      <strong>  C Category: </strong>   {{ @$item->c_category->name }}
                                            </p>

                                            <label for="">Price: </label><input type="text" class="form-control"
                                                name="productprices[]" value="{{ $item->price }}" />
                                            <label for="">Quantity: </label><input type="text" class="form-control"
                                                name="productquantities[]" value="{{ $item->quantity }}" />
                                            <label for="">Unit: </label>
                                            <select required name="unit_ids[]" class="form-control" id="unit_id">
                                                {{-- <option value="">Select Unit</option> --}}
                                                @forelse ($units as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @empty

                                                @endforelse
                                            </select>
                                        </div>


                                    @empty

                                    @endforelse

                                    {{-- <div class="card">
                            <input type="checkbox" name="checkedproducts[]" value="2" />
                                            </div>

                                                            <div class="card">
                      <input type="checkbox" name="checkedproducts[]" value="3" />
                                                    </div> --}}

                                </div>

                                {{-- ------------------------------------------------------------------------------------------------------------------------------------------ --}}
                                {{-- <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Brand </label>
                                    <div class="col-sm-6">
                                        <select required name="brand_id" class="form-control" id="brand_id">
                                            <option value="">Select Brands</option>
                                            @forelse ($brands as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Store Price</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" id="store_price"
                                            name="store_price" placeholder="Enter Store Price">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Quantity</label>
                                    <div class="col-sm-6">
                                        <input required type="number" class="form-control" id="qty" name="qty"
                                            placeholder="Enter Quantity">
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
                                        <select required name="unit_id" class="form-control" id="unit_id">
                                            <option value="">Select Category</option>
                                            @forelse ($units as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="align-right paginationstyle">
                                    {{ $products->links() }}
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-5 col-sm-12">
                                        {{-- <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div> --}}
                                        <button type="submit" class="btn btn-info w-25">Submit</button>
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
        $(document).ready(function() {
            // Card Multi Select
            $('input[type=checkbox]').click(function() {
                if ($(this).parent().hasClass('active')) {
                    $(this).parent().removeClass('active');
                } else {
                    $(this).parent().addClass('active');
                }
            });
        });
    </script>

    <style>
        /* Cosmetics styles */
        /* body {
            margin: .5em;
            background: lightgrey;
        } */

        .cards1 {
            display: flex;

            flex-wrap: wrap;
        }

        .card1 {
            position: relative;
            object-fit: scale-down;
            margin: .5em;
            padding: 2em;
            min-height: 4em;
            background: white;
            border: 3px solid grey;
            width: 100%;
            max-width: 350px;
            min-width: 350px;
        }

        .active {
            border-color: orangered;
        }

        /* This is where the magic happens */
        input[type="checkbox"] {
            position: absolute;
            top: .5em;
            left: .5em;
        }

        @media (pointer: coarse) {
            input[type="checkbox"] {
                height: 2em;
                width: 2em;
            }
        }

        /* Use z-index to make it accessible to keyboard navigation */
        @media (hover: hover) {
            input[type="checkbox"] {
                z-index: -1
            }

            .card:hover input[type="checkbox"],
            input[type="checkbox"]:focus,
            input[type="checkbox"]:checked {
                z-index: auto
            }
        }

    </style>
@endsection
