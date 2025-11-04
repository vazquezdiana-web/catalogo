<style>

bbody {font-family: Berlin Sans FB,bold,sans-serif;font-size: 24px}

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
        <title>Asinación de materiales</title>
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
                    <th colspan="5"><h1>Catálogo de empleados 2</h1></th>
                </tr>
                <tr>
                    <td>
                        <label>Clave de empleado:</label>
                        <input type="text" name="cveemp">
                    </td>
                    <td>
                        <label>RFC de empleado:</label>
                        <input type="text" name="rfcemp">
                    </td>
                    <td>
                        <input type="submit" name="enviar" value="BUSCAR">
                    </td>
                    <td>
                        <a href="listaemp2.php">Mostrar todos los empleados</a>
                    </td>
                   
                </tr>
            </table>
        
        </form>
        <table>
   	        <thead>
   	  	         <tr>
   	  		        <th>Clave empleado</th>
                    <th>RFC</th>
   	  		        <th>CURP</th>
   	  		        <th>Nombre</th>
   	  		        <th>Departamento</th>
   	  		        <th>Acciones</th>
   	  	         </tr>
   	        </thead>
            <tbody>
                <?php
                    if(isset($_POST['enviar'])){
                        $cveemp = $_POST['cveemp'];
                        $RFCemp = $_POST['rfcemp'];
                        if (empty($_POST['cveemp']) && empty($_POST['rfcemp'])){
                            echo "<script language='Javascript'>
                                   alert('Ingresa la clave o el rfc');
                                   location.assign('listaemp.php');
                                   </script>";
                            
                        }
                        else
                        {
                            if(empty($_POST['rfcemp'])){
                               $sql="select * from empleados where cve_emp= ".$cveemp; 
                            }
                            if(empty($_POST['cveemp'])){
                               $sql="select * from empleados where rfc_emp like '%".$RFCemp."%'";    
                            }
                            if(!empty($_POST['cveemp']) && !empty($_POST['rfcemp'])){
                              $sql="select * from empleados where cve_emp= ".$cveemp." and rfc_emp like '%".$RFCemp."%'";  
                            }
            
                            $resultado=mysqli_query($conexion,$sql);
                            while($filas=mysqli_fetch_assoc($resultado)){
                            ?>
                             <tr>
   	  		                    <td><?php echo $filas['cve_emp'] ?>   </td>
                                <td><?php echo $filas['rfc_emp'] ?>   </td>
   	  		                    <td><?php echo $filas['curp_emp'] ?>  </td>
   	  		                    <td><?php echo $filas['nom_emp'] ?>   </td>
   	  		                    <td><?php echo $filas['depto_emp'] ?> </td>
   	  		                    <td>
   	  			                   <?php echo "<a href='listasigna.php?cve_emp=".$filas['cve_emp']."'>Historial de asignaciones</a>"; ?>
   	  			                   
   	  		                    </td>
                            </tr>     
                 <?php
                            }
                    }
                    }
                    else{
                        $sql="select * from empleados";
                        $resultado=mysqli_query($conexion,$sql);
                        while($filas=mysqli_fetch_assoc($resultado)){
                ?>
                            <tr>
   	  		                    <td><?php echo $filas['cve_emp'] ?>   </td>
                                <td><?php echo $filas['rfc_emp'] ?>   </td>
   	  		                    <td><?php echo $filas['curp_emp'] ?>    </td>
   	  		                    <td><?php echo $filas['nom_emp'] ?> </td>
   	  		                    <td><?php echo $filas['depto_emp'] ?> </td>
   	  		                    <td>
   	  			                   <?php echo "<a href='listasigna.php?cve_emp=".$filas['cve_emp']."'>Historial de asignaciones</a>"; ?>
   	  			                   
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