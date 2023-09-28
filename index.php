<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--Boostrap-->   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!--Boostrap--> 
<link rel="stylesheet" href="bootstrap/css/estilos.css">
</head>

<style>
#banner #outer {
    background: url(https://images4.alphacoders.com/132/1329595.jpeg) top center no-repeat;
    background-size: cover;
}
#banner #outer #hero {
    height: 900px;
}
#banner #outer #hero {
    width: 100%;
    background: rgba(59, 105, 2, 0.3);
    height: 500px;
    display: table;
}
#banner #outer #hero h2 {
    font-size: 3.5em;
    letter-spacing: 0.05em;
}
#banner #outer #hero h2 {
    padding: 0 15px;
    font-size: 2.5em;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
    letter-spacing: 0.03em;
    display: table-cell;
    vertical-align: middle;
    text-align: center;
}
</style>



<body>    
<div class="todo">

<?php include 'templates/navbar/navbar.html';?>

    <section id="banner">
        <div id="outer">
          <div id="hero">
            <h2 style="color: white;" >Un mundo de coleccionables te espera.</h2>
          </div>
        </div>
      </section>
          
</div>











<!-- Modal categorias menu -->
<div class="modal fade" id="opciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content">
      
      <div class="row">
        <div class="col-12 text-end" style="padding-top: 10px;" data-bs-dismiss="modal">
          <svg style="margin-right: 15px;" xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>
      </div>
     
    
      
    <div>
        <ul style="text-decoration: none; list-style: none; font-size: 30px; font-weight: 500;">
          <div class="row">
            <div class="col-10">
              <li>Store </li>
            </div>
            <div class="col-1 text-end">
              <svg style="opacity:0.4; margin-left: 0px;" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>Mac</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>
            
            <div class="col-10">
              <li>iPad</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>iPhone</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>Watch</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>Vision</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>AirPods</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>TV & Home</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>Entretenimiento</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>Accesorios</li>
            </div>
            <div class="col-1 text-end option">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10">
              <li>Soporte</li>
            </div>
            <div class="col-1 text-end">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>



          </div>
        </ul>
    </div>
    
    
    </div>
  </div>
</div>


</body>
</html>