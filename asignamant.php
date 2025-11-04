<!DOCTYPE html>
<html>
    <head>
      <title>Salida de almacen</title>
      <link rel="stylesheet" type="text/css" href="estilos2.css">
    </head>
<body>
    <?php
      if(isset($_POST['guardar'])){
          $fechamov=$_POST['fechamov'];
          $idpdto=$_POST['idpdto'];
          $cantasig=$_POST['cantasig'];
                    
          $numero=strval("0");
          $blanco="SIN VALOR";
          
          include("conexion.php");
        
          $sql="insert into asignaciones(fecha_mov,cve_emp,id_pdto,cant_asig) values('".$fechamov."','".$cveemp2."','".$idpdto."','".$cantasig."')";
                
          $resultado=mysqli_query($conexion,$sql);
          if ($resultado){
            
              //$sql2="insert into asignaciones(fecha_mov,cve_emp,id_pdto,cant_asig) values('".$fechamov."','".$cveemp."','".$idpdto."','".$cantasig."')";
              
              $resultado2=mysqli_query($conexion,$sql2);
              if ($resultado2){
                   echo " <script language='JavaScript'>
                   alert('Los datos fueron ingresados correctamente en la BD');
                   //location.assign('index2.php');
                   </script>";
                  
              }
              else{
                   echo ("Errorcode: " . mysqli_errno($conexion)); 
                   echo ("Error: " . mysqli_error($conexion)); 
                   echo " <script language='JavaScript'>
                   alert('ERROR: Los datos NO fueron ingresados correctamente en el Registro de Control Vehicular');
                   //location.assign('index2.php');
                   </script>";       
              }
              
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
    
   <h1>Introducci&oacute;n de datos</h1>
   <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        <?php
         $cveemp2=$_GET['cveemp'];
        ?>  
        Fecha de asignacion: <input name="fechamov" type="text"> <br> <br>
        Id del producto: <input name="idpdto" type="text"> <br> <br>
        Cantidad asignada: <input name="cantasig" type="text"> <br> <br>
        
        
        <input name="guardar" value="Guardar" type="submit"><br>
        <a href="listaemp2.php">Regresar</a>  
    </form>
   <?php 
    }
    ?>
</body>
</html>