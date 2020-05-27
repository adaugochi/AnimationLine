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
                {!! $modalForm ? '' : $modalBody !!}
                @if($modalForm)
                    <form method="post" action="{{ $modalAction }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $id }}">
                        <p>{{ $modalMsg }}</p>
                        <button type="submit" class="btn btn-success float-right">Yes</button>
                    </form>
                @endif
            </div>

            <!-- Modal footer -->
            @if(!$modalForm)
                <div class="modal-footer">
                    <button type="button" class="btn btn-brand-primary" data-dismiss="modal">Close</button>
                </div>
            @endif
        </div>
    </div>
</div>