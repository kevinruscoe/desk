@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Tickets') }}</div>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th width=250>Title</th>
                            <th width=100>Agent</th>
                            <th width=150>Customer</th>
                            <th width=150>Status</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td class="truncate truncate-250" title="{{ $ticket->title }}">
                                    {{ $ticket->title }}
                                </td>
                                <td class="truncate truncate-100">
                                    {{ $ticket->agent->name }}
                                </td>
                                <td class="truncate truncate-100">
                                    {{ $ticket->customer->name }}
                                </td>
                                <td>
                                    {{ $ticket->status }}
                                </td>
                                <td>
                                    <span title="{{ $ticket->created_at }}">
                                        {{ $ticket->created_at->diffForHumans() }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="card-footer">
                    {!! $tickets->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
