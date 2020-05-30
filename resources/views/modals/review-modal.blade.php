<!-- The Modal -->
<div class="modal fade" id="{{ $modalId }}">
    <div class="modal-dialog {{ $modalSize }}">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-gray">{{ $modalTitle }}</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body text-gray">
                <form method="post" action="{{ $modalAction }}" class="card-form__wrapper validateForm">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $userId }}">
                    <input type="hidden" name="billing_id" value="{{ $billingId }}">
                    <div class="row">
                        <div class="form-group col-12">
                            <label class="card-form__label">Order URL<span class="text-danger">*</span></label>
                            <input type="url" name="order_url" class="form-control card-form__input">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Send</button>
                </form>
            </div>

            <!-- Modal footer -->
        </div>
    </div>
</div>