@extends('layouts.main')

@section('content')
    <div>
        @include('elements.flash-messages')
        <div class="container">
            @if(sizeof($billings) > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                        <tr>
                            <th class="field-name"><strong>S/N</strong></th>
                            <th class="field-name"><strong>Package</strong></th>
                            <th class="field-name"><strong>Total Amount</strong></th>
                            <th class="field-name"><strong>Payment Status</strong></th>
                            <th class="field-name"><strong>Payment ID</strong></th>
                            <th class="field-name"><strong>Created At</strong></th>
                            <th class="field-name"><strong>Action</strong></th>
                        </tr>
                        </thead>
                        <tbody class="fs-12">
                        @foreach($billings as $key => $billing)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ ucwords($billing->package) }}</td>
                                <td>{{ $billing->getCurrencyAndAmount() }}</td>
                                <td>
                                    <span class="status status-{{ $billing->payment_status }}">
                                        {{ $billing->payment_status }}
                                    </span>
                                </td>
                                <td>{{ $billing->payment_id }}</td>
                                <td>{{ $billing->formatDate() }}</td>
                                <td>
                                    <a href="/brief/{{ $billing->id }}" type="button" class="btn btn-sm btn-gray">
                                        {{ $billing->has_brief ? 'View Brief' : 'Complete Brief' }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <span class="material-icons empty-state__icon icon-grey">payment</span>
                    <p class="empty-state__description mt-2">No transaction has been made yet.</p>
                </div>
            @endif

            {{ $billings->render() }}
        </div>
    </div>
@endsection
