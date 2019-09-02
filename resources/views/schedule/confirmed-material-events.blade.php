@extends('adminlte::page')
@section('title', 'Agendamento de cirurgias')
@section('css')
    <link href=' {{asset('vendor/fullcalendar/fullcalendar.min.css')}}' rel='stylesheet' />
    <link href='{{asset('vendor/fullcalendar/fullcalendar.print.min.css')}}' rel='stylesheet' media='print' />
    <link rel="stylesheet" href="{{ asset('css/scheduling/scheduling.css') }}">
    <style>
        .custom-overflow {
            overflow-y: scroll;
            max-height: 388px;
        }
        .modal-backdrop
        {
            opacity:0.5 !important;
        }
    </style>

@endsection
@section('js')
    <script>
        json = document.getElementById('surgical-rooms-json');
        window.surgicalRooms = JSON.parse(json.value);
    </script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src='{{ asset('vendor/fullcalendar/lib/moment.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/lib/jquery-ui.min.js')}}'></script>
    <script src='{{ asset('vendor/fullcalendar/fullcalendar.min.js')}}'></script>
    <script src="{{ asset('js/schedule/confirmed-materials.js') }}"></script>
@endsection

@section('content')
    <input type="hidden" id="surgical-rooms-json" value="{{ $surgicalRoomsJSON }}">
    <div id="app">
        <input type="hidden" id="csrf" value="{{ csrf_token() }}">
        {{-- Events config --}}
        <input id="event-config" type="hidden"
               data-color="#24872c"
               data-room="1">
        {{-- End event config --}}
        <div class="row" id="search-row">
            <div class="col-md-9">
                <div class="box-1">
                    <div class="container-1">
                        <span class="icon"><i class="fa fa-search"></i></span>
                        <input type="search"
                               data-id=""
                               id="search"
                               placeholder="Digite o número do prontuário ou o nome do paciente..." />
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="">
                    <button class="btn btn-sm btn-primary" data-id="1" id="search-button">Pesquisar</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="box-1">
                    <div class="container-1">
                        <span class="icon"><i class="fa fa-calendar"></i></span>
                        <input type="date"
                               id="goToDate"
                               data-sala="1"
                               placeholder="Ir para data...">
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-sm btn-primary" id="btnGoToDate">Ir para data</button>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div id="fullCalendar"></div>
            </div>
        </div>
    </div>
    @include('_modals.schedule.event-click-modal')
    @include('_modals.scheduling.change-room-modal')
    @include('_modals.scheduling.change-status-modal')
    @include('_modals.scheduling.change-event-date-modal')
    @include('_modals.scheduling.history-modal')
@endsection
