import $ from 'jquery';
import toastr from 'toastr';
import Lang from 'laravel-localization';
import Cropper from "cropperjs";

export function deleteEntity(url, table) {
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
}

/**
 * Cropper
 */
export let cropper = null;
export function initCropper(image) {
    cropper = new Cropper(image, {
        aspectRatio: 16 / 9,
        viewMode: 3,
        preview: '.cropper-preview'
    });
}

/**
 * Path images
 */
export let pathImageShops = '/storage/images/shops/';
