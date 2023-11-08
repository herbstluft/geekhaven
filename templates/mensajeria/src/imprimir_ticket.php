<?php
ob_start();
session_start();
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();


if(isset($_GET['id_publicacion']))
{
    //guardar el id de la publicacion
$id_publicacion=$_GET['id_publicacion'];
//hacer una consulta para saber todo de la publicacion y quien la publico
$sql="select id_pub, titulo, precio, descripcion, pub_trq.estado as 'estado_producto', estatus as 'estado_de_venta', usuarios.id_usuario, personas.nombre, personas.apellido from pub_trq INNER JOIN usuarios on usuarios.id_usuario=pub_trq.id_usuario inner join personas on personas.id_persona=usuarios.id_persona where id_pub=$id_publicacion and pub_trq.estatus=1";
$info_publicacion=$db->seleccionarDatos($sql);

//Datos de la publicacion
foreach($info_publicacion as $info_pub){
$publicacion_id=$info_pub['id_pub'];
$publicacion_nombre=$info_pub['nombre'];
$publicacion_precio=$info_pub['precio'];
$publicacion_descripcion=$info_pub['descripcion'];
$publicacion_estado_del_producto=$info_pub['estado_producto'];
$publicacion_estado_de_venta=$info_pub['estado_de_venta'];
$nombre_del_vendedor=$info_pub['nombre'].' '.$info_pub['apellido'];
$publicacion_id_usuario_vendedor=$info_pub['id_usuario'];
$publicacion_titulo=$info_pub['titulo'];
}

// echo $publicacion_id;
// echo $publicacion_nombre;
// echo $publicacion_precio;
// echo $publicacion_descripcion;
// echo $publicacion_estado_del_producto;
// echo $publicacion_estado_de_venta;
// echo $nombre_del_vendedor;
// echo $publicacion_id_usuario_vendedor;
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>TICKET</title>
  </head>
  <body class="">

  <div class="container">
    <h1 align="center">Ticket de venta</h1>

    <center>
        <ul>
            <li> Imprime este ticket que comprueba ya finalizó la negociación</li>
            <li>Luego acude a la tienda en la direccion: Calle Muñoz campos Col. La amistad 27054 Torreón, Coahuila Mexico</li>
            <li> Llegue a caja y enseñe su ticket de venta/negociacion</li>
            <li> El gerente en turno recibira su ticket y revisara el producto para evaluar su estado y confirmar que esta en el estado en el que se <strong>acordó la negociación</strong>
         </li>
            <li>Si el producto es apto para la venta se le pagará <strong>deacuerdo a lo acordado en la negociación</strong>, si no se declinará la negociación y se dara de baja en el sistema</li>
         </ul>
         <h4>Muchas gracias por hacer negocio con nosotros!</h4>
    </center>

    <table class="table table-striped">
  <thead>
    <tr class="">
    <th scope="col">No° de publicacion</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio acordado</th>
      <th scope="col">Estado</th>
      <th scope="col">Vendedor</th>
      
    </tr>
  </thead>
  <tbody>
    
    <tr>
      <th scope="row"><?php echo $id_publicacion; ?></th>
      <td><?php echo $publicacion_titulo ?></td>
      <td align="center"><?php echo $publicacion_precio ?></td>
      <td align="center"><?php echo $publicacion_estado_del_producto; ?></td>
      <td align="center"><?php echo $nombre_del_vendedor?></td>
    </tr>
  </tbody>
</table>
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
$html=ob_get_clean();
 require_once '../../../src/scripts/dompdf/autoload.inc.php';

 use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

// formato carta
$dompdf->setPaper('letter');
// formato horizontal
// $dompdf-setPaper('A4','Landscape');

$dompdf->render();

$dompdf->stream("ticket1.pdf",array("Attachment"=>true));

$HOST=$_SERVER['SERVER_NAME'];
header("refresh: 3; url=http://'.$HOST.'/geekhaven/");
?>
