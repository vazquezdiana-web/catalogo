<html>
    <head>
      <title>AGREGAR</title>
      <link rel="stylesheet" type="text/css" href="estilo2.css">
    </head>
<body>
    <?php
      if(isset($_POST['guardar'])){
          $idpdto=$_POST['idpdto'];
          $descpdto=$_POST['descpdto'];
          $lotepdto=$_POST['lotepdto'];
          $unidad=$_POST['unidad'];
          $cantidad=$_POST['cantidad'];
          $costo=$_POST['costo'];
          $fechamov=$_POST['fechamov'];

          $numero=strval("0");
          $blanco="SIN VALOR";
          
          include("conexion.php");
        
          $sql="insert into inventario(id_pdto,desc_pdto,lote_pdto,unidad,cantidad,costo,fecha_mov) values('".$idpdto."','".$descpdto."','".$lotepdto."','".$unidad."','".$cantidad."','".$costo."',
          '".$fechamov."')";
                   
          
          $resultado=mysqli_query($conexion,$sql);
          if ($resultado){
            
              
                   echo " <script language='JavaScript'>
                   alert('Los datos fueron ingresados correctamente en la BD');
                   location.assign('listamat.php');
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
    
   <h1>Introducci&oacute;n de datos de materiales</h1>
   <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
        
        Identificador de producto: <input name="idpdto" type="text"> <br> <br>
        Descripción del material: <input name="descpdto" type="text"> <br> <br>
        Lote del material: <input name="lotepdto" type="text"> <br> <br>
        Tipo de unidad (pza, mts, caja): <input name="unidad" type="text"> <br> <br>
        Cantidad a ingresar: <input name="cantidad" type="text"> <br> <br>
        Costo por unidad: <input name="costo" type="text"> <br> <br>
        Fecha de actualización: <input name="fechamov" type="text"> <br> <br>

               
        
        <input name="guardar" value="Guardar" type="submit"><br>
        <a href="istamat.php">Regresar</a>  
    </form>
   <?php 
    }
    ?>
</body>
</html>