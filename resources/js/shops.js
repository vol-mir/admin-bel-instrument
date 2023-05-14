import Lang from 'laravel-localization';
import route from './route';
import $ from 'jquery';
import * as helper from "./helper";

let table = $('#datatable-shops').DataTable({
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
                return '<a href="' + route('shops.edit', {shop: row.id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('shops.destroy', {shop: row.id}) + '" class="delete btn btn-danger btn-sm js-modal-delete-dialog-shop" data-toggle="modal">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

/**
 * Modal delete
 */
$(document).on('click', '.js-modal-delete-dialog-shop', function () {
    $('#js-btn-modal-delete-shop').attr('data-url', $(this).attr('href'));
    $('#js-modal-delete-shop').modal('show');
});

$(document).on('click', '#js-btn-modal-delete-shop', function () {
    helper.deleteEntity($(this).attr('data-url'), table);
    $('#js-btn-modal-delete-shop').attr('data-url', null);
    $('#js-modal-delete-shop').modal('hide');
});
