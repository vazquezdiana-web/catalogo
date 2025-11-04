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
          $cveemp=$_POST['cveemp'];
          $rfcemp=$_POST['rfcemp'];
          $curpemp=$_POST['curpemp'];
          $nomemp=$_POST['nomemp'];
          $deptoemp=$_POST['deptoemp'];
          
          $numero=strval("0");
          $blanco="SIN VALOR";
          
          include("conexion.php");
        
          $sql="update empleados set curp_emp = '".$curpemp."', nom_emp = '".$nomemp."', depto_emp = '".$deptoemp."' where cve_emp='".$cveemp."'";
                   
          
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
                //* 
                
                $cveemp=$_GET['cve_emp'];
                $sql="select * from empleados where cve_emp='".$cveemp."'";
                $resultado=mysqli_query($conexion,$sql);
                
                $fila=mysqli_fetch_assoc($resultado);
                $cveemp=$fila["cve_emp"];
                $rfcemp=$fila["rfc_emp"];
                $curpemp=$fila["curp_emp"];
                $nomemp=$fila["nom_emp"];
                $deptoemp=$fila["depto_emp"];
                    
                
                mysqli_close($conexion);
                
                
            }
                                
          
       ?>
        <h1>Editar datos del empleado</h1>
        <label>Clave de empleado: </label>
        <?php echo $cveemp ?><br>
        <label>RFC del empleado: </label>
        <?php echo $rfcemp ?><br>
        
        
         <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            
            <label>Curp del empleado:</label>
            <input type="text" name="curpemp" value="<?php echo $curpemp; ?>"> <br>
            <label>Nombre del empleado:</label>
            <input type="text" name="nomemp" value="<?php echo $nomemp; ?>"> <br>
            <label>Departamento del empleado:</label>
            <input type="text" name="deptoemp" value="<?php echo $deptoemp; ?>"> <br>
            <input type="hidden" name="cveemp" value="<?php echo $cveemp; ?>">
            <input type="hidden" name="rfcemp" value="<?php echo $rfcemp; ?>"> 
           
            
            <input name="guardar" value="Actualizar" type="submit"><br>
            <a href="listaemp.php">Regresar</a>
        
        </form>
        
         
    </body>
</html>