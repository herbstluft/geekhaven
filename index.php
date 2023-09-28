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












</body>
</html>