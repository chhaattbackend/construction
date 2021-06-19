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
                        <h3 class="card-title">Add Product Review</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-md-8">
                        <form action="{{ route('productreviews.update', $productreview->id) }}" method="POST"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">User ID</label>
                                    <div class="col-sm-6">
                                        <select required name="user_id" class="form-control" id="user_id">
                                            @forelse ($users as $item)
                                                <option @if ($item->id == $productreview->user_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Product ID</label>
                                    <div class="col-sm-6">
                                        <select required name="product_id" class="form-control" id="product_id">
                                            @forelse ($products as $item)
                                                <option @if ($item->id == $productreview->product_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Store ID</label>
                                    <div class="col-sm-6">
                                        <select required name="store_id" class="form-control" id="store_id">
                                            @forelse ($stores as $item)
                                                <option @if ($item->id == $productreview->store_id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->name }}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Rating</label>
                                    <div class="col-sm-6">
                                        <select required name="rating" class="form-control" id="rating">

                                            <option @if ($productreview->rating == 1) selected @endif value="1">1</option>
                                            <option @if ($productreview->rating == 2) selected @endif value="2">2</option>
                                            <option @if ($productreview->rating == 3) selected @endif value="3">3</option>
                                            <option @if ($productreview->rating == 4) selected @endif value="4">4</option>
                                            <option @if ($productreview->rating == 5) selected @endif value="5">5</option>


                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Review</label>
                                    <div class="col-sm-6" row="3">
                                        <textarea required class="form-control" name="review"
                                            rows="6">{{ $productreview->review }}</textarea>
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
