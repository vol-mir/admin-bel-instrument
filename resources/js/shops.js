import Lang from 'laravel-localization';
import route from './route';
import toastr from 'toastr';
import $ from "jquery";

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
                return '<a href="' + route('shops.edit', {shop: row.id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('shops.destroy', {shop: row.id}) + '" class="delete btn btn-danger btn-sm modal-delete-dialog" data-toggle="modal" data-id="' + row.id + '">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

$(document).on('click', '#btn-modal-delete', function () {
    let url = route('shops.destroy', {shop: $(this).attr('data-confirm-delete-id')});

    $.ajax({
        type: 'delete',
        url: url,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        dataType: 'json'
    }).done(function (response) {
        table.ajax.reload(null, false);
        toastr.success(Lang.get('delete_message_success'));
    }).fail(function (jqXHR, textStatus, errorThrown) {
        toastr.error(Lang.get('delete_message_error'));
    });
    $('#btn-modal-delete').attr('data-confirm-delete-id', null);
    $('#modal-delete').modal('hide');
});

if ($('#tabs-shop').length) {
    let tabsShop = localStorage.getItem('tabs-shop');
    if (tabsShop) {
        $('#' + tabsShop).tab('show');
    } else {
        $('#tabs-shop-general').tab('show');
    }
}
