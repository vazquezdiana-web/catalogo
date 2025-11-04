<style>

body {font-family: Arial, Helvetica, sans-serif;font-size: 24px}

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
  background-color: #4CAF50;
  color: white;
}

a:link, a:visited {
  background-color: blue;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  border-radius: 5px;
}

a:hover, a:active {
  background-color: lightblue;
  border-radius: 5px;
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
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>

<html>
    <head>
        <title>Lista de asignacion de materiales</title>
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
         $cveemp=$_GET['cve_emp'];
                     
         $sql="select * from asignaciones asigna INNER JOIN empleados emp ON asigna.cve_emp = emp.cve_emp where asigna.cve_emp= '".$cveemp."'";
         $resultado=mysqli_query($conexion,$sql);
         $filas2=mysqli_fetch_assoc($resultado);
        
        ?>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            
                
            <table>
                <tr>
                    <th colspan="5"><h1>Historial de Asignación de materiales</h1></th>
                </tr>
                            
                <tr>
                    <td>
                        <label>Clave del empleado:</label>
                        
                    </td>
                    <td>
                        <label>Nombre del empleado:</label>
                        
                    </td>
                                
                </tr>
                <tr>
                    <td><?php echo $filas2['cve_emp'] ?>   </td> 
   	  		        <td><?php echo $filas2['nom_emp'] ?>   </td>
                    <td>
                        <?php echo "<a href='asignamat.php?cveemp=".$filas2['cve_emp']."'>Asignar materiales</a>"; ?>
                    </td>
                      
                </tr> 
                            
            </table>
        
        </form>
      
        <table>
            
            <thead>
   	  	         <tr>
   	  		        <th>Fecha</th>
                    <th>Id Producto</th>
   	  		        <th>Descripción</th>
   	  		        <th>Cantidad</th>
   	  		       
   	  	         </tr>
            </thead>
            <tbody>
             <?php
                              
               $sql2="select * from asignaciones asigna INNER JOIN empleados emp ON asigna.cve_emp = emp.cve_emp where asigna.cve_emp= '".$cveemp."'";
               $resultado2=mysqli_query($conexion,$sql2);
               
               while($filas=mysqli_fetch_assoc($resultado2))
                {  
                                     
              ?> 
                   
                   <tr>
   	  		            <td><?php echo $filas['fecha_mov'] ?>   </td>
                        <td><?php echo $filas['id_pdto'] ?>   </td>
                        
                        <?php
                          $sql3="select * from inventario inven INNER JOIN asignaciones asigna ON inven.id_pdto = asigna.id_pdto where inven.id_pdto = '".$filas['id_pdto']."'";
                          $resultado3=mysqli_query($conexion,$sql3); 
                          $filas3=mysqli_fetch_assoc($resultado3);
                        ?>
                       
                        <td><?php echo $filas3['desc_pdto'] ?>   </td>
                        <td><?php echo $filas['cant_asig'] ?>   </td>
   	  		            
                   </tr> 
                   <?php
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