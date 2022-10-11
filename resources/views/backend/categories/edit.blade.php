<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Kategori Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="editForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kategori Başlık</label>
                                <input type="text" name="category_name" id="category_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kategori Durum</label>
                                <select name="status" id="category_status" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label for="lastName" class="form-label">Kategori Resim</label>
                                <input type="file" class="form-control" name="category_image">
                                <input type="hidden" class="form-control" name="temp_image" id="temp_image">
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
    $('.editBtn').click(function () {
        var url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                $('#editModal').modal('show');
                $('#category_name').val(data.category_name);
                $('#category_status').val(data.status);
                $('#temp_image').val(data.category_image);
                $('#editForm').attr('action', data.url);
            }
        });
    });
</script>
