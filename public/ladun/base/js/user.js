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
        editAtc : function(idProduk)
        {
            editProduk(idProduk);
        },
        prosesUpdateProdukAtc : function()
        {
            let kdProduk = appProduk.kdProdukEdit;
            let nama = document.querySelector("#txtNamaProdukEdit").value;
            let harga = document.querySelector("#txtHargaEdit").value;
            let kategori = document.querySelector("#txtKategoriEdit").value;
            let ds = {'kdProduk':kdProduk, 'nama':nama, 'harga':harga, 'kategori':kategori}
            axios.post(rProsesUpdateProduk, ds).then(function(res){
                $("#modalEditProduk").modal("hide");
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
            confirmQuest('info', 'Konfirmasi', 'Hapus produk ...?', function (x) {deleteConfirm(idProduk)});
        },
        importProdukAtc : function()
        {
            $("#modalImportProduk").modal("show");
        },
        prosesImportProdukAtc : function()
        {
            confirmQuest('info', 'Konfirmasi', 'Import produk... ?', function (x) {konfirmasiImport()});
        }
    }
});
// inisialisasi 
$("#tblDataProduk").dataTable();

function konfirmasiImport()
{
    axios.post(rProsesImportProduk).then(function(res){
        let pesan = "Produk berhasil di import, total "+res.data.totalProduk+" produk berhasil di import ..";
        $("#modalImportProduk").modal("hide");
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', pesan);
            renderPage('app/produk/data', 'Produk');
        }, 400);
    });
}

function deleteConfirm(idProduk)
{
    let ds = {'idProduk' : idProduk}
    axios.post(rProsesHapusProduk, ds).then(function(res){
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data produk berhasil dihapus');
            renderPage('app/produk/data', 'Produk');
        }, 10);
    });
}

function editProduk(idProduk)
{
    appProduk.kdProdukEdit = idProduk;
    let ds = {'idProduk' : idProduk}
    axios.post(rGetDataProduk, ds).then(function(res){
        $("#modalEditProduk").modal("show");
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
        $("#modalTambahProduk").modal("hide");
        setTimeout(function(){
            pesanUmumApp('success', 'Sukses', 'Data User berhasil ditambahkan');
            renderPage('app/user/data', 'Data User');
        }, 300);
       
    });
}