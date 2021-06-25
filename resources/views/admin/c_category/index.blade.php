@extends('admin.layouts.app')
@section('content')
    <style>
        .align-right {
            text-align: right;
        }

    </style>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>C Category</h1>
                </div>
                {{-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Simple Tables</li>
                    </ol>
                </div> --}}
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card searcharea">
                    <div class="align-right">
                    </div>
                    <div class="card-header">
                        <br>
                        {{-- <h3 class="card-title">Responsive Hover Table</h3>
                        --}}

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 335px;">
                                <form action="{{ route('ccategories.index')}}">
                                    <input type="text" name="keyword" id="keyword" class="form-control float-right"
                                        placeholder="Search" style="height:37px;">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default mr-2" ><i
                                                class="fas fa-search"></i></button>
                                            </form>

                                    <a href="{{ route('ccategories.create') }}"><button class="btn btn-primary">Add
                                            Category</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>B Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($ccategories as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>
                                            <a href="{{ route('ccategories.edit', $item->id) }}" class="float-left"><i
                                                    class="fas fa-edit"></i></a>
                                            <form action="{{ route('ccategories.destroy', $item->id) }}" method="POST">
                                                @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                        class="fas fa-trash-alt"></i></button> </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Data Found</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="align-right paginationstyle">
                        {{ $ccategories->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
