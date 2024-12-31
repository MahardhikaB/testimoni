let modalLainnyaAdd = document.getElementById("modalLainnyaAdd");
let modalLainnyaEdit = document.getElementById("modalLainnyaEdit");
let modalLainnyaDelete = document.getElementById("modalLainnyaDelete");

let titleModalLainnya = document.getElementById("titleModalLainnya");

let Lainnya = document.getElementById("edit_Lainnya_promosi");
let tahunLainnya = document.getElementById("edit_tahun_Lainnya");
let deskripsiLainnya = document.getElementById("edit_deskripsi_Lainnya");

let btnTambahLainnyaBefore = document.getElementById("btnTambahLainnyaBefore");
let btnCloseLainnya = document.getElementById("btnCloseLainnya");

let formDeleteLainnya = document.getElementById("formDeleteLainnya");
let formEditLainnya = document.getElementById("formEditLainnya");

let LainnyaClose = document.getElementsByClassName("LainnyaClose");

function hapusDatalainnya(action) {
    console.log(action);
    modalLainnyaDelete.style.display = "block";
    formDeleteLainnya.action = action;
}

function editDatalainnya(action, tanggal_ekspor, deskripsi, bukti_gambar) {
    console.log(action);
    modalLainnyaEdit.style.display = "block";
    formEditLainnya.action = action;
    tahunLainnya.value = tanggal_ekspor;
    deskripsiLainnya.value = deskripsi;
    document.getElementById.value = bukti_gambar;
    formEditLainnya.method = "post";
    console.log(action + " " + tanggal_ekspor + " " + deskripsi + " " + bukti_gambar); 
}

btnTambahLainnyaBefore.onclick = function() {
    modalLainnyaAdd.style.display = "block";
    titleModalLainnya.innerHTML = "Tambah Progress Lainnya";
}

LainnyaClose[0].onclick = function() {
    modalLainnyaAdd.style.display = "none";
}

LainnyaClose[1].onclick = function() {
    modalLainnyaEdit.style.display = "none";
}

LainnyaClose[2].onclick = function() {
    modalLainnyaDelete.style.display = "none";
}

btnCloseLainnya.onclick = function() {
    modalLainnyaDelete.style.display = "none";
}