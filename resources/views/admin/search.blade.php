<thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
    @forelse ($acategories as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <a href="{{ route('acategories.edit', $item->id) }}" class="float-left"><i class="fas fa-edit"></i></a>
                <form action="{{ route('acategories.destroy', $item->id) }}" method="POST">
                    @method('delete') @csrf <button class="btn btn-link pt-0"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
        </tr>
    @empty
        <p>No Data Found</p>
    @endforelse
</tbody>
