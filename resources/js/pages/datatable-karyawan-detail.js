window.test = function(){
    console.log('testing');
}

window.DatatableKaryawanDetail = function(url){
    var table = $('#detail-karyawan-datatable').DataTable({
        processing: true,
        serverSide: true,
        // autoWidth: false,
        ajax: url,
        columns: [
            { data:'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data:'absen_of_date', name:'absen_of_date' },
            { data:'type', name:'type' },
        ],
        'columnDefs': [
            {
                "targets": 0, // your case first column
                "className": "text-center",
                "width": "4%"
            },
        ]
    })
}
