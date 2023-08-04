window.testing = function(){
    console.log('asddd');
}

window.DatatableKaryawan = function(url){
    var table = $('#karyawan-datatable').DataTable({
        processing: true,
        serverSide: true,
        // autoWidth: false,
        ajax: url,
        columns: [
            { data:'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data:'personal.fullname', name:'personal.fullname' },
            { data:'email', name:'email',orderable: false, searchable: false },
            { data:'phone', name:'phone', orderable: false, searchable: false },
            { data:'status', name:'status', orderable: false, searchable: false },
            { data:'role', name:'role', orderable: false, searchable: false },
            { data:'action', name:'action' }
        ],
        'columnDefs': [
            {
                "targets": 0, // your case first column
                "className": "text-center",
                "width": "4%"
            },
            {
                "targets": [4,5,6],
                "className": "text-center",
            }
        ]
    })
}

window.categoryEdit = function(url){
    console.log('testing edit');
    let forms = document.getElementById('updateKaryawan');
    $.ajax({
        url,
        type: 'GET',
        // data : { id : id },
        success: function(data){
            console.log(data);
            $('#Editfullname').val(data.personal.fullname)
            $('#Editemail').val(data.email)
            $('#Editposition_id').val(data.position.name)
            $('#Editphone').val(data.phone)
            $('#Editktp_number').val(data.identity.ktp_number)
            $('#Editnpwp_number').val(data.identity.npwp_number)
            $('#Editreligion').val(data.personal.religion)
            $('#Editplace_of_birth').val(data.personal.place_of_birth)
            $('#Editdate_of_birth').val(data.personal.date_of_birth)
            $('#Editgender').val(data.personal.gender)
            $('#Editzipcode').val(data.personal.zipcode)
            $('#Editaddress').val(data.personal.address)
            $('#karyawanModalEdit').modal('show');
            forms.action = url;
        },
        error: function(data){
            alert('gagal melakukan proses!');
        }
    })
}

// window.DatatableKaryawan = DatatableKaryawan;
