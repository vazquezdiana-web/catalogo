<!DOCTYPE html>
<html>
    <head>
      <title>AGREGAR</title>
      <link rel="stylesheet" type="text/css" href="estilo2.css">
    </head>
<body>
    <?php
      if(isset($_POST['guardar'])){
          $cveemp=$_POST['cveemp'];
          $rfcemp=$_POST['rfcemp'];
          $curpemp=$_POST['curpemp'];
          $nomemp=$_POST['nomemp'];
          $deptoemp=$_POST['deptoemp'];
          
          $numero=strval("0");
          $blanco="SIN VALOR";
          
          include("conexion.php");
        
          $sql="insert into empleados(cve_emp,rfc_emp,curp_emp,nom_emp,depto_emp) values('".$cveemp."','".$rfcemp."','".$curpemp."','".$nomemp."','".$deptoemp."')";
                   
          
          $resultado=mysqli_query($conexion,$sql);
          if ($resultado){
            
              
                   echo " <script language='JavaScript'>
                   alert('Los datos fueron ingresados correctamente en la BD');
                   location.assign('listaemp.php');
                   </script>";
                  
              
              
              
                }  
          else{
           echo ("Errorcode: " . mysqli_errno($conexion)); 
           echo ("Error: " . mysqli_error($conexion));      
           echo " <script language='JavaScript'>
                   alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
                   //location.assign('index2.php');
                   </script>"; 
         }
         mysqli_close($conexion);
        
          
             
       }else{
          
      
    ?>
    
   <h1>Introducci&oacute;n de datos de empleados</h1>
   <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        
        Clave de empleado: <input name="cveemp" type="text"> <br> <br>
        RFC: <input name="rfcemp" type="text"> <br> <br>
        Curp: <input name="curpemp" type="text"> <br> <br>
        Nombre completo: <input name="nomemp" type="text"> <br> <br>
        Departamento: <input name="deptoemp" type="text"> <br> <br>
               
        
        <input name="guardar" value="Guardar" type="submit"><br>
        <a href="listaemp.php">Regresar</a>  
    </form>
   <?php 
    }
    ?>
</body>
</html>