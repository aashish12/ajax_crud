@extends('layout.main')
@section('title')
   Event Page Here
@endsection
@section('content')

    <div class="container">


        <div class="page-header">

                <h3>This is the page Where We can create Events</h3>

        </div>

        <div class="col-md-4">

            Here the navigation file will be loaded

        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
        <div class="col-md-8">
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
    </div>
@endsection

@section('script')

    @endsection


