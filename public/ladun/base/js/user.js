// route 
var rProsesTambahUser = server + "app/user/tambah/proses";
var rGetDataUser = server + "app/user/data/res";
var rProsesUpdateUser = server + "app/user/update/proses";
var rProsesHapusUser = server + "app/user/hapus/proses";

// vue object 
var appUser = new Vue({
    el : '#divDataUser',
    data : {
        kdProdukEdit : ''
    },
    methods : {
        tambahUserAtc : function()
        {
            $("#modalTambahUser").modal("show");
            setTimeout(function(){
                document.querySelector("#txtNamaUser").focus();
            }, 500);
        },
        editAtc : function(id)
        {
            editUser(id);
        },
        prosesUpdateUserkAtc : function()
        {
            let kdProduk = appProduk.kdProdukEdit;
            let nama = document.querySelector("#txtNamaProdukEdit").value;
            let harga = document.querySelector("#txtHargaEdit").value;
            let kategori = document.querySelector("#txtKategoriEdit").value;
            let ds = {'kdProduk':kdProduk, 'nama':nama, 'harga':harga, 'kategori':kategori}
            axios.post(rProsesUpdateProduk, ds).then(function(res){
                $("#modalEditUser").modal("hide");
                setTimeout(function(){
                    pesanUmumApp('success', 'Sukses', 'Data produk berhasil diupdate');
                    renderPage('app/produk/data');
                }, 300);
            });
        },
        prosesTambahUser : function()
        {
            prosesTambahUser();
        },
        deleteAtc : function(idProduk)
        {
            confirmQuest('info', 'Konfirmasi', 'Hapus User ...?', function (x) {deleteConfirm(idProduk)});
        }
    }
});
// inisialisasi 
$("#tblDataProduk").dataTable();



function deleteConfirm(id)
{
    let ds = {'id' : id}
    axios.post(rProsesHapusUser, ds).then(function(res){
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data User berhasil dihapus');
            renderPage('app/user/data', 'Data User');
        }, 10);
    });
}

function editProduk(id)
{
    appProduk.kdProdukEdit = idProduk;
    let ds = {'idProduk' : idProduk}
    axios.post(rGetDataProduk, ds).then(function(res){
        $("#modalEditUser").modal("show");
        document.querySelector("#txtNamaProdukEdit").value = res.data.nama_produk;
        document.querySelector("#txtHargaEdit").value = res.data.harga;
        document.querySelector("#txtKategoriEdit").value = res.data.kd_kategori;
        setTimeout(function(){
            document.querySelector("#txtNamaProdukEdit").focus();
        }, 500);
    });
}

function prosesTambahUser()
{
    let nama = document.querySelector("#txtNamaUser").value;
    let password = document.querySelector("#txtPassword").value;
    let role = document.querySelector("#txtRole").value;
    let ds = {'username':nama, 'password':password, 'role':role}
    axios.post(rProsesTambahUser, ds).then(function(res){
        $("#modalTambahUser").modal("hide");
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data User berhasil ditambahkan');
            renderPage('app/user/data', 'Data User');
        }, 300);
       
    });
}