<?php
require_once 'database.php';
//Check the ID and del from database
if(isset($_GET['deletar_foto'])){

  // select image from db to delete
  $stmt_select = $conn->prepare('SELECT img FROM fotos WHERE id =:uid');
  $stmt_select->execute(array(':uid'=>$_GET['deletar_foto']));
  $imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
  unlink("user_images/".$imgRow['img']);

  // it will delete an actual record from db
  $stmt_delete = $conn->prepare('DELETE FROM fotos WHERE id =:uid');
  $stmt_delete->bindParam(':uid',$_GET['deletar_foto']);
  $stmt_delete->execute();

  //redirect
  header("Location: index.php");
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
  <title>Galeria de Fotos Max Milhas - Wanderson Vieira</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">

  <link rel="stylesheet" type="text/css" media="screen" href="assets/css/main.css" />

  <script type="text/javascript" src="assets/scripts/jquery-3.0.0.min.js"></script>

</head>
<body>
  <!-- Top Nav Bar -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="/">Galeria de fotos</a>
      </div>
      <div>
        <ul class="nav navbar-nav">
          <li><a target="_blank" href="http://www.maxmilhas.com.br">Max Milhas</a></li>
          <li><a target="_blank" href="https://github.com/vieirawanderson">Meu GitHub</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /Nav Bar -->

  <div class="container">
    <div class="page-header">
      <h2 class="h2" align="center">Galeria de Fotos
        <a class="btn btn-primary btn-lg btn-block" href="adicionar.php"> 
        <span class="glyphicon glyphicon-plus">
        </span> Adicionar nova foto </a>
      </h2> 
    </div><br/>

    <!-- Populate the gallery -->
    <div class="row">
      <?php
      $count = 0;
      $arrayIds = array();
      $stmt = $conn->prepare('SELECT id, img, data FROM fotos ORDER BY id');
      $stmt->execute();

      //Get all database items
      if($stmt->rowCount() > 0){
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
          extract($row);
          array_push($arrayIds, $row['id']);
          $count = $count +1;

          echo ($stmt->rowCount());
          ?>
          <div class="fotoGrid">
            <div class="col-xs-4 text-center">
              <a href="#">
                <!-- Get data from Blob file and convert to image -->
                <?php echo '<img src="data:image/jpg;base64,'.base64_encode( $row['img'] ).'"
                class="img-rounded" 
                width="350px" height="350px"
                id='.$row['id'].'
                onclick="showDetail('.$row['id'].')"
                />';?>
              </a>

              <!-- Modal to show the picture -->
              <div id="myModal" class="modal">
                <span class="close">Fechar X</span>
                <img src="assets/img/seta-esquerda.jpg" class="seta-esquerda" onclick="previous()">
                <img src="assets/img/seta-direita.jpg" class="seta-direita" onclick="next()">
                <img class="modal-content" id="picture">
                <div id="caption"></div>
              </div>
              <!-- /Modal -->

              <p class="page-header">
                <span>
                  <a class="btn btn-danger" href="?deletar_foto=<?php echo $row['id']; ?>" title="Clique aqui para Deletar" onclick="return confirm('Tem Certeza que deseja excluir definitivamente essa foto?')">
                    <span class="glyphicon glyphicon-trash"></span></a>
                  </span>
                </p>

              </div>
            </div>       
            <?php
          }
        }
        else
        {
          ?>
          <!-- Gallery empty -->
          <div class="col-xs-12">
            <div class="alert alert-info">
              <span class="glyphicon glyphicon-bullhorn">
              </span> Galeria Vazia :(
            </div>
          </div>
          <?php
        }
        ?>
      </div>
      <!-- /Populate the gallery -->
    </div>
  </body>
  <script type="text/javascript" src="assets/scripts/modal.js"></script>
  </html>

