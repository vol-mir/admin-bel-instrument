import lang from '../json/dataTables.ru.lang.json';
import $ from "jquery";

$.extend(true, $.fn.dataTable.defaults, {
    processing: true,
    serverSide: true,
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    language: lang,
});

// Datepicket Code
$('#datepicker').datepicker();

//Initialize Select2 Elements
$('.select2').select2()

//Initialize Select2 Elements
$('.select2bs4').select2({
    theme: 'bootstrap4'
})

$(document).on('click', '.modal-delete-dialog', function () {
    $('#btn-modal-delete').attr('data-confirm-delete-id', $(this).attr('data-id'));
    $('#modal-delete').modal('show');
});

$(document).on('click', '.js-nav-tabs', function (e) {
    let selectedTabId = e.target.id;
    let tabs = $(this).attr('data-tabs')
    localStorage.setItem(tabs, selectedTabId);
});
