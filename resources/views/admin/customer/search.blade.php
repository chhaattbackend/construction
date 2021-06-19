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

                <a href="{{ route('customers.create') }}"><button class="btn btn-primary">Add
                        Customer</button></a>
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
                <th>Phone</th>
                <th>Email</th>
                <th>Longitude</th>
                <th>Latitude</th>
                <th>Image</th>
                <th>Created_At</th>
                <th>Updated_At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->Longitude }}</td>
                    <td>{{ $item->latitude }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('customers.edit', $item->id) }}" class="float-left"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('customers.destroy', $item->id) }}" method="POST">
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
    @if ($keyword !== null)
        {{ $customers->appends($keyword)->links() }}
    @else
        {{ $customers->links() }}
    @endif
</div>
