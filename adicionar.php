
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
  <title>Galeria de Fotos Max Milhas - Wanderson Vieira</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-theme.min.css">
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
  <!-- /Top Nav Bar -->

</head>
<body>
  <div class="container">

    <div class="page-header">
      <h1 class="h1">Adicionar Nova Foto </h1>
    </div>

    <!-- Adiciona Imagem -->
    <form action="salvar.php" method="POST" enctype="multipart/form-data">
      <h2><label  for="imagem">Imagem:</label></h2>
      <input type="file" name="imagem" accept="image/*"/>
      <br/>
      <button type="submit" name="btnsave" class="btn btn-success" value="Enviar">
        <span class="glyphicon glyphicon-save"></span> &nbsp; Enviar
      </button>        
      <a href="/" class="btn btn-warning">
        <span class="glyphicon glyphicon-step-backward"></span> 
        &nbsp; Voltar
      </a>
      </button>
    </form>
    <!-- /Adiciona Imagem -->


</div>
</body>
</html>