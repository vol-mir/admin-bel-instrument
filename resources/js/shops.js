import Lang from 'laravel-localization';
import route from './route';

$('#datatable-shops').DataTable({
    order: [[1, 'asc']],
    ajax: '',
    columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
        },
        {data: 'name', name: 'name'},
        {data: 'registration_number', name: 'registration_number'},
        {
            data: 'id',
            name: 'actions',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return '<a href="' + route('shops.edit', { shop: row.id }) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('shops.destroy', { shop: row.id }) + '" class="delete btn btn-danger btn-sm">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

