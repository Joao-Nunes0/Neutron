var table;
$( document ).ready(function() {
  $('#tableEquipC').DataTable();
  reloadValue();
});

/*      Script Tabela valores */
function reloadValue() {
  $.ajax({
    url: "../API/",
    method: "GET",
    data: {
      request: "equipC"
    }
  }).done(function (value) {
    var e = $("<div>");
    e.html(value);
    //console.log(e.html());

    var response = jQuery.parseJSON(e.html());

    if (response.success === false) {
      //console.log(e.html());
      $('#alerts').html('<div class="alert alert-danger alert-dismissible fade show" role="alert" style="height: 40px; text-align: center; padding:7px;"><strong>' + response.description + '</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close" style="padding: 8px 10px 0 0px;"><span aria-hidden="true">&times;</span></button></div>');

    } else {
      var data = response.data;

        for (var i = 0; i < data.length ; i++) {
          $("#tableEquipC").DataTable().row.add([
            data[i].name_client,
            data[i].brand,
            data[i].model,
            data[i].series,
            '<a href="?p=20&id_eqp=' + data[i].id +'"> <button type="button" class="btn btn-outline-success" name="button"><i class="bi bi-card-text"></i></button></a>'
          ]);
        }
        $("#tableEquipC").DataTable().draw(true);
    }
  });
}
