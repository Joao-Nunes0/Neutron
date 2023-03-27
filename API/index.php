<?php
const ACTIONS = "resources/actions/";
const CLASSES = "resources/classes/";
const REQUESTS = "resources/requests/";

session_start();
$_SESSION["control"] = true;
foreach($_POST as $key => $value){
    $_GET[$key] = $value;
}
if (!empty($_GET)) {

/*foreach ($_GET as $key => $value) {
  //echo $key." + ".$value." - <br>";
}*/



  require_once CLASSES . 'Message.php';
  require_once '../backoffice/bd/bdconnect.php';

  if(isset($_GET["request"])){
    if (file_exists(REQUESTS . $_GET["request"] . ".php")) { //Verificar se o ficheiro existe, se existir insere.
      include(REQUESTS . $_GET["request"] . ".php");
    } else {
      echo (new Message(false, null))->setDescription("Não foi possível processar o seu pedido.")->encode();
    }
  } else if (isset($_GET["action"])){

    // Parâmetro type para especificar a ação.
    if(isset($_GET["execute"])){
      if (file_exists(ACTIONS . $_GET["action"] . ".php")) {
        include(ACTIONS . $_GET["action"] . ".php");
      } else {
        echo (new Message(false, null))->setDescription("Não foi possível processar o seu pedido.")->encode();
      }
    } else {
      echo (new Message(false, null))->setDescription("Campo execute não específicado")->encode();
    }
  } else {
    echo (new Message(false, null))->setDescription("É necessário específicar o tipo do seu pedido")->encode();
  }

}else{ ?>


  <?php
} unset($_SESSION["control"]);

?>
