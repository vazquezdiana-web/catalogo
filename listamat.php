<style>

body {font-family: Berlin Sans FB,bold,sans-serif;font-size: 24px}

table {
  border-collapse: collapse;
  width: 100%;
  font-size: 24px;
}

th,td {
  text-align: center;
  padding: 16px;
}

tr:nth-child(even){
  background-color: #f2f2f2
}

th {
  background-color: darkred;
  color: white;
}

a:link, a:visited {
  background-color: darkgoldenrod;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display:flow-root;
  border-radius: 50px;
}

a:hover, a:active {
  background-color: red;
  border-radius: 50px;
}

h1,h2,h3,h4 {
  text-align: center;
}

input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}


input[type=submit] {
  font: comic sans;
  width: 100%;
  background-color:chocolate;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:active {
  background-color: cadetblue;
}

</style>

<html>
    <head>
        <title>Inventario de materiales</title>
        <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estas seguro?, se eliminarán los datos');
        }
        </script>
        <link rel="stylesheet" type="text/css" href="estilos2.css">
        
    </head>
    <body>
        <?php
         include("conexion.php");
        ?>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <table>
                <tr>
                    <th colspan="5"><h1>Lista de materiales</h1></th>
                </tr>
                <tr>
                    <td>
                        <label>Identificador del material:</label>
                        <input type="text" name="idpdto">
                    </td>
                    <td>
                        <label>Descripción del material:</label>
                        <input type="text" name="descpdto">
                    </td>
                    <td>
                        <input type="submit" name="enviar" value="BUSCAR">
                    </td>
                    <td>
                        <a href="listamat.php">Mostrar todos los materiales</a>
                    </td>
                    <td>
                        <a href="inventario.php">Agrega materiales</a> 
                    </td>
                </tr>
            </table>
        
        </form>
        
        <table>
   	        <thead>
   	  	         <tr>
   	  		        <th>Identificador</th>
                    <th>Descripción</th>
   	  		        <th>Unidad</th>
   	  		        <th>Lote</th>
   	  		        <th>Cantidad</th>
   	  		        <th>Acciones</th>
   	  	         </tr>
   	        </thead>
            <tbody>
                <?php
                    if(isset($_POST['enviar'])){
                        $idpdto = $_POST['idpdto'];
                        $descpdto = $_POST['descpdto'];
                        if (empty($_POST['idpdto']) && empty($_POST['descpdto'])){
                            echo "<script language='Javascript'>
                                   alert('Ingresa el Id o la descripcion del material');
                                   location.assign('listamat.php');
                                   </script>";
                            
                        }
                        else
                        {
                            if(empty($_POST['descpdto'])){
                               $sql="select * from inventario where id_pdto= '".$idpdto."'"; 
                            }
                            if(empty($_POST['idpdto'])){
                               $sql="select * from inventario where desc_pdto like '%".$descpdto."%'";    
                            }
                            if(!empty($_POST['idpdto']) && !empty($_POST['descpdto'])){
                              $sql="select * from inventario where id_pdto= ".$idpdto." and desc_pdto like '%".$descpdto."%'";  
                            }
            
                            $resultado=mysqli_query($conexion,$sql);
                            while($filas=mysqli_fetch_assoc($resultado)){
                            ?>
                             <tr>
   	  		                    <td><?php echo $filas['id_pdto'] ?>   </td>
                                <td><?php echo $filas['desc_pdto'] ?>   </td>
   	  		                    <td><?php echo $filas['lote_pdto'] ?>  </td>
   	  		                    <td><?php echo $filas['unidad'] ?>   </td>
   	  		                    <td><?php echo $filas['cantidad'] ?> </td>
                                
                                 
                                 
   	  		                    <td>
   	  			                   <?php echo "<a href='editamat.php?id_pdto=".$filas['id_pdto']."'>EDITAR</a>"; ?>
   	  			                   -
   	  			                   <?php echo "<a href='eliminamat.php?id_pdto=".$filas['id_pdto']."'
                                    onclick='return confirmar()'>ELIMINAR</a>"; ?>
   	  		                    </td>
                            </tr>     
                 <?php
                            }
                    }
                    }
                    else{
                        $sql="select * from inventario";
                        $resultado=mysqli_query($conexion,$sql);
                        while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                            <tr>
   	  		                    <td><?php echo $filas['id_pdto'] ?>   </td>
                                <td><?php echo $filas['desc_pdto'] ?>   </td>
   	  		                    <td><?php echo $filas['lote_pdto'] ?>    </td>
   	  		                    <td><?php echo $filas['unidad'] ?> </td>
   	  		                    <td><?php echo $filas['cantidad'] ?> </td>
                                
                                
   	  		                    <td>
   	  			                   <?php echo "<a href='editamat.php?id_pdto=".$filas['id_pdto']."'>EDITAR</a>"; ?>
   	  			                   -
   	  			                   <?php echo "<a href='eliminamat.php?id_pdto=".$filas['id_pdto']."'
                                    onclick='return confirmar()'>ELIMINAR</a>"; ?>
   	  		                    </td>
                            </tr>    
                <?php
                        }
                    }
                 ?>

   	  	
            </tbody>
        </table>
        <br>
        <br>
        <p style="text-align: left">
        <a  href="index.php">Regresar</a>
            
    </body>
</html>