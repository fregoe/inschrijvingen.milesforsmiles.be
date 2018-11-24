/**
 * JS File Name: main.js
 * Version: 1.0
 * Author: GoCoS
 * Author URI: http://www.gocos.be/
 **/

$(document).ready(function(){
    console.log( "main.js ready!" );
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

$('#div_tbl_inschrijvingen').on("click","#add_inschrijving", function (e) {
    e.preventDefault();
    console.log('add inschrijving geklikt');

    data = {
        naam :      $('#naam').val(),
        voornaam :  $('#voornaam').val(),
        email :     $('#email').val(),
        voucher :   $('#voucher').val()
    }

    $.ajax({
        method: "POST",
        url: "/add-inschrijving",
        data: data,
        success: function(result){
            if($('#email-administratief').val() == '') {
                $('#email-administratief').val($('#email').val());
            }
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Edit inschrijving

$('#div_tbl_inschrijvingen').on("click","#edit_inschrijving", function (e) {
    e.preventDefault();
    console.log('edit inschrijving geklikt');

    data = {
        referentie :      $(this).data("referentie"),
    }

    $.ajax({
        method: "POST",
        url: "/edit-inschrijving",
        data: data,
        success: function(result){
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Update inschrijving

$('#div_tbl_inschrijvingen').on("click","#update_inschrijving", function (e) {
    e.preventDefault();
    console.log('update inschrijving geklikt');

    data = {

    }
    data = {
        referentie :    $(this).data("referentie"),
        naam :          $('#edit_naam').val(),
        voornaam :      $('#edit_voornaam').val(),
        email :         $('#edit_email').val(),
        voucher :       $('#edit_voucher').val()
    }

    $.ajax({
        method: "POST",
        url: "/update-inschrijving-front",
        data: data,
        success: function(result){
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Remove inschrijving

$('#div_tbl_inschrijvingen').on("click","#remove_inschrijving", function (e) {
    e.preventDefault();
    console.log('remove inschrijving geklikt');

    data = {
        referentie :      $(this).data("referentie"),
    }

    $.ajax({
        method: "POST",
        url: "/remove-inschrijving",
        data: data,
        success: function(result){
            $('#div_tbl_inschrijvingen').html(result);
        }
    });
});

//Add teamlid

$('#div_tbl_teamleden').on("click","#add_teamlid", function (e) {
    e.preventDefault();
    console.log('add teamlid geklikt');

    data = {
        referentienr :  $('#referentienr').val(),
        teamid :        $(this).data("teamid"),
    }

    $.ajax({
        method: "POST",
        url: "/add-teamlid",
        data: data,
        success: function(result){
            $('#div_tbl_teamleden').html(result);
        }
    });
});

//Remove teamlid

$('#div_tbl_teamleden').on("click","#remove_teamlid", function (e) {
    e.preventDefault();
    console.log('remove teamlid geklikt');

    data = {
        referentienr :  $(this).data("referentienr"),
        teamid :        $(this).data("teamid"),
    }

    $.ajax({
        method: "POST",
        url: "/remove-teamlid",
        data: data,
        success: function(result){
            $('#div_tbl_teamleden').html(result);
        }
    });
});
