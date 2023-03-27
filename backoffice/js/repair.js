var table;
$( document ).ready(function() {
  $('#tableRepair').DataTable();
  reloadValue();
});

/*      Script Tabela Value */
function reloadValue() {
  $.ajax({
    url: "../API/",
    method: "GET",
    data: {
      request: "repair"
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
          $("#tableRepair").DataTable().row.add([
            data[i].brand,
            data[i].model,
            data[i].series,
            data[i].date,
            '<a href="?p=17&id_eqp=' + data[i].id_eqp + '"> <button type="button" class="btn btn-outline-success" name="button"><i class="fas fa-pencil-alt"></i></button></a>'
          ]);
        }
        $("#tableRepair").DataTable().draw(true);
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
    e.preventDefault();
    $.ajax({
      url: "../API/",
      method: "GET",
      data: {
        action: "order",
        execute: "insertRepair",
        id_eqp: $("#id_eqp").val(),
        id_wkr: $("#id_wkr").val(),
        obs: $("#obs").val(),
        price: $("#price").val(),
        duration: $("#duration").val()
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
        window.location.href = "?p=16";

      }
    });
  });
});
