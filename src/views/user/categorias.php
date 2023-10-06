<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database();


 $sql = "SELECT * from categorias";

 $categorias=$db->seleccionarDatos($sql);

 
?>

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
<link rel="stylesheet" href="../../../bootstrap/css/estilos.css">
</head>
<!--STYLE-->
    <style>
        .titulo{
            font-size: 60px !important;
        }
        #cartas{
            left: 30px;
        }

#o{
    left:100px
}
        .menos
        {
            
            border: none;
            font-size: 2em;
            background:none;
            margin-top: .3em;
            margin-left: 10px;  
        }
        .mas
        {            
            border: none;
            font-size: 2em;
            background: none;
            margin-top: .1em;
            margin-right:12px;  
        }
        .sombra{ -webkit-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
                -moz-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
                box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
        }

        h6 {
            width: 30%;
            font-size: 2em;
            margin-top: .4em;
            margin-left: 13px;
        }
        .btn-primary{
            margin-top: 15px;
            background-color: #3A40D6 !important;
            font-size:2em;
            algin: center;
            width: 100%;
            height: 100%;
            border-radius: 40px;
        }
        .btn-primary:hover{
            margin-top: 15px;
            background-color: #3A40D6 !important;
            font-size:2.1em;
            algin: center;
            width: 100%;
            height: 100%;
            border-radius: 40px;
        }
</style>


<body>
    <!----------------------------------------------------->
    <?php
