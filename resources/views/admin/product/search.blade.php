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
                <button type="button" onclick="search()" class="btn btn-default mr-2"><i
                        class="fas fa-search"></i></button>

                <a href="{{ route('products.create') }}"><button class="btn btn-primary">Add
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
                <th>a_category</th>
                <th>b_category</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Thumbnail</th>
                <th>Image</th>
                <th>unit</th>
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            @forelse ($products as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->a_category->name }}</td>
                    <td>{{ $item->b_category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->thumbnail }}</td>
                    <td>{{ $item->image }}</td>
                    <td>{{ $item->unit_id }}</td>

                    <td>
                        <a href="{{ route('products.edit', $item->id) }}" class="float-left"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('products.destroy', $item->id) }}" method="POST">
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
        {{ $products->appends($keyword)->links() }}
    @else
        {{ $products->links() }}
    @endif
</div>
