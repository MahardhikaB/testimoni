let modalMediaAdd = document.getElementById("modalMediaAdd");
let modalMediaEdit = document.getElementById("modalMediaEdit");
let modalMediaDelete = document.getElementById("modalMediaDelete");

let titleModalMedia = document.getElementById("titleModalMedia");
let tipeInputMedia = document.getElementById("tipeInputMedia");

let mediaPromosi = document.getElementById("edit_media_promosi");
let tahunMedia = document.getElementById("edit_tahun_media");
let deskripsiMedia = document.getElementById("edit_deskripsi_media");

let btnTambahMediaPromosiBefore = document.getElementById("btnTambahMediaPromosiBefore");
let btnTambahMediaPromosiAfter = document.getElementById("btnTambahMediaPromosiAfter");
let btnCloseMedia = document.getElementById("btnCloseMedia");


let formDeleteMedia = document.getElementById("formDeleteMedia");
let formEditMedia = document.getElementById("formEditMedia");

let mediaClose = document.getElementsByClassName("mediaClose");
// let alert = document.getElementById("myAlert");

function hapusDataMedia(action) {
    console.log(action);
    modalMediaDelete.style.display = "block";
    formDeleteMedia.action = action;
}

function editDataMedia(action, nama_media, tahun_media, deskripsi_media) {
    modalMediaEdit.style.display = "block";
    formEditMedia.action = action;
    mediaPromosi.value = nama_media;
    tahunMedia.value = tahun_media;
    deskripsiMedia.value = deskripsi_media;
    formEditMedia.method = "post";
    console.log(action + " " + nama_media + " " + tahun_media + " " + deskripsi_media); 
}

btnTambahMediaPromosiBefore.onclick = function() {
    modalMediaAdd.style.display = "block";
    titleModalMedia.innerHTML = "Tambah Media Promosi Before";
    tipeInputMedia.value = "0";
}

btnTambahMediaPromosiAfter.onclick = function() {
    modalMediaAdd.style.display = "block";
    titleModalMedia.innerHTML = "Tambah Media Promosi After";
    tipeInputMedia.value = "1";
}

mediaClose[0].onclick = function() {
    console.log("TEEST")
    modalMediaAdd.style.display = "none";
}

mediaClose[1].onclick = function() {
    modalMediaEdit.style.display = "none";
}

mediaClose[2].onclick = function() {
    modalMediaDelete.style.display = "none";
}

btnCloseMedia.onclick = function() {
    modalMediaDelete.style.display = "none";
}