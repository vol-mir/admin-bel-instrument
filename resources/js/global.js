import lang from '../json/dataTables.ru.lang.json';
import $ from "jquery";
import * as helper from "./helper";

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

/**
 * Tabs
 */
$(document).on('click', '.js-nav-tabs', function (e) {
    let selectedTabId = e.target.id;
    let tabs = $(this).attr('data-tabs')
    localStorage.setItem(tabs, selectedTabId);
});

if ($('#tabs-setting').length) {
    let tabSetting = localStorage.getItem('tabs-setting');
    if (tabSetting) {
        $('#' + tabSetting).tab('show');
    } else {
        $('#tabs-setting-general').tab('show');
    }
}

if ($('#tabs-shop').length) {
    let tabsShop = localStorage.getItem('tabs-shop');
    if (tabsShop) {
        $('#' + tabsShop).tab('show');
    } else {
        $('#tabs-shop-general').tab('show');
    }
}
