import Lang from 'laravel-localization';
import route from './route';
import $ from 'jquery';
import * as helper from "./helper";

/**
 * Table Products
 */
let tableProducts = $('#datatable-products').DataTable({
    order: [[2, 'asc']],
    ajax: '',
    columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
        },
        {
            data: 'image',
            name: 'image',
            orderable: false,
            searchable: false,
            width: '30%',
            "render": function ( data, type, row, meta ) {
                return row.image ? '<img src="' + helper.pathImageProducts + '/' + row.image + '" class="img-size-220">' : '';
            }
        },
        {data: 'sku', name: 'sku'},
        {data: 'name', name: 'name'},
        {
            data: 'id',
            name: 'actions',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return '<a href="' + route('products.edit', {product: row.id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('products.destroy', {product: row.id}) + '" class="delete btn btn-danger btn-sm js-modal-delete-dialog-product" data-toggle="modal">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

/**
 * Modal delete for product
 */
$(document).on('click', '.js-modal-delete-dialog-product', function () {
    $('#js-btn-modal-delete-product').attr('data-url', $(this).attr('href'));
    $('#js-modal-delete-product').modal('show');
});

$(document).on('click', '#js-btn-modal-delete-product', function () {
    helper.deleteEntity($(this).attr('data-url'), tableProducts);
    $('#js-btn-modal-delete-product').attr('data-url', null);
    $('#js-modal-delete-product').modal('hide');
});

/**
 * Load Product Image - with Cropper
 */
$(document).on('change', '#js-input-product-image', function () {
    if (helper.cropper) {
        helper.cropper.destroy();
        $('#js-cropper-product-image').remove();
        $('#js-cropper-product-container').html('');
        $('.js-cropper-product-height').css('height', 0);
    }

    $('.cropper-height').css('height', 'auto');
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('<img />').attr({
                'id': 'js-cropper-product-image',
                'class': 'cropper-img',
                'src': e.target.result,
            }).appendTo('#js-cropper-product-container');
            helper.initCropper($('#js-cropper-product-image')[0]);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

$(document).on('click', '#js-cropper-product-container', function () {
    if (helper.cropper) {
        let imgSrc = helper.cropper.getCroppedCanvas().toDataURL();
        $('#js-product-image').val(imgSrc);
    }
});
