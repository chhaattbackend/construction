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
                    <h1>Stores</h1>
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
                                <input type="text" name="table_search" id="table_search" class="form-control float-right"
                                    placeholder="Search" style="height:37px;">

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default mr-2" onclick="search()"><i
                                            class="fas fa-search"></i></button>
                                            @can('create')
                                    <a href="{{ route('stores.create') }}"><button class="btn btn-primary">Add
                                            Store</button></a>
                                            @endcan
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
                                    <th>User</th>
                                    <th>City</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Mobile</th>
                                    <th>Description</th>
                                    <th>Address</th>
                                    <th>Area</th>
                                    <th>Status</th>
                                    <th>NIC</th>
                                    <th>NTN</th>
                                    <th>Open Timings</th>
                                    <th>Close Timings</th>
                                    <th>Image</th>
                                    <th>Thumbnail</th>
                                    <th>Featured</th>
                                    <th>Created_At</th>
                                    <th>Updated_At</th>
                                    @role('super admin')
                                        <th>Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stores as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->city->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->mobile }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ @$item->areaThree->name }} {{ @$item->areaTwo->name }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->nic }}</td>
                                        <td>{{ $item->ntn }}</td>
                                        <td>{{ $item->open_timing }}</td>
                                        <td>{{ $item->close_timing }}</td>
                                        <td>{{ $item->image }}</td>
                                        <td>{{ $item->thumbnail }}</td>
                                        <td>{{ $item->featured }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->updated_at }}</td>
                                        <td>    @can('edit')
                                            <a style="padding-right:20%" href="{{ route('store.productview') }}" class="float-left"><i
                                                class="fas fa-eye"></i></a>
                                            <a href="{{ route('stores.edit', $item->id) }}" class="float-left"><i
                                                    class="fas fa-edit"></i></a>@endcan
                                                    @can('delete')
                                            <form action="{{ route('stores.destroy', $item->id) }}" method="POST">
                                                @method('delete') @csrf <button class="btn btn-link pt-0"><i
                                                        class="fas fa-trash-alt"></i></button> </form>
                                                        @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <p>No Data Found</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="align-right paginationstyle">
                        {{ $stores->links() }}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
