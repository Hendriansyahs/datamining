<div class="row" id="divDataUser">
    <div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">Management User</h4>
            <div class="table-responsive">
                <p>
                 <a class="btn btn-primary waves-effect waves-light" href="javascript:void(0)" @click="tambahUserAtc()">
                        <i class="mdi mdi-plus-box-multiple-outline"></i>
                        Tambah User Baru
                    </a>&nbsp;
                </p>
                <table class="table mb-0 table-hover" id="tblLaporan">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Role</th>
                            <th>Tanggal Register</th>
                            <th>Tanggal Update</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($dataUser as $user)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $user -> username }}</td>
                        <td>{{ $user -> role }}</td>
                        <td>{{ $user -> created_at }}</td>
                        <td>{{ $user -> updated_at }}</td>
                        <td>
                            @if ($user->active == 1)
                            Aktif
                            @elseif ($user->active != 1) Diblokir
                            @endif</td>
                        <td>
                            <!-- <a class="btn btn-warning btn-sm" href="javascript:void(0)" @click="editAtc('{{ $user -> id }}')">Edit</a>
 -->
                            <a class="btn btn-danger btn-sm" href="javascript:void(0)" @click="deleteAtc('{{ $user -> id }}')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
</div>
@include('main.user.modal')
<script src="{{ asset('ladun/base/') }}/js/user.js"></script>
<script>
    $("#tblLaporan").dataTable();
</script>