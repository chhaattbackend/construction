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

                <a href="{{ route('productattributes.create') }}"><button class="btn btn-primary">Add
                        Product Attributes</button></a>
            </div>
        </div>
    </div>
</div>
<!-- /.card-header -->
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>Id</th>
                {{-- <th>StoreID</th> --}}
                <th>ProductID</th>
                <th>AttributeID</th>
                <th>Desc</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productattributes as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    {{-- <td>{{ $item->store->name }}</td>
                    --}}
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->attribute->name }}</td>
                    <td>{{ $item->desc }}</td>
                    <td>
                        <a href="{{ route('productattributes.edit', $item->id) }}" class="float-left"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('productattributes.destroy', $item->id) }}" method="POST">
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
        {{ $productattributes->appends($keyword)->links() }}
    @else
        {{ $productattributes->links() }}
    @endif
</div>
