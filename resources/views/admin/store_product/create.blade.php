@extends('admin.layouts.app')
@section('content')
    <style>
        .centerSelect {
            width: 100%;
        }

        .centerSelect .left {
            width: 16%;
        }

        .centerSelect .right {
            /* width: 84%; */
        }

        .firstInp{
            width: 100%;
        }
        .firstInp .first{
            width: 12%;
        }
        .firstInp .second{
            width: 88%;
        }
    </style>
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
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4 d-flex firstInp w-100">
                                                <div class="first">
                                                    <label for="inputPassword3" class="col-form-label">Store</label>
                                                </div>
                                                <div class="second ml-2">
                                                    <select required onchange="ajaxcall()" name="store_id"
                                                        class="form-control" id="store_id">
                                                        <option value="0">Select Store</option>
                                                        @forelse ($stores as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                        @empty

                                                        @endforelse
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6 w-100">
                                                <div class="d-flex align-items-center h-100 w-100 centerSelect">
                                                    <div class="left">
                                                        <label class="mb-0">B Category:</label>
                                                    </div>
                                                    <div class="ml-3 right w-100">
                                                        <select class="form-control" onchange="ajaxcall()"
                                                            name="b_category_id" id="b_category_id">
                                                            <option @if (request()->get('b_category_id') == null) selected @endif value="">Select
                                                            </option>
                                                            @foreach ($bcategories as $item)
                                                                <option @if (request()->get('b_category_id') == $item->id) selected @endif
                                                                    value="{{ $item->id }}">
                                                                    {{ $item->name }}</option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-2">
                                                <div class="card-tools ">

                                                    <div class="input-group">
                                                        <input type="text" value="{{ @$seacrh }}" name="keyword"
                                                            id="keyword" class="form-control float-right"
                                                            placeholder="Search">

                                                        <div class="input-group-append h-100">
                                                            <button type="submit" class="btn btn-default mr-2"><i
                                                                    class="fas fa-search"></i></button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                                <div id="table" class="cards cards1">
                                    @include('admin.store_product.ajaxcreate')
                                </div>

                                <div id="pagination" class="align-right paginationstyle">
                                    {{ $products->links() }}
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 text-center">

                                        <button type="submit" class="btn btn-info w-25">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>

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
    <script>
        $(document).on('click', '.pagination a', function(event) {
            event.preventDefault();
            var href = $(this).attr('href');
            // console.log(href);
            var page = $(this).attr('href').split('page=')[1];
            var url = $(this).attr('href').split('?')[1];
            var fullurl = "create?" + url;

            $(this).html('<i class="fa fa-circle-notch fa-spin"></i>')
            window.history.pushState('new', 'Title', fullurl);
            ajaxcall(page)
            // getMoreUsers(page);
        });

        function ajaxcall(page) {
            var store_id = $('#store_id').find(":selected").val();
            var b_category_id = $('#b_category_id').find(":selected").val();
            console.log(b_category_id);
            $.ajax({
                type: "POST",
                url: "ajax" + "?page=" + page,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'store_id': store_id,
                    'b_category_id': b_category_id,
                },
                success: function(responese) {


                    // console.log(responese.pagination)
                    $('#table').html(responese.data);
                    $('#pagination').html(responese.pagination);

                },
            })
        }
    </script>
@endsection
