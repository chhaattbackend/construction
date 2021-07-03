@extends('admin.layouts.app')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users</h1>
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
                                <input type="text" name="table_search" id="table_search" class="form-control float-right"
                                    placeholder="Search" style="height:37px;">

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-default mr-2" onclick="search()"><i
                                            class="fas fa-search"></i></button>
                                    @if (auth()->user()->email == 'chhattofficial@chhatt.com')
                                    <a href="{{ route('users.create') }}"><button class="btn btn-primary">Add
                                        User</button></a>

                                        @endif
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
                                    <th>Store</th>
                                    <th>Phone</th>
                                    @role('super admin')
                                    <th>Status</th>
                                    <th>Action</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ @$item->store->name }}</td>
                                        <td>{{ @$item->store->phone }}</td>
                                        @can('edit')
                                            <td>
                                                <a href="{{ route('users.show', $item->id) }}" class="float-Right">
                                                    {{ $item->status == 1 ? 'Active' : 'InActive' }}
                                                </a>
                                            </td>
                                            <td class="d-flex">
                                                <a href="{{ route('users.edit', $item->id) }}" > <i
                                                        class="fas fa-edit"></i></a>
                                                <form action="{{ route('users.destroy', $item->id) }}" method="POST">
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
                        {{-- {{ $users->links() }} --}}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

@endsection
