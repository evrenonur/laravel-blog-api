<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Soru Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="editForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Soru</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">İçerik</label>
                               <textarea id="body" name="body" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Soru Durum</label>
                                <select name="is_published" id="is_published" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">İptal</button>
                                <button type="submit" class="btn btn-primary">Kaydet</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.editQuestions').on('click', function () {
            var url = $(this).data('url');
            $.ajax({
                type: 'GET',
                url: url,
                success: function (data) {
                    $('#title').val(data.title);
                    $('#body').val(data.body);
                    $('#is_published').val(data.is_published);
                    $('#editForm').attr('action', data.url);
                    $('#editModal').modal('show');
                }
            });
        });
    });
</script>

