@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">{{ __('Unassigned Tickets') }}</div>
                        <div class="card-body">

                            <p class="h1">
                                {{ $unassignedTickets->count() }}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">{{ __('My Tickets') }}</div>
                        <div class="card-body">

                            <p class="h1">
                                {{ $myTickets->count() }}
                            </p>

                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card">
                        <div class="card-header">{{ __('My Completed Tickets') }}</div>
                        <div class="card-body">

                            <p class="h1">
                                {{ $myCompletedTickets->count() }}
                            </p>

                        </div>
                    </div>
                </div>
                

            </div>
        </div>
    </div>
</div>
@endsection
