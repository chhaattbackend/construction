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

                <a href="{{ route('storeproducts.create') }}"><button class="btn btn-primary">Add Store
                        Product</button></a>
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
                <th>Store</th>
                <th>Product</th>
                <th>Brand</th>
                <th>Store Price</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>UnitID</th>
                <th>Created_At</th>
                <th>Updated_At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($storeproducts as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->store->name }}</td>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->brand->name }}</td>
                    <td>{{ $item->store_price }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ optional($item->unit)->name }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('storeproducts.edit', $item->id) }}" class="float-left"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('storeproducts.destroy', $item->id) }}" method="POST">
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
    {{ $storeproducts->appends($keyword)->links() }}
@else
    {{ $storeproducts->links() }}
@endif
</div>
