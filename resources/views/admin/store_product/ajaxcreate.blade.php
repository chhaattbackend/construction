{{-- <select class="form-control" name="brand_id" onchange="ajaxcall()" id="brand_id">
    <option @if (request()->get('brand_id') == null) selected @endif
        value="">Select
    </option>
    @foreach ($brand as $item)
        <option @if (request()->get('brand_id') == $item->id) selected @endif value="{{ $item->id }}">
            {{ $item->name }}</option>
    @endforeach

</select> --}}


@forelse ($products as $key => $item)
    @php $same=false; @endphp
    @if ($show == 1)

        @foreach ($storeproducts as $item2)
            @if ($item2->product_id == $item->id)
                @php $same=true; @endphp
            @endif
        @endforeach
    @endif


    {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
    <div class="card card1">
        <input type="checkbox" class="form-control" name="product_ids[]" value="{{ $item->id . ' ' . $key }}" /><br>
        @if ($same)
            <center><label for="" class="text-danger">Already added</label></center>
        @endif
        <img class="m-auto" style="height: 150px ; width: 200px ; object-fit: contain; "
            src="https://chhatt.s3.ap-south-1.amazonaws.com/construction/product/{{ $item->image }}" />
        <p class="text-center border-bottom border-3 border-dark pb-2" style="word-wrap:break-line;">
            <strong> {{ $item->name }} </strong>
        </p>
        <p style="word-wrap:break-line;">
            <strong> B Category: </strong> {{ @$item->b_category->name }}
        </p>
        <p style="word-wrap:break-line;">
            <strong> C Category: </strong> {{ @$item->c_category->name }}
        </p>

        <label for="">Price: </label><input type="text" class="form-control" name="productprices[]"
            value="{{ $item->price }}" />
        <label for="">Quantity: </label><input type="text" class="form-control" name="productquantities[]"
            value="{{ $item->quantity }}" />
        <label for="">Unit: </label>
        <select required name="unit_ids[]" class="form-control" id="unit_id">
            {{-- <option value="">Select Unit</option> --}}
            @forelse ($units as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @empty

            @endforelse
        </select>
    </div>


@empty

@endforelse



