@extends('portal.layouts.main')
@section('title', 'Order')
@section('header-breadcrumb')
    <li class="active">Orders</li>
@endsection()
@section('content-body')
    <div class="card card-table">
        @if(sizeof($billings) > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="field-name"><span>S/N</span></th>
                        <th class="field-name"><span>Service</span></th>
                        <th class="field-name"><span>Total Amount</span></th>
                        <th class="field-name"><span>Package</span></th>
                        <th class="field-name"><span>Status</span></th>
                        <th class="field-name"><span>Created At</span></th>
                        <th class="field-name"><span>Action</span></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($billings as $key => $billing)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                {{ ucfirst($billing->service) }}
                            </td>
                            <td>{{ $billing->getCurrencyAndAmount() }}</td>
                            <td>
                                    <span class="font-weight-bold status status-{{ $billing->package }}">
                                        {{ $billing->package }}
                                    </span>
                            </td>
                            <td>
                                    <span class="font-weight-bold status status-{{ $billing->status }}">
                                        {{ ucwords(str_replace('-', ' ', $billing->status)) }}
                                    </span>
                            </td>
                            <td>{{ $billing->formatDate() }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-secondary dropdown-toggle"
                                            data-toggle="dropdown">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu dropdown__custom-navbar">
                                        <a class="dropdown-item" href="#">View Brief</a>
                                        <a class="dropdown-item" href="#">View Profile</a>
                                        <a class="dropdown-item" href="#">In Review</a>
                                        <a class="dropdown-item" href="#">Delivered</a>
                                    </div>
                                </div>
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
@endsection