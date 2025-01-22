<div class="modal fade" id="modal-delete-{{ $category->id }}">
    <div class="modal-dialog">
        <form action="{{ route('category.delete', ['id' => $category->id]) }}" method="POST">
            @csrf
            @method('delete')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin menghapus category ini?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-danger">Confirm</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>