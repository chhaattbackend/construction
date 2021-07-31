@extends('admin.layouts.app')
@section('content')
    <style>
        .align-right {
            text-align: right;

        }
    </style>
    {{-- @if (str_contains($bcategories[0], $product))
     @dd('h')
     @endif --}}

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>

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
                        {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 335px;">
                                <form action="{{ route('products.index') }}" style="display: flex;">
                                    <input type="text" name="keyword" id="keyword" class="form-control float-right"
                                        placeholder="Search" style="height:37px;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default mr-2"><i
                                                class="fas fa-search"></i></button>
                                </form>
                            </div>
                            @can('create')
                                <a href="{{ route('products.create') }}"><button class="btn btn-primary">Add
                                        Product</button></a>
                            @endcan
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                @role('super admin')
                                <th>Action</th>
                                <th>Edit Image</th>
                                @endrole
                                <th>A Category</th>
                                <th>B Category</th>
                                <th>C Category</th>
                                <th>D Category</th>
                                <th>E Category</th>
                                <th>F Category</th>
                                <th>Brand</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Thumbnail</th>
                                <th>Image</th>
                                <th>Unit</th>


                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    @role('super admin')
                                    <td>@can('edit')
                                            <a href="{{ route('products.edit', $item->id) }}" class="float-left"><i
                                                    class="fas fa-edit"></i></a>
                                        @endcan
                                        @can('delete')
                                            <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                                                @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                        class="fas fa-trash-alt"></i></button> </form>
                                        @endcan

                                    </td>
                                    <td>
                                        <a href="{{ route('products.show', $item->id) }}" class="float-left"
                                            style="color:goldenrod"><i class="fas fa-edit"></i>EDIT</a>
                                    </td>
                                    @endrole
                                    <td>{{ optional($item->a_category)->name }}</td>
                                    <td>{{ optional($item->b_category)->name }}</td>
                                    <td>{{ optional($item->c_category)->name }}</td>
                                    <td>{{ optional($item->d_category)->name }}</td>
                                    <td>{{ optional($item->e_category)->name }}</td>
                                    <td>{{ optional($item->f_category)->name }}</td>
                                    <td>{{ @$item->brand->name }}</td>
                                    <td>{{ @$item->name }}</td>
                                    <td>{{ @$item->description }}</td>
                                    <td>{{ @$item->price }}</td>
                                    <td>{{ @$item->quantity }}</td>
                                    <td>{{ @$item->thumbnail }}</td>
                                    <td>{{ @$item->image }}</td>
                                    <td>{{ @$item->unit->name }}</td>

                                </tr>
                            @empty
                                <p>No Data Found</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="align-right paginationstyle">
                    {{ $products->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    </div>


@endsection
