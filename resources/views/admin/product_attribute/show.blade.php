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
                        <h3 class="card-title">Add Product Attributes</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('attribute.list.store', $productattribute->product_id) }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product ID</label>
                                    <div class="col-sm-6">
                                        <input type="hidden" value="{{ url()->previous() }}" name="previous_url">
                                        <select required name="product_id" class="form-control" id="product_id">
                                            @forelse ($products as $item)
                                                <option @if ($item->id == $productattribute->product_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                        <select hidden name="old_product_id">
                                            @forelse ($products as $item)
                                                <option hidden @if ($item->id == $productattribute->product_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Attribute</label>
                                    <div class="col-sm-3 ">
                                        @forelse ($product as $item)

                                            <select required name="attribute_id[]" class="form-control" id="attribute_id[]">
                                                @foreach ($attributes as $item2)

                                                    <option @if ($item->attribute_id == $item2->id) selected @endif value="{{ $item2->id }}">
                                                        {{ @$item2->name }}</option>

                                                @endforeach
                                                <textarea required class="w-100" name="desc[]"
                                                    rows="2">{{ @$item->desc }}</textarea>
                                            </select>

                                            <select hidden name="old_id[]" >
                                                @foreach ($attributes as $item2)

                                                    <option hidden @if ($item->attribute_id == $item2->id) selected @endif value="{{ $item2->id }}">
                                                        {{ @$item2->name }}</option>

                                                @endforeach
                                            </select>


                                        @empty

                                        @endforelse
                                    </div>


                                </div>

                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        {{-- <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                                        </div> --}}
                                        <button type="submit" class="btn btn-info">Submit</button>
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
@endsection
