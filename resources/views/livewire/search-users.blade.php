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
                        <input type="text" wire:model="searchTerm"  class="form-control float-right"
                                     placeholder="Search" style="height:37px;">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-default mr-2"><i
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
                                <td>@can('edit')
                                    <a href="{{ route('users.show', $item->id) }}" class="float-left">
                                        {{$item->status==1 ? 'Active' : 'InActive'}}
                                    </a>
                                    @endcan

                                </td>
                            </tr>
                        @empty
                            <p>No Data Found</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="align-center paginationstyle">
                {{ $users->links('pagination::bootstrap-4') }}
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
