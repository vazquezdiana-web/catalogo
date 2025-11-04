<?php
    include("conexion.php")

?>
<html>
    <head>
        <title>EDITAR</title> 
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
        
          $sql="update inventario desc_pdto = '".$descpdto."', lote_pdto = '".$lotepdto."', unidad = '".$unidad."', cantidad = '".$cantidad."', costo = '".$costo."' where id_pdto='".$idpdto."'";
                   
          
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
            
        }  
            else{
                                
                $idpdto=$_GET['id_pdto'];
                $sql="select * from inventario where id_pdto='".$idpdto."'";
                $resultado=mysqli_query($conexion,$sql);
                
                $fila2=mysqli_fetch_assoc($resultado);
                $idpdto=$fila2["id_pdto"];
                $descpdto=$fila2["desc_pdto"];
                $lotepdto=$fila2["lote_pdto"];
                $unidad=$fila2["unidad"];
                $cantidad=$fila2["cantidad"];
                $costo=$fila2["costo"];
                
                            
                mysqli_close($conexion);
                
                
            }
                                
          
       ?>
        <h1>Editar datos del material</h1>
        <label>Id del producto: </label> 
        <?php echo $idpdto ?><br>
        
        
         <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            
            <label>Descripcion del producto:</label>
            <input type="text" name="descpdto" value="<?php echo $descpdto; ?>"> <br>
            <label>Lote del producto:</label>
            <input type="text" name="lotepdto" value="<?php echo $lotepdto; ?>"> <br>
            <label>Unidad de presentación del material:</label>
            <input type="text" name="unidad" value="<?php echo $unidad; ?>"> <br>
            <label>Cantidad de material:</label>
            <input type="text" name="cantidad" value="<?php echo $cantidad; ?>"> <br>
            <label>Costo del material:</label>
            <input type="text" name="costo" value="<?php echo $costo; ?>"> <br>
            <input type="hidden" name="idpdto" value="<?php echo $idpdto; ?>">
            
            
            <input name="guardar" value="Actualizar" type="submit"><br>
            <a href="listamat.php">Regresar</a>
        
        </form>
        
         
    </body>
</html>