$(document).ready(function () {
    $('#loginTable').DataTable({
        order: [[7, 'desc']], 
        columnDefs: [
            { targets: [], searchable: false, orderable: false },
            { targets: [], searchable: false, orderable: false },
            { targets: [], searchable: false, orderable: false },
            { targets: [], searchable: false, orderable: false },
        ]
    });
});