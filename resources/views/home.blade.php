@extends('layouts.main')
@section('title', 'Dashboard')
@section('content')
    <div class="mx-auto">
        <div class="card">
            @include('elements.flash-messages')
            @if(sizeof($billings) > 0)
                <h4 class="mb-3">Latest Transactions</h4>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="field-name"><span>S/N</span></th>
                            <th class="field-name"><span>Package</span></th>
                            <th class="field-name"><span>Total Amount</span></th>
                            <th class="field-name"><span>Payment Status</span></th>
                            <th class="field-name"><span>Payment ID</span></th>
                            <th class="field-name"><span>Created At</span></th>
                            <th class="field-name"><span>Action</span></th>
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
                                    <a href="/brief/{{ $billing->id }}" class="fs-20 text-gray">
                                        @if($billing->has_brief)
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"
                                               data-toggle="tooltip" data-placement="top"
                                               title="complete brief"></i>
                                        @else
                                            <i class="fa fa-eye" aria-hidden="true"
                                                data-toggle="tooltip" data-placement="top"
                                                title="view brief"></i>
                                        @endif
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
