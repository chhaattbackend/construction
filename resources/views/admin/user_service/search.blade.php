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
                <th>store</th>
                <th>service</th>
                <th>store_price</th>
                <th>qty</th>
                <th>status</th>
                <th>unit</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($storeservices as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->store->name }}</td>
                    <td>{{ $item->service->name }}</td>
                    <td>{{ $item->store_price }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->status == 1 ? 'Active' : 'Inactive' }}</td>
                    <td>{{ optional($item->unit)->name }}</td>

                    <td>
                        <a href="{{ route('storeservices.edit', $item->id) }}" class="float-left"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('storeservices.destroy', $item->id) }}" method="POST">
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
    {{ $storeservices->appends($keyword)->links() }}
@else
    {{ $storeservices->links() }}
@endif
</div>
