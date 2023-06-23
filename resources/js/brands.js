import Lang from 'laravel-localization';
import route from './route';
import $ from 'jquery';
import * as helper from "./helper";

/**
 * Table Brands
 */
let tableBrands = $('#datatable-brands').DataTable({
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
            data: 'name',
            name: 'name',
            orderable: false,
            searchable: false,
            width: '30%',
            "render": function ( data, type, row, meta ) {
                return '<img src="' + helper.pathImageBrands + '/' + row.name + '" class="img-size-220">';
            }
        },
        {data: 'description', name: 'description'},
        {
            data: 'id',
            name: 'actions',
            orderable: false,
            searchable: false,
            "render": function ( data, type, row, meta ) {
                return '<a href="' + route('brands.edit', {brand: row.id}) + '" class="edit btn btn-primary btn-sm">' + Lang.get('edit') + '</a> <a href="' + route('brands.destroy', {brand: row.id}) + '" class="delete btn btn-danger btn-sm js-modal-delete-dialog-brand" data-toggle="modal">' + Lang.get('delete') + '</a>';
            }
        },
    ]
});

/**
 * Modal delete for brand
 */
$(document).on('click', '.js-modal-delete-dialog-brand', function () {
    $('#js-btn-modal-delete-brand').attr('data-url', $(this).attr('href'));
    $('#js-modal-delete-brand').modal('show');
});

$(document).on('click', '#js-btn-modal-delete-brand', function () {
    helper.deleteEntity($(this).attr('data-url'), tableBrands);
    $('#js-btn-modal-delete-brand').attr('data-url', null);
    $('#js-modal-delete-brand').modal('hide');
});

/**
 * Load Brand Image - with Cropper
 */
$(document).on('change', '#js-input-brand-image', function () {
    if (helper.cropper) {
        helper.cropper.destroy();
        $('#js-cropper-brand-image').remove();
        $('#js-cropper-brand-container').html('');
        $('.js-cropper-brand-height').css('height', 0);
    }

    $('.cropper-height').css('height', 'auto');
    if (this.files && this.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            $('<img />').attr({
                'id': 'js-cropper-brand-image',
                'class': 'cropper-img',
                'src': e.target.result,
            }).appendTo('#js-cropper-brand-container');
            helper.initCropper($('#js-cropper-brand-image')[0]);
        }
        reader.readAsDataURL(this.files[0]);
    }
});

$(document).on('click', '#js-cropper-brand-container', function () {
    if (helper.cropper) {
        let imgSrc = helper.cropper.getCroppedCanvas().toDataURL();
        $('#js-brand-image').val(imgSrc);
    }
});
