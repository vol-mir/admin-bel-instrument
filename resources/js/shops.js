import Lang from 'laravel-localization';
import route from './route';
import $ from 'jquery';
import * as helper from "./helper";
import Base64 from "admin-lte/plugins/jszip/jszip";
import {pathImageShops} from "./helper";

/**
 * Table Shops
 */
let tableShops = $('#datatable-shops').DataTable({
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
 * Modal delete for shop
 */
$(document).on('click', '.js-modal-delete-dialog-shop', function () {
    $('#js-btn-modal-delete-shop').attr('data-url', $(this).attr('href'));
    $('#js-modal-delete-shop').modal('show');
});

$(document).on('click', '#js-btn-modal-delete-shop', function () {
    helper.deleteEntity($(this).attr('data-url'), tableShops);
    $('#js-btn-modal-delete-shop').attr('data-url', null);
    $('#js-modal-delete-shop').modal('hide');
});


/**
 * Images
 */
let tableImages = $('#datatable-shop-images').DataTable({
    order: [[2, 'asc']],
    ajax: route('shops.images.index', {shop: $('#datatable-shop-images').attr('data-shop-id')}),
    columns: [
        {
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false,
        },
        {
            data: 'name',
            name: 'name',
            orderable: false,
            searchable: false,
            width: '30%',
            "render": function ( data, type, row, meta ) {
                return '<img src="' + helper.pathImageShops + row.slug + '/' + row.name + '" class="img-size-220">';
            }
        },
        {data: 'description', name: 'description'},
        {
            data: 'id',
            name: 'actions',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return '<a href="' + route('shops.images.edit', {image: row.id, shop: row.shop_id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('shops.images.destroy', {image: row.id}) + '" class="delete btn btn-danger btn-sm js-modal-delete-dialog-shop-image" data-toggle="modal">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

/**
 * Modal delete for shop image
 */
$(document).on('click', '.js-modal-delete-dialog-shop-image', function () {
    $('#js-btn-modal-delete-shop-image').attr('data-url', $(this).attr('href'));
    $('#js-modal-delete-shop-image').modal('show');
});

$(document).on('click', '#js-btn-modal-delete-shop-image', function () {
    helper.deleteEntity($(this).attr('data-url'), tableImages);
    $('#js-btn-modal-delete-shop-image').attr('data-url', null);
    $('#js-modal-delete-shop-image').modal('hide');
});

/**
 * Load Image - with Cropper
 */
$(document).on('change', '#js-input-shop-image', function () {
    if (helper.cropper) {
        helper.cropper.destroy();
        $('#js-cropper-shop-image').remove();
        $('#js-cropper-shop-container').html('');
        $('.js-crop-image').prop('disabled', 'disabled');
    }

    $('.cropper-container').css('height', 'auto');
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('<img />').attr({
                'id': 'js-cropper-shop-image',
                'class': 'cropper-img',
                'src': e.target.result,
            }).appendTo('#js-cropper-shop-container');
            helper.initCropper($('#js-cropper-shop-image')[0]);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

$(document).on('click', '#js-cropper-shop-container', function () {
    let imgSrc = helper.cropper.getCroppedCanvas().toDataURL();
    $('#js-image').val(imgSrc);
    $('.js-crop-image').removeAttr('disabled');
});
