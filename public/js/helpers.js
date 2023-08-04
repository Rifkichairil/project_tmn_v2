/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/helpers.js ***!
  \*********************************/
var npwpInput = document.getElementById('npwp_number');

// Menambahkan event listener untuk setiap perubahan pada input field
npwpInput.addEventListener('input', function () {
  var npwp = this.value.replace(/[^0-9]/g, ''); // Hanya mempertahankan angka
  npwp = npwp.slice(0, 15); // Memotong panjang NPWP menjadi maksimum 15 karakter

  // Menambahkan format ke dalam NPWP
  if (npwp.length > 2) {
    npwp = npwp.slice(0, 2) + '.' + npwp.slice(2);
  }
  if (npwp.length > 6) {
    npwp = npwp.slice(0, 6) + '.' + npwp.slice(6);
  }
  if (npwp.length > 10) {
    npwp = npwp.slice(0, 10) + '.' + npwp.slice(10);
  }
  if (npwp.length > 12) {
    npwp = npwp.slice(0, 12) + '-' + npwp.slice(12);
  }
  if (npwp.length > 16) {
    npwp = npwp.slice(0, 16) + '.' + npwp.slice(16);
  }
  this.value = npwp;
});
var phoneInput = document.getElementById('phone');
phoneInput.addEventListener('input', function (event) {
  var phoneNumber = event.target.value.trim();
  if (phoneNumber.startsWith('0')) {
    phoneNumber = phoneNumber.replace(/^0/, '+62');
  } else if (phoneNumber.startsWith('62')) {
    phoneNumber = phoneNumber.replace(/^62/, '+62');
  }
  event.target.value = phoneNumber;
});
var zipCodeInput = document.getElementById('zipcode');

// Menambahkan event listener untuk setiap perubahan pada input field
zipCodeInput.addEventListener('input', function () {
  var zip = this.value.replace(/[^0-9]/g, ''); // Hanya mempertahankan angka
  zip = zip.slice(0, 5); // Memotong panjang input menjadi maksimum 16 karakter

  this.value = zip;
});
var npwpInputEdit = document.getElementById('Editnpwp_number');

// Menambahkan event listener untuk setiap perubahan pada input field
npwpInputEdit.addEventListener('input', function () {
  var npwp = this.value.replace(/[^0-9]/g, ''); // Hanya mempertahankan angka
  npwp = npwp.slice(0, 15); // Memotong panjang NPWP menjadi maksimum 15 karakter

  // Menambahkan format ke dalam NPWP
  if (npwp.length > 2) {
    npwp = npwp.slice(0, 2) + '.' + npwp.slice(2);
  }
  if (npwp.length > 6) {
    npwp = npwp.slice(0, 6) + '.' + npwp.slice(6);
  }
  if (npwp.length > 10) {
    npwp = npwp.slice(0, 10) + '.' + npwp.slice(10);
  }
  if (npwp.length > 12) {
    npwp = npwp.slice(0, 12) + '-' + npwp.slice(12);
  }
  if (npwp.length > 16) {
    npwp = npwp.slice(0, 16) + '.' + npwp.slice(16);
  }
  this.value = npwp;
});
var phoneInputEdit = document.getElementById('Editphone');
phoneInputEdit.addEventListener('input', function (event) {
  var phoneNumber = event.target.value.trim();
  if (phoneNumber.startsWith('0')) {
    phoneNumber = phoneNumber.replace(/^0/, '+62');
  } else if (phoneNumber.startsWith('62')) {
    phoneNumber = phoneNumber.replace(/^62/, '+62');
  }
  event.target.value = phoneNumber;
});
var zipCodeInputEdit = document.getElementById('Editzipcode');

// Menambahkan event listener untuk setiap perubahan pada input field
zipCodeInputEdit.addEventListener('input', function () {
  var zip = this.value.replace(/[^0-9]/g, ''); // Hanya mempertahankan angka
  zip = zip.slice(0, 5); // Memotong panjang input menjadi maksimum 16 karakter

  this.value = zip;
});
/******/ })()
;