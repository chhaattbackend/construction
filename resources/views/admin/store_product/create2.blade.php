@extends('admin.layouts.app')
@section('content')
    <style>
        /* Cosmetics styles */
        body {
            margin: .5em;
            background: lightgrey;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            flex: 1 0 20%;
            position: relative;
            margin: .5em;
            padding: 2em;
            min-height: 4em;
            background: white;
            border: 3px solid grey;
        }

        .active {
            border-color: orangered;
        }

        /* This is where the magic happens */
        input[type="checkbox"] {
            position: absolute;
            top: .5em;
            left: .5em;
        }

        @media (pointer: coarse) {
            input[type="checkbox"] {
                height: 2em;
                width: 2em;
            }
        }

        /* Use z-index to make it accessible to keyboard navigation */
        @media (hover: hover) {
            input[type="checkbox"] {
                z-index: -1
            }

            .card:hover input[type="checkbox"],
            input[type="checkbox"]:focus,
            input[type="checkbox"]:checked {
                z-index: auto
            }
        }

    </style>

    <form action="{{ route('storeproducts.store') }}" method="POST">
        @csrf
        <input type="submit" value="submit">
        <div class="cards">

            <div class="card">
                <input type="checkbox" name="checkedproducts[]" value="1" />
                <img style="height: 150px"
                    src="https://i.pinimg.com/originals/b9/ad/f2/b9adf2c7ed950b4ce684f0bf15bc9dda.jpg" />
                <p style="word-wrap:break-line;">
                    aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
                </p>
            </div>

            <div class="card">
                <input type="checkbox" name="checkedproducts[]" value="2" />
            </div>

            <div class="card">
                <input type="checkbox" name="checkedproducts[]" value="3" />
            </div>

        </div>
    </form>
        <script>
            $(document).ready(function() {
                // Card Multi Select
                $('input[type=checkbox]').click(function() {
                    if ($(this).parent().hasClass('active')) {
                        $(this).parent().removeClass('active');
                    } else {
                        $(this).parent().addClass('active');
                    }
                });
            });

        </script>
    @endsection
