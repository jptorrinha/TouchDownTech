$(document).ready(function() {
    $('#tabela').DataTable({
        "language": {
            "url": "js/json/Portuguese.json"
        },
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        "columns": [
            null,
            null,
            null,
            null,
            { "width": "150px" }
        ]
    });
    $('#tabelaUsers').DataTable({
        "language": {
            "url": "js/json/Portuguese.json"
        },
        buttons: [
            'copy', 'excel', 'pdf'
        ],
        "columns": [
            null,
            null,
            null,
            { "width": "150px" }
        ]
    });
});