include('../../../templates/navbar/navbar.php');
?>
    <!----------------------------------------------------->

     <!-------------------------BANNER---------------------------->
    <section id="banner">
              <div id="outer">
                <div id="hero">
                  <h2 style="color: white;" class="titulo">  <p style="-webkit-text-stroke: 3px black; "> Categorias.</p></h2>
                </div>
              </div>
    </section>
    <!------------------------------------------------------------->   
    <br>
    
    <div class="container">
  
        <div class="row">

            <div class="col-md-3">
            
             <!-- Aquí va tu filtro -->
             <br>
                <div class="col-12 row-13" id="filtro">
                    <h3>Filtro</h3>
                    <hr>
                    <input type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$"  id="input">
                    &nbsp; &nbsp; a &nbsp; &nbsp; 
                    <input type="text"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="$"  id="input">
                    <hr>
                </div>

                <fieldset>
                    <div>
                        <input type="checkbox" id="coding" name="interest" value="coding" checked />
                        <label for="coding">Music</label>
                    </div>
                    <div>
                        <input type="checkbox" id="music" name="interest" value="music" />
                        <label for="music">Music</label>
                    </div>

                    <div>
                        <input type="checkbox" id="music" name="interest" value="music" />
                        <label for="music">Music</label>
                    </div>
                    <div>
                        <input type="checkbox" id="music" name="interest" value="music" />
                        <label for="music">Music</label>
                    </div>
                    <div>
                        <input type="checkbox" id="music" name="interest" value="music" />
                        <label for="music">Music</label>
                    </div>
                    <div>
                        <input type="checkbox" id="music" name="interest" value="music" />
                        <label for="music">Music</label>
                    </div>  
                </fieldset>

            </div>
        

            <!-------->
            <div class="col-md-9">
            <!-- Aquí van las cartas -->
            <br><br><br>
            <div class="container" id="cartas">
                <section class="cards">
                    <!-- Aquí van tus cartas individuales, cada una en una row o div de col -->
                    <!-- Puedes copiar y pegar el código de cada carta aquí -->
                    <div class="row">
                        <div class="col-md-11 col-lg-8 col-xl-6" style="margin-bottom: 30px;">
                            <!-- Código de la primera carta -->
                            <article class="card card--1" style="margin-left: 40px;">
                            <div class="card__info-hover">
                              
                              <svg class="card__like"  viewBox="0 0 24 24">
                                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5
                                10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,
                                3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,
                                21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                              </svg>
                              
                              <div class="card__clock-info">
                                <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,
                                7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,
                                9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                                </svg><span class="card__time">15 min</span>
                              </div>
                            </div>
                            
                              <div class="card__img"> </div>
                                <a href="#" class="card_link">
                                  <div class="card__img--hover"></div>
                                </a>
                                  <div class="card__info">
                                    <span class="card__category"> Nintesjjhndo</span>
                                       <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                                          <div class="row">
                                            <div class="col-4 text-end">
                                              <span style="color:red; font-size:20px;"> $1,449.00 </span>
                                            </div>
                                            <div class="col-6" style="margin-left:16%" >
                                            <span ><button type="button" style=" border:none; border-radius:980px; background-color: #0071e3; 
                                            color: white; padding: 10px 25px; top:-5px; position:relative">Ver mas....</button></span>
                                            </div>
                                          </div>
                                    </div>
                            </article>
                        </div>  
                        
                        <!------------------>



                        <div class="col-md-11 col-lg-8 col-xl-6" style="margin-bottom: 30px;">
                            <!-- Código de la primera carta -->
                            <article class="card card--1" style="margin-left: 40px;">
                            <div class="card__info-hover">
                              
                              <svg class="card__like"  viewBox="0 0 24 24">
                                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5
                                10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,
                                3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,
                                21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                              </svg>
                              
                              <div class="card__clock-info">
                                <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,
                                7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,
                                9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                                </svg><span class="card__time">15 min</span>
                              </div>
                            </div>
                            
                              <div class="card__img"> </div>
                                <a href="#" class="card_link">
                                  <div class="card__img--hover"></div>
                                </a>
                                  <div class="card__info">
                                    <span class="card__category"> Nintesjjhndo</span>
                                       <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                                          <div class="row">
                                            <div class="col-4 text-end">
                                              <span style="color:red; font-size:20px;"> $1,449.00 </span>
                                            </div>
                                            <div class="col-6" style="margin-left:16%" >
                                            <span ><button type="button" style=" border:none; border-radius:980px; background-color: #0071e3; 
                                            color: white; padding: 10px 25px; top:-5px; position:relative">Ver mas....</button></span>
                                            </div>
                                          </div>
                                    </div>
                            </article>

                        </div>   

                           <!------------------>



                           <div class="col-md-11 col-lg-8 col-xl-6" style="margin-bottom: 30px;">
                            <!-- Código de la primera carta -->
                            <article class="card card--1" style="margin-left: 40px;">
                            <div class="card__info-hover">
                              
                              <svg class="card__like"  viewBox="0 0 24 24">
                                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5
                                10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,
                                3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,
                                21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                              </svg>
                              
                              <div class="card__clock-info">
                                <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,
                                7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,
                                9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                                </svg><span class="card__time">15 min</span>
                              </div>
                            </div>
                            
                              <div class="card__img"> </div>
                                <a href="#" class="card_link">
                                  <div class="card__img--hover"></div>
                                </a>
                                  <div class="card__info">
                                    <span class="card__category"> Nintesjjhndo</span>
                                       <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                                          <div class="row">
                                            <div class="col-4 text-end">
                                              <span style="color:red; font-size:20px;"> $1,449.00 </span>
                                            </div>
                                            <div class="col-6" style="margin-left:16%" >
                                            <span ><button type="button" style=" border:none; border-radius:980px; background-color: #0071e3; 
                                            color: white; padding: 10px 25px; top:-5px; position:relative">Ver mas....</button></span>
                                            </div>
                                          </div>
                                    </div>
                            </article>

                        </div>   

                           <!------------------>



                           <div class="col-md-11 col-lg-8 col-xl-6" style="margin-bottom: 30px;">
                            <!-- Código de la primera carta -->
                            <article class="card card--1" style="margin-left: 40px;">
                            <div class="card__info-hover">
                              
                              <svg class="card__like"  viewBox="0 0 24 24">
                                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5
                                10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,
                                3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,
                                21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                              </svg>
                              
                              <div class="card__clock-info">
                                <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,
                                7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,
                                9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                                </svg><span class="card__time">15 min</span>
                              </div>
                            </div>
                            
                              <div class="card__img"> </div>
                                <a href="#" class="card_link">
                                  <div class="card__img--hover"></div>
                                </a>
                                  <div class="card__info">
                                    <span class="card__category"> Nintesjjhndo</span>
                                       <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                                          <div class="row">
                                            <div class="col-4 text-end">
                                              <span style="color:red; font-size:20px;"> $1,449.00 </span>
                                            </div>
                                            <div class="col-6" style="margin-left:16%" >
                                            <span ><button type="button" style=" border:none; border-radius:980px; background-color: #0071e3; 
                                            color: white; padding: 10px 25px; top:-5px; position:relative">Ver mas....</button></span>
                                            </div>
                                          </div>
                                    </div>
                            </article>

                        </div>   

                           <!------------------>



                           <div class="col-md-11 col-lg-8 col-xl-6" style="margin-bottom: 30px;">
                            <!-- Código de la primera carta -->
                            <article class="card card--1" style="margin-left: 40px;">
                            <div class="card__info-hover">
                              
                              <svg class="card__like"  viewBox="0 0 24 24">
                                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5
                                10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,
                                3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,
                                21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                              </svg>
                              
                              <div class="card__clock-info">
                                <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,
                                7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,
                                9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                                </svg><span class="card__time">15 min</span>
                              </div>
                            </div>
                            
                              <div class="card__img"> </div>
                                <a href="#" class="card_link">
                                  <div class="card__img--hover"></div>
                                </a>
                                  <div class="card__info">
                                    <span class="card__category"> Nintesjjhndo</span>
                                       <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                                          <div class="row">
                                            <div class="col-4 text-end">
                                              <span style="color:red; font-size:20px;"> $1,449.00 </span>
                                            </div>
                                            <div class="col-6" style="margin-left:16%" >
                                            <span ><button type="button" style=" border:none; border-radius:980px; background-color: #0071e3; 
                                            color: white; padding: 10px 25px; top:-5px; position:relative">Ver mas....</button></span>
                                            </div>
                                          </div>
                                    </div>
                            </article>

                        </div>   


                           <!------------------>



                           <div class="col-md-11 col-lg-8 col-xl-6" style="margin-bottom: 30px;">
                            <!-- Código de la primera carta -->
                            <article class="card card--1" style="margin-left: 40px;">
                            <div class="card__info-hover">
                              
                              <svg class="card__like"  viewBox="0 0 24 24">
                                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5
                                10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,
                                3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,
                                21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z" />
                              </svg>
                              
                              <div class="card__clock-info">
                                <svg class="card__clock"  viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,
                                7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,
                                9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z" />
                                </svg><span class="card__time">15 min</span>
                              </div>
                            </div>
                            
                              <div class="card__img"> </div>
                                <a href="#" class="card_link">
                                  <div class="card__img--hover"></div>
                                </a>
                                  <div class="card__info">
                                    <span class="card__category"> Nintesjjhndo</span>
                                       <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                                          <div class="row">
                                            <div class="col-4 text-end">
                                              <span class="d-block d-sm-none" style="color:red; font-size:40px;"> $1,449.00 </span>
                                              <span class="d-none d-sm-block" style="color:red; font-size:90px;"> $1,449.00 </span>
                                            </div>
                                            <div class="col-6" style="margin-left:16%" >
                                            <span ><button type="button" style=" border:none; border-radius:980px; background-color: #0071e3; 
                                            color: white; padding: 10px 25px; top:-5px; position:relative">Ver mas....</button></span>
                                            </div>
                                          </div>
                                    </div>
                            </article>

                        </div>   
        </div>
    </div>
    </div>
    </div>
    </div>
    <br>
    <br>
        <center>
        <!--BOTON DE SIGUIENTE-->
        <div class="contador sombra">
                            <button class="menos" id="menos"><</button>
                            <h6>1</h6>
                            <button class="mas" id="mas">></button>
                        </div>
        </center>
                    
        <!--------------------------->
<br>
<br>

<!--Banner Recien llegados-->

<hr>

<div class="container">
<?php include '../../../templates/footer.html';?>
</div>
<script src="../../../bootstrap/js/buscador.js"></script>


</body>
</html>