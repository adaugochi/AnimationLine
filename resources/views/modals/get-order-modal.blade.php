<!-- The Modal -->
<div class="modal fade" id="{{ $modalId }}">
    <div class="modal-dialog {{ $modalSize }}">
        <div class="modal-content">

            <!-- Modal body -->
            <div class="modal-body text-gray">
                @include('elements.copy-link', ['orderURL' => $link])
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>