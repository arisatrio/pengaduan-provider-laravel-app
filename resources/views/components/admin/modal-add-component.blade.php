<div class="modal fade" id="modal-add">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">{{ $modalTitle }}</h4>
            </div>

            <div class="modal-body">
                {{ $modalBody }}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="store()" id="btnSave">Save</button>
            </div>
        </div>

    </div>
</div>