/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/main.js":
/***/ (function(module, exports) {

/**
 * JS File Name: main.js
 * Version: 1.0
 * Author: GoCoS
 * Author URI: http://www.gocos.be/
 **/

$(document).ready(function () {
    console.log("main.js ready!");
});

/************
 * AJAX SETUP
 ************/

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/************
 * HANDLERS
 ************/

//Add inschrijving

$('#div_tbl_inschrijvingen').on("click", "#add_inschrijving", function (e) {
    e.preventDefault();
    console.log('add inschrijving geklikt');

    data = {
        naam: $('#naam').val(),
        voornaam: $('#voornaam').val(),
        email: $('#email').val(),
        voucher: $('#voucher').val()
    };

    $.ajax({
        method: "POST",
        url: "/add-inschrijving",
        data: data,
        success: function success(result) {
            if ($('#email-administratief').val() == '') {
                $('#email-administratief').val($('#email').val());
            }
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Edit inschrijving

$('#div_tbl_inschrijvingen').on("click", "#edit_inschrijving", function (e) {
    e.preventDefault();
    console.log('edit inschrijving geklikt');

    data = {
        referentie: $(this).data("referentie")
    };

    $.ajax({
        method: "POST",
        url: "/edit-inschrijving",
        data: data,
        success: function success(result) {
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Update inschrijving

$('#div_tbl_inschrijvingen').on("click", "#update_inschrijving", function (e) {
    e.preventDefault();
    console.log('update inschrijving geklikt');

    data = {};
    data = {
        referentie: $(this).data("referentie"),
        naam: $('#edit_naam').val(),
        voornaam: $('#edit_voornaam').val(),
        email: $('#edit_email').val(),
        voucher: $('#edit_voucher').val()
    };

    $.ajax({
        method: "POST",
        url: "/update-inschrijving-front",
        data: data,
        success: function success(result) {
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Remove inschrijving

$('#div_tbl_inschrijvingen').on("click", "#remove_inschrijving", function (e) {
    e.preventDefault();
    console.log('remove inschrijving geklikt');

    data = {
        referentie: $(this).data("referentie")
    };

    $.ajax({
        method: "POST",
        url: "/remove-inschrijving",
        data: data,
        success: function success(result) {
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Add teamlid

$('#div_tbl_teamleden').on("click", "#add_teamlid", function (e) {
    e.preventDefault();
    console.log('add teamlid geklikt');

    data = {
        referentienr: $('#referentienr').val(),
        teamid: $(this).data("teamid")
    };

    $.ajax({
        method: "POST",
        url: "/add-teamlid",
        data: data,
        success: function success(result) {
            $('#div_tbl_teamleden').html(result);
        }
    });
});

//Remove teamlid

$('#div_tbl_teamleden').on("click", "#remove_teamlid", function (e) {
    e.preventDefault();
    console.log('remove teamlid geklikt');

    data = {
        referentienr: $(this).data("referentienr"),
        teamid: $(this).data("teamid")
    };

    $.ajax({
        method: "POST",
        url: "/remove-teamlid",
        data: data,
        success: function success(result) {
            $('#div_tbl_teamleden').html(result);
        }
    });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/main.scss":
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__("./resources/js/main.js");
__webpack_require__("./resources/sass/app.scss");
module.exports = __webpack_require__("./resources/sass/main.scss");


/***/ })

/******/ });