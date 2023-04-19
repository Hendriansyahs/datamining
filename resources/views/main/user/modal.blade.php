<!-- modal tambah user  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalTambahUser">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="company">User Name</label>
                    <input type="text" class="form-control" id="txtNamaUser">
                </div>
                <div class="form-group">
                    <label for="company">Password</label>
                    <input type="password" class="form-control" id="txtPassword">
                </div>
                <div class="form-group">
                    <label for="company">Role</label>
                    <select class="form-control" id="txtRole">
                        <option value="none">--- Pilih Role ---</option>
                        <option value="ADMIN">Admin</option>
                        <option value="ADMIN">User</option>
                    </select>
                </div>
                <div>
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="prosesTambahUser()">Proses Tambah User</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit produk  -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEditUser">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="company">Nama User</label>
                    <input type="text" class="form-control" id="txtNamaUserEdit" readonly>
                </div>
                <div class="form-group">
                    <label for="company">Password Baru</label>
                    <input type="text" class="form-control" id="txtPasswordEdit">
                </div>
                <div>
                    <a href="javascript:void(0)" @click="prosesUpdateUserAtc()" class="btn btn-primary">Update Data User</a>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
</div>