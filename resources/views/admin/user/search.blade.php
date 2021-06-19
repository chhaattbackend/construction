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

                <a href="{{ route('users.create') }}"><button class="btn btn-primary">Add
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
                <th>Store</th>
                <th>Phone</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->store->name }}</td>
                    <td>{{ $item->store->phone }}</td>
                    <td>
                        <a href="{{ route('users.edit', $item->id) }}" class="float-left">
                            <i class="fas fa-edit"></i>
                        </a>

                    </td>
                </tr>
            @empty
                <p>No Data Found</p>
            @endforelse
        </tbody>
    </table>
</div>
<div class="align-right paginationstyle">
    @if ($keyword !== null)
        {{ $users->appends($keyword)->links() }}
    @else
        {{ $users->links() }}
    @endif
</div>
