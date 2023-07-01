import Lang from 'laravel-localization';
import route from './route';
import $ from 'jquery';
import * as helper from "./helper";

/**
 * Table Categories
 */
let tableCategories = $('#datatable-categories').DataTable({
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
        {
            data: 'parent_id',
            name: 'parent_id',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return row.parent ? row.parent.name : '';
            }
        },
        {
            data: 'id',
            name: 'actions',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return '<a href="' + route('categories.edit', {category: row.id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('categories.destroy', {category: row.id}) + '" class="delete btn btn-danger btn-sm js-modal-delete-dialog-category\" data-toggle="modal">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

/**
 * Modal delete for category
 */
$(document).on('click', '.js-modal-delete-dialog-category', function () {
    $('#js-btn-modal-delete-category').attr('data-url', $(this).attr('href'));
    $('#js-modal-delete-category').modal('show');
});

$(document).on('click', '#js-btn-modal-delete-category', function () {
    helper.deleteEntity($(this).attr('data-url'), tableCategories);
    $('#js-btn-modal-delete-category').attr('data-url', null);
    $('#js-modal-delete-category').modal('hide');
});
