<!DOCTYPE html>
<html lang="en" class="h-100">
    <head>
        <title>AlbertV</title>
        <link rel="stylesheet" type="text/css" href="../css/Inici.css?v=<?php echo time(); ?>">
               
    </head>
    <body>
        <?php
                include './menu.php';      
        ?>      
            <h1>
                <img src="../files/sources/imatges/titol.gif" style=center width="20%" height="20%"></img>
            </h1>
        
        <div id = "myDIV1" class="container";>
            <div class="row">
                <div id ="myDIV2" class="container col-lg-6">
                    <div class="row">
                        <div id ="myDIV4" class="col-lg-10 ">
                            <h3>Anónim</h3>
                            
                            <?php
                                include './crear-avatar.php';
                            ?>
                            <p></p>
                        </div>
                        <!--
                        <div id ="myDIV4" class="col-lg-5">    
                            <h3>Registrat</h3>
                            </?php
                                include './crear-avatar.php';
                            ?>
                            <p>Apodo</p>
                        </div>
                        !-->
                        <div id = "myDIV5" class="container col-lg-10">
                            <div class="row">
                                <button onclick="window.location.href='./crearpartida.php';">
                                    <h2>Crear Partida</h2>
                                </button>
                            </div>
                        </div>  
                    </div>
                </div>
                
                <div class="col-lg-1"></div>
                <div id ="myDIV2" class="col-lg-4">
                    <div class="accordion accordion-flush" id="accordionExample">
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="headingOne">
                                <button  class="accordion-button card text-white bg-dark mb-3 btn-block " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h3 >Hall of Fame</h3>
                                </button>       
                            </h3>     
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                                 <iframe class ="iframe" src="./hallfame.php"></iframe>
                                
                        </div>
                    </div>
                    
                </div>
            </div>

            <div id = "myDIV3" >
                <div class="row">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button text-white bg-dark mb-3 btn-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h2>Instruccions</h2>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div>
                                <section>   
                                    <article>
                                        <p>
                                            !!!!!!!!!!!!!!!!!!!!!Juga al nostre Trivial!!!!!!!! SIIIIIIIIIIIIIII
                                            <br></br>
                                                Sabias que Alemania hasen cossas buenas?
                                            <br></br>
                                                Estaras diciendo WOW cada ves que uses este programa.
                                                Aprofita y JUEGA AHORA POR TAN SOLO diesinueve noventaicinco $  !!!!!!!!!!
                                                <br></br>
                                                Lore unde aut velit asperiores soluta quod repellendus quasi veritatis quae voluptatum atque, perferendis cumque quisquam assumenda cupiditate incidunt eligendi doloremque? 
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique doloribus perspiciatis facere amet nostrum fugit, ipsum nesciunt velit placeat quaerat sint vero tempore mollitia aliquid impedit numquam, modi voluptatum consequatur.
                                            </p>
                                    </article>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            include './peu_pagina.php';
        ?>
    </body>
    
</html>