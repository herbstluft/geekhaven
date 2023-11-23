<?php

ob_start();

$host=$_SERVER['SERVER_NAME'];
use MyApp\data\Database;
require(__DIR__ . '/../../../vendor/autoload.php');
$db = new Database;
//obtener el ID de la orden y del usuario
if ($_POST){
    $REPORTEQRY="SELECT productos.nom_producto,orden.fecha,  detalle_orden.id_orden,SUM(detalle_orden.cantidad) as 'cant', usuarios.telefono, CONCAT(personas.nombre, personas.apellido) AS 'nombre', personas.correo 
    from personas join usuarios on personas.id_persona=usuarios.id_persona 
    JOIN detalle_orden on usuarios.id_usuario = detalle_orden.id_usuario 
    JOIN productos on detalle_orden.id_producto = productos.id_producto
    JOIN categorias on productos.id_cat = categorias.id_cat
    join orden on orden.id_orden = detalle_orden.id_orden WHERE detalle_orden.estatus=1  GROUP by detalle_orden.id_orden";
    $REPORTE=$db->seleccionarDatos($REPORTEQRY);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

  </head>
  <body>
  <table class="table" id="tabla">
      <thead>
        
        <tr>
          <th scope="col">No° Orden</th>
          <th scope="col">Fecha y hora</th>
          <th scope="col">Telefono</th>
          <th scope="col">Mail</th>
          <th scope="col">Nombre</th>
          <th scope="col">Cantidad</th>
          
        </tr>
      </thead>
      <tbody>
      <?php
            foreach($REPORTE as $res){
                $id_orden= $res['id_orden'];
                $cantidad = $res['cant'];
                $tel=$res['telefono'];
                $nom_u=$res['nombre'];
                $correo= $res['correo'];
                $fecha=$res['fecha'];
                // establecer zona hoaria
                date_default_timezone_set("America/Mexico_City");

                    // asignar a una variable la fecha actual
                $fechaHoy= date("d");

                

            ?>
        <tr>
          <th scope="row" class=""><h5 align="center" class="text-danger"><?php echo $id_orden ?>&nbsp&nbsp&nbsp&nbsp</a></h5></th>
          <td><?php echo $fecha ?></td>
          <td><?php echo $tel ?></td>
          <td><?php echo $correo ?></td>
          <td><?php echo $nom_u ?></td>
          <td><?php echo $cantidad ?></td>
        </tr>
        <?php
            }
          ?>
      </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
// $html=ob_get_clean();
//  require_once '../dompdf/autoload.inc.php';

//  use Dompdf\Dompdf;
// $dompdf = new Dompdf();

// $options = $dompdf->getOptions();
// $options->set(array('isRemoteEnabled'=> true));
// $dompdf->setOptions($options);

// $dompdf->loadHtml($html);

// // formato carta
// $dompdf->setPaper('letter');
// // formato horizontal
// // $dompdf-setPaper('A4','Landscape');

// $dompdf->render();

// $dompdf->stream("ticket1.pdf",array("Attachment"=>true));

// $HOST=$_SERVER['SERVER_NAME'];
// header("refresh: 3; url=http://'.$HOST.'/geekhaven/");
}
?>