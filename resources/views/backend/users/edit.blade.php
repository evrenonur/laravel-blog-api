<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModal">Kullanıcı Düzenle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" id="editForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kullanıcı Adı</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kullanıcı Mail</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kullanıcı Şifre</label>
                                <input type="text" name="password" class="form-control">
                            </div>
                        </div>
                        <div class="col-xxl-6">
                            <div>
                                <label class="form-label">Kullanıcı Durum</label>
                                <select name="is_active" id="is_active" class="form-control">
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
    $('.editBtn').click(function () {
        var url = $(this).data('url');
        $.ajax({
            type: 'GET',
            url: url,
            success: function (data) {
                $('#editModal').modal('show');
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#is_active').val(data.is_active);
                $('#editForm').attr('action', data.url);
            }
        });
    });
</script>
