/**
 * Bootstrap Table Catalan (Catalonia/Spain) translation
 * Author: Roger Catrisse
 */
(function ($) {
    'use strict';

    $.extend($.fn.bootstrapTable.defaults, {
        formatLoadingMessage: function () {
            return 'Carregant, un moment si us plau...';
        },
        formatRecordsPerPage: function (pageNumber) {
            return pageNumber + ' registres per pàgina';
        },
        formatShowingRows: function (pageFrom, pageTo, totalRows) {
            return 'Mostrant ' + pageFrom + ' a ' + pageTo + ' de ' + totalRows + ' files';
        },
        formatSearch: function () {
            return 'Cercar';
        },
        formatNoMatches: function () {
            return 'No s´han trobat registres';
        }
    });
})(jQuery);