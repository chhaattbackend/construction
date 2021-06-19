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
                <button type="submit" class="btn btn-default mr-2"><i
                        class="fas fa-search"></i></button>

                <a href="{{ route('suppliers.create') }}"><button class="btn btn-primary">Add
                        Supplier</button></a>
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
                <th>UserID</th>
                <th>StoreID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>NIC</th>
                <th>Created_At</th>
                <th>Updated_AT</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($suppliers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->store->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->contact }}</td>
                    <td>{{ $item->nic }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>

                    <td>
                        <a href="{{ route('suppliers.edit', $item->id) }}" class="float-left"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('suppliers.destroy', $item->id) }}" method="POST">
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
    @if($keyword !== null)
    {{ $suppliers->appends($keyword)->links() }}
@else
    {{ $suppliers->links() }}
@endif
</div>
