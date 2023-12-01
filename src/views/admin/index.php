<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    $db1 = new Database;
    
 
    //año actual
    $año_actual = date("Y");
    //mes actual
    $mes_actual = date("n");
    $mes_actual_nombre = date("M");

    //consulta de ingresos por el año, seleccionar ventas realizadas en el año actual y sumar todas las ventas
    $sql="SELECT
    YEAR(do.fecha_detalle) AS 'año',
    SUM(do.cantidad) AS 'cantidad',
    SUM(p.precio * do.cantidad) AS 'total'
    FROM
        orden o
    JOIN detalle_orden AS do ON o.id_orden = do.id_orden
    JOIN productos p ON do.id_producto = p.id_producto
    JOIN usuarios u ON do.id_usuario = u.id_usuario
    JOIN personas ON personas.id_persona = u.id_persona
    WHERE 
        do.estatus = 2
        AND YEAR(do.fecha_detalle) = $año_actual
    GROUP BY
        'año',
        YEAR(do.fecha_detalle) = $año_actual
    ORDER BY
        'año' DESC;";


  $ingreso_por_año=$db->seleccionarDatos($sql);
  foreach($ingreso_por_año as $ingreso_por_año)
  $total_ingresos_por_año=$ingreso_por_año['total'];



  //Ventas por el mes actual 

  $sql="SELECT 
  MONTH(fecha_detalle) AS mes,
  SUM(precio) AS total
FROM detalle_orden
JOIN productos ON detalle_orden.id_producto = productos.id_producto
WHERE detalle_orden.estatus = 2
  AND YEAR(fecha_detalle) = YEAR(CURDATE())
  AND MONTH(fecha_detalle) = MONTH(CURDATE())
GROUP BY mes;

";

      $ingreso_por_mes=$db->seleccionarDatos($sql);
      foreach($ingreso_por_mes as $ingreso_por_mes)
      $total_ingresos_por_mes=$ingreso_por_mes['total'];



      //ventas recientes

      $sql="SELECT
      personas.nombre as 'usuario', 
      personas.apellido as 'apellido',
      SUM(do.cantidad) AS 'cantidad',
      do.fecha_detalle as 'fecha',
      SUM(p.precio * do.cantidad) AS 'total'
  FROM
      orden o
  JOIN detalle_orden AS do ON o.id_orden = do.id_orden
  JOIN productos p ON do.id_producto = p.id_producto
  JOIN usuarios u ON do.id_usuario = u.id_usuario
  JOIN personas ON personas.id_persona = u.id_persona
  WHERE
      do.estatus = 2
  GROUP BY
      o.id_orden
  ORDER BY do.fecha_detalle DESC limit 5";

    $ventas_recientes=$db->seleccionarDatos($sql);


    //catergorias mas vendidas

    $sql="SELECT
    c.nom_cat AS 'categoria',
    t.tipo AS 'tipo',
    p.nom_producto AS 'producto',
    SUM(p.precio * do.cantidad) AS 'total'
FROM
    categorias c
JOIN productos p ON c.id_cat = p.id_cat
JOIN detalle_orden as do ON p.id_producto = do.id_producto
JOIN orden o ON do.id_orden = o.id_orden
JOIN tipo t ON p.tipo_id = t.id_tipo -- Asumiendo que hay un campo id_tipo en la tabla productos
WHERE
    do.estatus = 2
GROUP BY
    c.nom_cat
ORDER BY
    SUM(p.precio * do.cantidad) DESC limit 5;";

    $categorias_mas_vendidas=$db->seleccionarDatos($sql);
 

    //Productos mas vendidos

    $sql="SELECT D.id_producto, P.nom_producto AS nombre, P.precio as precio, SUM(D.cantidad) AS CantidadVendida
    FROM detalle_orden as D
    JOIN productos P ON D.id_producto = P.id_producto
    GROUP BY D.id_producto, P.nom_producto
    ORDER BY CantidadVendida DESC
    LIMIT 4;";

    $productos_mas_vendidos=$db->seleccionarDatos($sql);

    $sql_ventas_meses = "SELECT 
    MONTH(fecha_detalle) AS mes,
    SUM(precio) AS total_ventas
    FROM detalle_orden
    JOIN productos ON detalle_orden.id_producto = productos.id_producto
    WHERE detalle_orden.estatus = 2
    AND YEAR(fecha_detalle) = YEAR(CURDATE())
    GROUP BY mes
    ORDER BY mes;";

