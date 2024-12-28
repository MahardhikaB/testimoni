let modalProdukAdd = document.getElementById("modalProdukAdd");
let modalProdukEdit = document.getElementById("modalProdukEdit");
let modalProdukDelete = document.getElementById("modalProdukDelete");
let modalImage = document.getElementById("imageModal");

let titleModalProduk = document.getElementById("titleModalProduk");
let tipeInputProduk = document.getElementById("tipeInputProduk");

let produk = document.getElementById("edit_media_promosi");
let hargaProduk = document.getElementById("edit_tahun_media");
let deskripsiProduk = document.getElementById("edit_deskripsi_media");
let fotoContent = document.getElementById("img01");

// Image
let imageSource = document.getElementsByClassName("foto");

let btnTambahProdukBefore = document.getElementById("btnTambahProdukBefore");
let btnTambahProdukAfter = document.getElementById("btnTambahProdukAfter");
let btnCloseProduk = document.getElementById("btnCloseProduk");
let imageClose = document.getElementsByClassName("imageClose")[0];


let formDeleteProduk = document.getElementById("formDeleteProduk");
let formEditProduk = document.getElementById("formEditProduk");

let produkClose = document.getElementsByClassName("produkClose");

let indexFoto = 0;

function openImageModal(src, index){
    console.log(src, index);
    indexFoto = index;
    modalImage.style.display = "block";
    fotoContent.src = src;
}

function nextImage(){
    indexFoto++;
    if(indexFoto >= imageSource.length){
        indexFoto = 0;
    }
    fotoContent.src = imageSource[indexFoto].src;
}

function prevImage(){
    indexFoto--;
    if(indexFoto < 0){
        indexFoto = imageSource.length - 1;
    }
    fotoContent.src = imageSource[indexFoto].src;
}

imageClose.onclick = function() {
    modalImage.style.display = "none";
}

function hapusDataProduk(action) {
    console.log(action);
    modalProdukDelete.style.display = "block";
    formDeleteProduk.action = action;
}

function editDataProduk(action, nama_media, tahun_media, deskripsi_media) {
    modalProdukEdit.style.display = "block";
    formEditProduk.action = action;
    produk.value = nama_media;
    hargaProduk.value = tahun_media;
    deskripsiProduk.value = deskripsi_media;
    formEditProduk.method = "post";
    console.log(action + " " + nama_media + " " + tahun_media + " " + deskripsi_media); 
}

btnTambahProdukBefore.onclick = function() {
    modalProdukAdd.style.display = "block";
    titleModalProduk.innerHTML = "Tambah Produk Promosi Before";
    tipeInputProduk.value = "0";
}

btnTambahProdukAfter.onclick = function() {
    modalProdukAdd.style.display = "block";
    titleModalProduk.innerHTML = "Tambah Produk Promosi After";
    tipeInputProduk.value = "1";
}

produkClose[0].onclick = function() {
    console.log("TEEST")
    modalProdukAdd.style.display = "none";
}

// produkClose[1].onclick = function() {
//     modalProdukEdit.style.display = "none";
// }

// produkClose[2].onclick = function() {
//     modalProdukDelete.style.display = "none";
// }

// btnCloseProduk.onclick = function() {
//     modalProdukDelete.style.display = "none";
// }