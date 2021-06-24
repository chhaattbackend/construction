@extends('admin.layouts.app')
@section('content')


<div class="row position-relative">
    @csrf
    @forelse ($stores as $item)
        <div class="col-md-3 p-4">
            {{-- <option value="{{ $item->id }}">{{ $item->name }}</option> --}}
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            <div onclick="window.location='{{ route('store.product', ['a' => $b, 'id' => $item->id  ,'category' => $item->id]) }}'"
                class="card card1">

                {{-- <input hidden type="text" value="{{ $storeid }}"> --}}

                <img style="height: 150px" src="{{ asset('images') }}/{{ $item->image }}" />
                <p style="word-wrap:break-line; margin-left: 20px;">
                   @if ($b == 'b')
                   {{$item->product->name}}

                   @elseif ($b == 'c')
                   <label style="margin-left: 20%" for="">{{$item->name}} </label><br>
                   <label for="">Category A: </label> {{@$item->a_category->name}}<br>
                   <label for="">Category B: </label> {{@$item->b_category->name}}<br>
                   <label for="">Category C: </label> {{@$item->c_category->name}}<br>
                   <label for="">Category D: </label> {{@$item->d_category->name}}<br>
                   @else
                   {{$item->name}}
                   @endif
                </p>

            </div>

        </div>

    @empty
    @endforelse
</div>






@endsection
