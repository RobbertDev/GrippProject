/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************!*\
  !*** ./resources/js/ajax.js ***!
  \******************************/
$(document).ready(function () {
  $('button#create-pet').click(function () {
    $.ajax({
      type: 'POST',
      url: '/pets',
      data: $('#create-pet-form').serializeArray(),
      success: function success(data) {
        $('#create-pet-form').trigger("reset");

        if (typeof data.msg !== 'undefined') {
          $("#error-message").html(data.msg);
        }

        if (typeof data.html !== 'undefined') {
          $('#overview-content').html(data.html);
        }
      }
    });
  });
  $('button.destroy-pet').click(function () {
    $.ajax({
      type: 'DELETE',
      url: '/pets/' + $(this).attr("pet-id"),
      data: {
        "_token": "{{ csrf_token() }}"
      },
      success: function success(data) {
        if (typeof data.html !== 'undefined') {
          $('#overview-content').html(data.html);
        }
      }
    });
  });
});
/******/ })()
;