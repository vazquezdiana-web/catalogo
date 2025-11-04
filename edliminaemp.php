<?php
    $cveemp=$_GET['cve_emp'];
    include("conexion.php");

    $sql="delete from empleados where cve_emp='".$cveemp."'";
    $resultado=mysqli_query($conexion,$sql);
    
    if ($resultado){
           
               echo " <script language='JavaScript'>
                   alert('Los datos fueron ELIMINADOS correctamente de la BD');
                   location.assign('listaemp.php');
                   </script>";
           }
             
        else{
           echo " <script language='JavaScript'>
                   alert('ERROR: Los datos NO fueron ELIMINADOS de la BD');
                   location.assign('listaemp.php');
                   </script>"; 
        }
          


?>