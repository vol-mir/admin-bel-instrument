import Lang from 'laravel-localization';
import route from './route';
import $ from "jquery";
import * as helper from "./helper";

let tableShopPhones = $('#datatable-shop-phones').DataTable({
    order: [[1, 'asc']],
    ajax: route('phones.index', {type: 'shops', id: $('#datatable-shop-phones').attr('data-shop-id')}),
    columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
        },
        {data: 'phone', name: 'phone'},
        {data: 'name', name: 'name'},
        {data: 'operator', name: 'operator'},
        {
            data: 'id',
            name: 'actions',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return '<a href="' + route('phones.edit', {type: 'shops', id: row.contactable_id, phone: row.id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('phones.destroy', {phone: row.id}) + '" class="delete btn btn-danger btn-sm js-modal-delete-dialog-phone" data-toggle="modal">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

let tableSettingPhones = $('#datatable-setting-phones').DataTable({
    order: [[1, 'asc']],
    ajax: route('phones.index', {type: 'settings', id: $('#datatable-setting-phones').attr('data-setting-id')}),
    columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
        },
        {data: 'phone', name: 'phone'},
        {data: 'name', name: 'name'},
        {data: 'operator', name: 'operator'},
        {
            data: 'id',
            name: 'actions',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return '<a href="' + route('phones.edit', {type: 'settings', id: row.contactable_id, phone: row.id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('phones.destroy', {phone: row.id}) + '" class="delete btn btn-danger btn-sm js-modal-delete-dialog-phone" data-toggle="modal">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

/**
 * Modal delete
 */
$(document).on('click', '.js-modal-delete-dialog-phone', function () {
    $('#js-btn-modal-delete-phone').attr('data-url', $(this).attr('href'));
    $('#js-modal-delete-phone').modal('show');
});

$(document).on('click', '#js-btn-modal-delete-phone', function () {
    if ($('#datatable-shop-phones').length ) {
        helper.deleteEntity($(this).attr('data-url'), tableShopPhones);
    }

    if ($('#datatable-setting-phones').length ) {
        helper.deleteEntity($(this).attr('data-url'), tableSettingPhones);
    }

    $('#js-btn-modal-delete-phone').attr('data-url', null);
    $('#js-modal-delete-phone').modal('hide');
});
