/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*****************************************!*\
  !*** ./resources/js/pages/dashboard.js ***!
  \*****************************************/
// import Chart from "chart.js/auto";
// import axios from "axios";

window.DashboardPage = function (url) {
  "use strict";

  var registeredData, myChart;

  // Chart widget page
  if ($("#myChart").length) {
    var ctx = $("#myChart")[0].getContext("2d");
    var date = new Date();
    $.ajax({
      url: url,
      type: 'GET',
      // data : { id : id },
      success: function success(data) {
        console.log(data.data[0][0]["value"]);
        myChart = new Chart(ctx, {
          type: "bar",
          data: {
            labels: data.labels,
            datasets: [{
              label: 'Clock In',
              data: data.data[0][0]["value"],
              borderWidth: 1,
              backgroundColor: '#9BD0F5'
            }, {
              label: 'Clock Out',
              data: data.data[0][1]["value"],
              borderWidth: 1,
              backgroundColor: '#000'
            }]
          },
          options: {
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false
              }
            },
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      },
      error: function error(data) {
        alert('gagal melakukan proses!');
      }
    });
  }
};
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*********************************************************!*\
  !*** ./resources/js/pages/datatable-karyawan-detail.js ***!
  \*********************************************************/
window.test = function () {
  console.log('testing');
};
window.DatatableKaryawanDetail = function (url) {
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
};
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!**************************************************!*\
  !*** ./resources/js/pages/datatable-karyawan.js ***!
  \**************************************************/
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
      data: 'position',
      name: 'position',
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
      $('#Editstatus').val(data.personal.status == 1 ? 'AKTIF' : 'TIDAK AKTIF');
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
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*************************************************!*\
  !*** ./resources/js/pages/datatable-absensi.js ***!
  \*************************************************/
window.DatatableAbsensi = function (url) {
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
};
})();

/******/ })()
;