$ventas_meses = $db->seleccionarDatos($sql_ventas_meses);

// Datos para el gráfico
$labels = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

// Inicializar un array para almacenar los totales de ventas por mes
$datos_meses = array_fill_keys($labels, 0);

// Llenar el array con los totales de ventas correspondientes
foreach ($ventas_meses as $v_meses) {
    $mes = $labels[$v_meses['mes'] - 1]; // Resta 1 porque los meses en SQL son de 1 a 12
    $datos_meses[$mes] = $v_meses['total_ventas'];
}



?>


<!-- Agrega un script adicional para inicializar el gráfico -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Configuración de datos para el gráfico
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($labels) ?>,
        datasets: [{
            label: 'Total Ventas',
            data: <?= json_encode(array_values($datos_meses)) ?>,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    },
    options: {
        // Configuración adicional de la gráfica
    }
});

  });
</script>






<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panel de Control</title>
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
  <!-- Incluye Chart.js desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <link rel="stylesheet" href="assets/css/styles.min.css" />
</head>

<body>
  <?php include('html/navbar.php') ?>


      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
           <div class="card w-100">
  <div class="card-body">
    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
      <div class="mb-3 mb-sm-0">
        <h5 class="card-title fw-semibold">Resumen de ventas <?php echo   $año_actual = date("Y"); ?> </h5>
      </div>
    </div>
    
    <!-- Agrega el contenedor del gráfico aquí -->
    <center>
    <div>
      <canvas style="width:100%" id="myChart"></canvas>
    </div>
    </center>
  </div>
