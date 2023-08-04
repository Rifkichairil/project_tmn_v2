/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
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
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************************!*\
  !*** ./resources/js/pages/datatable-karyawan.js ***!
  \**************************************************/
window.testing = function () {
  console.log('asddd');
};
window.DatatableKaryawan = function (url) {
  var table = $('#karyawan-datatable').DataTable({
    processing: true,
    serverSide: true,
    // autoWidth: false,
    ajax: url,
    columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex',
      orderable: false,
      searchable: false
    }, {
      data: 'personal.fullname',
      name: 'personal.fullname'
    }, {
      data: 'email',
      name: 'email',
      orderable: false,
      searchable: false
    }, {
      data: 'phone',
      name: 'phone',
      orderable: false,
      searchable: false
    }, {
      data: 'status',
      name: 'status',
      orderable: false,
      searchable: false
    }, {
      data: 'role',
      name: 'role',
      orderable: false,
      searchable: false
    }, {
      data: 'action',
      name: 'action'
    }],
    'columnDefs': [{
      "targets": 0,
      // your case first column
      "className": "text-center",
      "width": "4%"
    }, {
      "targets": [4, 5, 6],
      "className": "text-center"
    }]
  });
};
window.categoryEdit = function (url) {
  console.log('testing edit');
  var forms = document.getElementById('updateKaryawan');
  $.ajax({
    url: url,
    type: 'GET',
    // data : { id : id },
    success: function success(data) {
      console.log(data);
      $('#Editfullname').val(data.personal.fullname);
      $('#Editemail').val(data.email);
      $('#Editposition_id').val(data.position.name);
      $('#Editphone').val(data.phone);
      $('#Editktp_number').val(data.identity.ktp_number);
      $('#Editnpwp_number').val(data.identity.npwp_number);
      $('#Editreligion').val(data.personal.religion);
      $('#Editplace_of_birth').val(data.personal.place_of_birth);
      $('#Editdate_of_birth').val(data.personal.date_of_birth);
      $('#Editgender').val(data.personal.gender);
      $('#Editzipcode').val(data.personal.zipcode);
      $('#Editaddress').val(data.personal.address);
      $('#karyawanModalEdit').modal('show');
      forms.action = url;
    },
    error: function error(data) {
      alert('gagal melakukan proses!');
    }
  });
};

// window.DatatableKaryawan = DatatableKaryawan;
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/pages/datatable-karyawan-detail.js ***!
  \*********************************************************/
function DatatableKaryawanDetail(url) {
  var table = $('#detail-karyawan-datatable').DataTable({
    processing: true,
    serverSide: true,
    // autoWidth: false,
    ajax: url,
    columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex',
      orderable: false,
      searchable: false
    }, {
      data: 'absen_of_date',
      name: 'absen_of_date'
    }, {
      data: 'type',
      name: 'type',
      orderable: false,
      searchable: false
    }],
    'columnDefs': [{
      "targets": 0,
      // your case first column
      "className": "text-center",
      "width": "4%"
    }]
  });
}
window.DatatableKaryawanDetail = DatatableKaryawanDetail;
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************************!*\
  !*** ./resources/js/pages/datatable-absensi.js ***!
  \*************************************************/
function DatatableAbsensi(url) {
  var table = $('#absensi-datatable').DataTable({
    processing: true,
    serverSide: true,
    ajax: url,
    columns: [{
      data: 'DT_RowIndex',
      name: 'DT_RowIndex',
      orderable: false,
      searchable: false
    }, {
      data: 'account.personal.fullname',
      name: 'account.personal.fullname'
    }, {
      data: 'absen_of_date',
      name: 'absen_of_date',
      orderable: false,
      searchable: false
    }, {
      data: 'type',
      name: 'type',
      orderable: false,
      searchable: false
    }
    // { data:'action', name:'action' }
    ],

    'columnDefs': [{
      "targets": 0,
      // your case first column
      "className": "text-center",
      "width": "4%"
    }]
  });
}
window.DatatableAbsensi = DatatableAbsensi;
})();

/******/ })()
;