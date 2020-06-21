<?php
use App\Billing;
use App\Contants\Message;
?>

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
                                <div class="dropdown-menu">
                                    @if(in_array($billing->status, [Billing::IN_PROGRESS, Billing::PENDING, Billing::COMPLETED]))
                                        <a class="dropdown-item" href="{{ route('admin.brief', $billing->id) }}">
                                            View Brief
                                        </a>
                                    @endif
                                    @if(in_array($billing->status, [Billing::IN_PROGRESS, Billing::PENDING]))
                                        <span class="dropdown-item cursor-pointer" data-toggle="modal"
                                              data-target="#reviewModal{{$billing->id}}">Mark as In-Review
                                        </span>
                                    @endif
                                    @if(in_array($billing->status, [Billing::CONFIRM, Billing::COMPLETED]))
                                        <span class="dropdown-item cursor-pointer" data-toggle="modal"
                                              data-target="#deliveredModal{{$billing->id}}">Mark as Delivered
                                            </span>
                                    @endif
                                    @if($billing->status === Billing::PENDING)
                                        <a class="dropdown-item" href="{{ route('order.comment', $billing->id) }}">
                                            View Comments
                                        </a>
                                    @endif
                                    @if($billing->status === Billing::DRAFT)
                                        <a class="dropdown-item" href="{{ route('brief-reminder', $billing->id) }}">
                                            Send Reminder
                                        </a>
                                    @endif
                                    @if($billing->status === Billing::DELIVERED)
                                        <a class="dropdown-item" href="{{ route('order.detail', $billing->id) }}">
                                            View Detail
                                        </a>
                                    @endif
                                    @if($billing->status === Billing::UNPAID)
                                        <a class="dropdown-item" href="{{ route('payment-reminder', $billing->id) }}">
                                            Payment Reminder
                                        </a>
                                    @endif
                                </div>
                                @include('modals.review-modal', [
                                    'modalId' => 'reviewModal'.$billing->id,
                                    'modalSize' => 'modal-md',
                                    'modalTitle' => 'Send Order To Customer',
                                    'modalAction' => route('complete'),
                                    'userId' => $billing->user_id,
                                    'billingId' => $billing->id
                                ])
                                @include('modals.confirm-modal', [
                                    'modalId' => 'deliveredModal'.$billing->id,
                                    'modalSize' => 'modal-sm',
                                    'modalTitle' => 'Deliver Order',
                                    'modalAction' => route('deliver'),
                                    'id' => $billing->id,
                                    'modalMsg' => Message::DELIVERED_MSG
                                ])
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