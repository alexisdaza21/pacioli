<!DOCTYPE html>
<html>
<head>
	<title>Editar trabajos</title>
<body>
<a href="index.php?c=clientes&a=trabajos&id=<?= $_GET["id"] ?>"><h4>Volver</h4></a>
<h2 align="center" >Actualizar trabajo</h2>

<form method="post">
<center>
                            <br>
                            <br>
                            <br>
                            <label >Fecha de inicio </label>
                            <input maxlength="45" type="text"  name="Trabajos[fechaInicio]" 
                            value="<?= $trabajos->fechaInicio ?>" required/>
                            <br>
                            <label >Tipo</label>
                            <input maxlength="45" type="text"  name="Trabajos[tipo]"   
                            value="<?= $trabajos->tipo ?>" required/>
                             <br>
                           <label >Trabajador</label>
                            <input maxlength="45" type="text"  name="Trabajos[id_trabajadores]"  
                            value="<?= $trabajos->id_trabajadores ?>" required/>
                            <br>
                             <label >Cliente</label>
                            <input maxlength="45" type="text"  name="Trabajos[id_clientes]" value="<?= $trabajos->id_clientes ?>" required/>
                              <br>
                        
                           
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </center>
                        </form>
                        <br><br><br>
 
      

</body>
</html>