</div>

            </div>
        


          
          
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Ventas  &ensp; <b><?php echo $año_actual ?> </b></h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3"><?php echo '$' .' '. $total_ingresos_por_año?></h4>
                        <div class="d-flex align-items-center mb-3">
                        <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-success"></i>
                          </span>
                          <p class="fs-3 mb-0">Pesos</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-success rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">01/ <?php echo $año_actual ?> </span>
                          </div>
                          <div>
                            <span class="round-8 bg-success rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">12/<?php echo $año_actual ?></span>
                          </div>
                        </div>
                      </div>
                    
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <!-- Monthly Earnings -->
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold"> Ventas De <?php echo $mes_actual_nombre ?> </h5>
                        <h4 class="fw-semibold mb-3"><?php echo '$' .' '. $total_ingresos_por_mes ?></h4>
                        <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0"> Pesos </p>
                       
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-currency-dollar fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <div class="mb-4">
                  <h5 class="card-title fw-semibold">Ventas recientes</h5>
                </div>
                <ul class="timeline-widget mb-0 position-relative mb-n5">

                <?php
                foreach ($ventas_recientes as $ventas_recientes){

                  //Fecha
                  $fecha_hora=$ventas_recientes['fecha'];

                  

                
                  // Convierte la cadena de fecha y hora a un objeto DateTime
                  $date = new DateTime($fecha_hora);
                  // Formatea la fecha y hora en el estilo deseado
                  $hora_formateada = $date->format('H:i');


                 $fecha_formateada = $date->format('y/m/d');
                 
                  $fechaFormateada = date('d F Y', strtotime('20' . $fecha_formateada));
                   //Fecha

                   $usuario=$ventas_recientes['usuario'];
                   $apellido=$ventas_recientes['apellido'];
                   $total_de_la_compra=$ventas_recientes['total'];

                ?>

                  <li class="timeline-item d-flex position-relative overflow-hidden">
                    <div class="timeline-time text-dark flex-shrink-0 text-end"><?php echo $hora_formateada ?> </div>
                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                      <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                      <span class="timeline-badge-border d-block flex-shrink-0"></span>
                    </div>
                    <div class="timeline-desc fs-3 text-dark mt-n1">Venta realizada, <b><?php echo $usuario.' '.$apellido ?></b> de <?php echo '$' .' '. $total_de_la_compra; ?>
                      <p style="font-size:12px; color:green"> <?php echo $fechaFormateada ?> </p></div>
                  </li>

                  <?php
                }
                ?>                  
                </ul><br>
              </div>
            </div>
          </div>
          <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Categorias mas vendidas</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                       
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Categoria</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Tipo</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Producto</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Total</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      <?php
                      foreach($categorias_mas_vendidas as $categorias_mas_vendidas){
                      $categoria=$categorias_mas_vendidas['categoria'];
                      $tipo=$categorias_mas_vendidas['tipo'];
                      $producto=$categorias_mas_vendidas['producto'];
                      $total=$categorias_mas_vendidas['total'];
                      ?>
                        <td class="border-bottom-0">
                            <h6 class="fw-semibold mb-1"><?php echo $categoria ?> </h6>
                            <span class="fw-normal">GeekHaven</span>                          
                        </td>

                        <td class="border-bottom-0">
                          <p class="mb-0 fw-normal"><?php echo $tipo?></p>
                        </td>
                        <td class="border-bottom-0">
                          <div class="d-flex align-items-center gap-2">
                            <p class="mb-0 fw-normal"><?php echo $producto ?></p>
                          </div>
                        </td>
                        <td class="border-bottom-0">
                          <h6 class="fw-semibold mb-0 fs-4"><?php echo '$' .' '. $total; ?></h6>
                        </td>
                      </tr> 

                      <?php
                      }
                      ?>

                     
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <h3>Productos mas vendidos</h3><br>
        <div class="row">

        <?php
        foreach($productos_mas_vendidos as $productos_mas_vendidos){
                      $nombre=$productos_mas_vendidos['nombre'];
                      $precio=$productos_mas_vendidos['precio'];
                      $id_producto=$productos_mas_vendidos['id_producto'];
                      $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                      $sacarImg=$db1->seleccionarDatos($sacarImgQry);
          ?>

          <div class="col-sm-6 col-xl-3">
            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)">
                
                <?php 
                foreach($sacarImg as $img){
                $imgt = $img['nombre_imagen'];}
               
                if(!empty($imgt)){ ?>

<img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $imgt ?>" class="d-block w-100"  height="310px" alt="..."></a>

               <?php } else{ ?>

                <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" class="d-block w-100"  height="310px" alt="..."></a>

              <?php } ?>
                



                <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                    <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                  </svg>
                </a>                      
              </div>
              <div class="card-body pt-3 p-4">
                    <div style="width:100%;" >
                    <h6 class="fw-semibold fs-4 text-truncate"><?php echo $nombre ?> </h6>
                    </div>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' .' '. $precio; ?></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                    <!-- <li style="margin-left:2px; margin-right: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#FFD800" class="bi bi-star-fill" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>
                    </li>
                    <li style="margin-left:2px; margin-right: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#FFD800" class="bi bi-star-fill" viewBox="0 0 16 16">
                      <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                  </svg>
                  </li>
                  <li style="margin-left:2px; margin-right: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#FFD800" class="bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                </li>
                <li style="margin-left:2px; margin-right: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#FFD800" class="bi bi-star-fill" viewBox="0 0 16 16">
                  <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
              </svg>
              </li>
              <li style="margin-left:2px; margin-right: 2px;"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="#FFD800" class="bi bi-star-fill" viewBox="0 0 16 16">
                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
            </li> -->
                  </ul>
                </div>
              </div>
            </div>
          </div>


          <?php
                      }
                      ?>
          
  </div>
  <script src="assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/sidebarmenu.js"></script>
  <script src="assets/js/app.min.js"></script>
  <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="assets/js/dashboard.js"></script>
</body>

</html>