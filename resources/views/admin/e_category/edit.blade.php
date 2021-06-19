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
                    <h3 class="card-title">Add E categories</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="col-md-8">
                    <form action="{{ route('ecategories.update', $e_category->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="form-group row">


                                <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-6">
                                    <input required type="text" class="form-control"  value="{{$e_category->name}}"   id="name" name="name"
                                        placeholder="Enter Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">D category</label>
                                <div class="col-sm-6">

                                    <select required name="a_category_id" class="form-control" id="a_category_id" >
                                        <option value="">Select Category</option>
                                            @forelse ($bcategories as $item)
                                                <option @if($item->id==$e_category->b_category_id) selected @endif value="{{ $item->id }}">{{ $item->name }}</option>
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

