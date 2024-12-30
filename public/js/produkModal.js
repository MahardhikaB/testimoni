let modalProdukAdd = document.getElementById("modalProdukAdd");
let modalProdukEdit = document.getElementById("modalProdukEdit");
let modalProdukDelete = document.getElementById("modalProdukDelete");
let modalImage = document.getElementById("imageModal");

let titleModalProduk = document.getElementById("titleModalProduk");
let tipeInputProduk = document.getElementById("tipeInputProduk");

let produk = document.getElementById("edit_nama_produk");
let hargaProduk = document.getElementById("edit_harga_produk");
let deskripsiProduk = document.getElementById("edit_deskripsi_produk");
let fotoContent = document.getElementById("img01");

let edit_foto_1_preview = document.getElementById("edit_foto_1_preview");
let edit_foto_2_preview = document.getElementById("edit_foto_2_preview");
let edit_foto_3_preview = document.getElementById("edit_foto_3_preview");
let edit_foto_4_preview = document.getElementById("edit_foto_4_preview");
let edit_foto_5_preview = document.getElementById("edit_foto_5_preview");

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
let indexProduk = 0;
let imageSourceIndexed = [];

for (let i = 0; i < imageSource.length; i++) {
    let index = imageSource[i].getAttribute('data-index');
    if (!imageSourceIndexed[index]) {
        imageSourceIndexed[index] = [];
    }
    imageSourceIndexed[index].push(imageSource[i]);
}

function openImageModal(src, index, id_produk){
    indexProduk = id_produk;
    indexFoto = index;
    modalImage.style.display = "block";
    fotoContent.src = src;
    console.log(src, index, id_produk);
    console.log(imageSourceIndexed);
    console.log(imageSourceIndexed[indexProduk][indexFoto]);
}

function nextImage(){ 
    indexFoto++;
    if (indexFoto >= imageSourceIndexed[indexProduk].length) {
        indexFoto = 0;
    }
    console.log("change to " + indexFoto + ", " + indexProduk);
    fotoContent.src = imageSourceIndexed[indexProduk][indexFoto].src;
}

function prevImage(){
    indexFoto--;
    if(indexFoto < 0){
        indexFoto = imageSourceIndexed[indexProduk].length - 1;
    }
    console.log("change to " + indexFoto + ", " + indexProduk);
    fotoContent.src = imageSourceIndexed[indexProduk][indexFoto].src;
}

imageClose.onclick = function() {
    modalImage.style.display = "none";
}

function hapusDataProduk(action) {
    console.log(action);
    modalProdukDelete.style.display = "block";
    formDeleteProduk.action = action;
}

function editDataProduk(action, nama_produk, harga_produk, deskripsi_produk, foto_1, foto_2, foto_3, foto_4, foto_5) {
    console.log(action, nama_produk, harga_produk, deskripsi_produk, foto_1, foto_2, foto_3, foto_4, foto_5);
    modalProdukEdit.style.display = "block";
    formEditProduk.action = action;
    produk.value = nama_produk;
    hargaProduk.value = harga_produk;
    deskripsiProduk.value = deskripsi_produk;
    if(foto_1){
        edit_foto_1_preview.src = '/storage/photos/' + foto_1;
        edit_foto_1_preview.style.display = "block";
        document.getElementById("edit_foto_1_old").value = foto_1;
    }
    if(foto_2){
        edit_foto_2_preview.src = '/storage/photos/' + foto_2;
        edit_foto_2_preview.style.display = "block";
        document.getElementById("edit_foto_2_old").value = foto_2;
    }
    if(foto_3){
        edit_foto_3_preview.src = '/storage/photos/' + foto_3;
        edit_foto_3_preview.style.display = "block";
        document.getElementById("edit_foto_3_old").value = foto_3;
    }
    if(foto_4){
        edit_foto_4_preview.src = '/storage/photos/' + foto_4;
        edit_foto_4_preview.style.display = "block";
        document.getElementById("edit_foto_4_old").value = foto_4;
    }
    if(foto_5){
        edit_foto_5_preview.src = '/storage/photos/' + foto_5;
        edit_foto_5_preview.style.display = "block";
        document.getElementById("edit_foto_5_old").value = foto_5;
    }
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

produkClose[1].onclick = function() {
    modalProdukEdit.style.display = "none";
}

produkClose[2].onclick = function() {
    modalProdukDelete.style.display = "none";
}

btnCloseProduk.onclick = function() {
    modalProdukDelete.style.display = "none";
}