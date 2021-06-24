@extends('admin.layouts.app')
@section('content')

    @if ($b == 'product')

        <form action="{{ route('inner.save') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
            <div class="row position-relative">
                @csrf
                @forelse ($acat as $item)

                    <div class="col-md-3 p-4">

                        {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="card card1">

                            <input type="checkbox" class="form-control" name="product_ids[]" value="{{ $item->id }}" /><br>
                            <img style="height: 150px" src="{{ asset('images') }}/{{ $item->image }}" />
                            <p style="word-wrap:break-line;">
                                {{ $item->name }}
                            </p>
                            <label for="">Price: </label><input type="text" class="form-control" name="productprices[]"
                                value="{{ $item->price }}" />
                            <label for="">Unit: </label>
                            <select required name="unit_ids[]" class="form-control" id="unit_id">
                                {{-- <option value="">Select Unit</option> --}}
                                @forelse ($units as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty

                                @endforelse
                            </select>

                        </div>






                    </div>

                   @empty
                @endforelse
            </div>
            <div style="position: absolute; bottom: 5%; left: 50%; transform: translateX(-50%);" class="text-center w-100">

                <button id="DeleteButtonID" class="btn btn-info">Submit</button>
        </form>






        </div>




    @else

        <div class="row position-relative">
            @csrf
            @forelse ($acat as $item)
                <div class="col-md-3 p-4">



                    {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                    <div onclick="window.location='{{ route('inner.personal', ['a' => $b, 'cat' => $item->id, 'id' => $item->id]) }}'"
                        class="card card1">


                        <img style="height: 150px" src="{{ asset('images') }}/{{ $item->image }}" />
                        <p style="word-wrap:break-line;">
                            {{ $item->name }}
                        </p>

                    </div>
                    @if ($b == 'product')
                        <input onchange="function12({{ $item->id }})" type="checkbox" class="form-control"
                            name="product_ids[]" value="{{ $item->id }}" /><br>
                    @endif



                </div>

            @empty
            @endforelse
        </div>

    @endif

















    {{-- <input id="clickMe" type="button" value="clickme" /> --}}



@endsection


<script>
    var arr = [];

    function function12(param) {
        arr.push(param)

    };
    // function add(){
    //       $.ajax({
    //                 type: "POST",
    //                 url: "asdad/ajax",
    //                 dataType: 'JSON',
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 data: {
    //                     arr : 'asda',
    //                 },

    //                 success: function(responese) {



    //                 alert('success')
    //                 },
    //             });
    // }
</script>
