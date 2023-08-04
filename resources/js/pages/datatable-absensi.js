function DatatableAbsensi (url){
    var table = $('#absensi-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: url,
        columns: [
            { data:'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            { data:'account.personal.fullname', name:'account.personal.fullname' },
            { data:'absen_of_date', name:'absen_of_date',orderable: false, searchable: false },
            { data:'type', name:'type',orderable: false, searchable: false },
            // { data:'action', name:'action' }
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

window.DatatableAbsensi = DatatableAbsensi;
