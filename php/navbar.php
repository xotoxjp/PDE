<nav class="navbar navbar-default" role="navigation">
<div class="container">
 
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./"><b>Inicio</b></a>
  </div>
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="./ver.php">Ordenes</a></li>
    </ul>
<form class="navbar-form navbar-left" role="search" action="./buscar.php">
      <div class="form-group">
        
<div>
	<select class="custom-select" name="sel1">
	<option selected>Seleccionar un filtro</option>
	<option>orden</option>
	<option>tipo</option>
	<option>modelo</option>
	<option>serie</option>
	<option>estado</option>
	<option>razon_social</option>
</select>
</div>
<input type="text" name="s" class="form-control" placeholder="Buscar">
   
</div>


	<!--<div class="form-group">
        <input type="text" name="s2" class="form-control" placeholder="Buscar">
      </div> -->
      <button type="submit" class="btn btn-default">&nbsp;<i class="glyphicon glyphicon-search"></i>&nbsp;</button>
    </form>
  </div>
</div>
</nav>