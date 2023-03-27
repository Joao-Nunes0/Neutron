var table;
$( document ).ready(function() {
  $('#tableClients').DataTable();
  reloadValue();
});

/*      Script Tabela Value */
function reloadValue() {
  $.ajax({
    url: "../API/",
    method: "GET",
    data: {
      request: "client"
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
          $("#tableClients").DataTable().row.add([
            data[i].id,
            data[i].name,
            data[i].nif,
            data[i].email,
            data[i].phone,
            data[i].address
          ]);
        }
        $("#tableClients").DataTable().draw(true);
    }
  });
}
