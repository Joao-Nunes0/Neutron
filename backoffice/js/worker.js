var table;
$( document ).ready(function() {
  $('#tableWorker').DataTable();
  reloadValue();
});

/*      Script Tabela Value */
function reloadValue() {
  $.ajax({
    url: "../API/",
    method: "GET",
    data: {
      request: "worker"
    }
  }).done(function (Value) {
    var e = $("<div>");
    e.html(Value);
    //console.log(e.html());

    var response = jQuery.parseJSON(e.html());

    if (response.success === false) {
      //console.log(e.html());
      $('#alerts').html('<div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');

    } else {
      var data = response.data;

        for (var i = 0; i < data.length ; i++) {
          $("#tableWorker").DataTable().row.add([
            data[i].id,
            data[i].name,
            data[i].email,
            data[i].phone,
            '<a href="?p=7&id=' + data[i].id + '"> <button type="button" class="btn btn-outline-success" name="button"><i class="fas fa-pencil-alt"></i></button></a>',
            '<a href="?p=8&id=' + data[i].id + '"> <button type="button" class="btn btn-outline-danger" name="button"><i class="fas fa-eraser"></i></button></a>',
            '<a href="?p=24&id=' + data[i].id + '"> <button type="button" class="btn btn-outline-info" name="button"><i class="bi bi-arrow-clockwise"></i></button></a>'
          ]);
        }
        $("#tableWorker").DataTable().draw(true);
    }
  });
}

/*     Script Update Value      */

function editar() {
  $(".editavel input").each(function(){
    $(this).attr('readonly', !$(this).attr('readonly') );
  });
}
function autoRefresh() {
        window.location = window.location.href;
    }

$(document).ready(function(){

  $("#updatebuttonValue").click(function(e){
    var i = 0;
    var save = [];
    $('.form-check-input:checked').each(function () {
        save[i++] = $(this).val();
    });

    e.preventDefault();
    $.ajax({
      url: "../API/",
      method: "GET",
      data: {
        action: "order",
        execute: "updateWorker",
        id: $("#id").val(),
        name: $("#name").val(),
        email: $("#email").val(),
        role: JSON.stringify(save),
        phone: $("#phone").val()
      }
    }).done(function (Value) {
      var e = $("<div>");
      e.html(Value);
      //console.log(e.html());
      var response = jQuery.parseJSON(e.html());

      if (response.success === false) {
        //console.log(e.html());
        $('#alerts').html('<div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      } else {
        $('#alerts').html('<div class="alert alert-success alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
        window.location.href = "?p=6";

      }
    });
  });
});

/*     Script Delete Value      */
$(document).ready(function(){

  $("#deletebuttonValue").click(function(e){
    e.preventDefault();
    $.ajax({
      url: "../API/",
      method: "GET",
      data: {
        action: "order",
        execute: "deleteWorker",
        id: $("#id").val(),
      }
    }).done(function (Value) {
      var e = $("<div>");
      e.html(Value);
      //console.log(e.html());

      var response = jQuery.parseJSON(e.html());

      if (response.success === false) {
        //console.log(e.html());
        $('#alerts').html('<div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      } else {
        $('#alerts').html('<div class="alert alert-success alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
        window.location.href = "?p=6";
      }
    });
  });
});

$(document).ready(function(){

  $("#resetebuttonValue").click(function(e){
    e.preventDefault();
    $.ajax({
      url: "../API/",
      method: "GET",
      data: {
        action: "order",
        execute: "reseteWorker",
        id: $("#id").val(),
      }
    }).done(function (Value) {
      var e = $("<div>");
      e.html(Value);
      //console.log(e.html());

      var response = jQuery.parseJSON(e.html());

      if (response.success === false) {
        //console.log(e.html());
        $('#alerts').html('<div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
      } else {
        $('#alerts').html('<div class="alert alert-success alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');
        window.scrollTo({ top: 0, behavior: 'smooth' });
        window.location.href = "?p=6";
      }
    });
  });
});
