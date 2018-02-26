<?php
    session_start();
    if(isset($_COOKIE["maria"]))
        session_decode($_COOKIE["maria"]);
        
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
<head>
	<meta charset="UTF-8">
  <title>OYE! - 'Iteractúa con tu ciudad'</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="HTML5, CSS, MySQL, JavaScript, Bootstrap">
  <meta name="author" content="Juan Antonio Martín Palma">
  <meta name="description" content="OYE! 'Iteractúa con tu ciudad'" />

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Open+Sans:400,600,700,800|Quicksand:700|Yellowtail|Julius+Sans+One" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="icon" type="image/png" href="../img/favicon/favicon-16x16.png" sizes="16x16" />
  
  <link rel="stylesheet" href="../css/font-awesome.css">

  <link rel="stylesheet" type="text/css" href="../css/form/component.css" />
	<link rel="stylesheet" type="text/css" href="../css/index.css" />
  <link rel="stylesheet" type="text/css" href="../css/footer.css" />
  <style type="text/css" media="screen">
    
    body {overflow: hidden;}
    /*div.container-fluid{
      margin: 7.15% auto;
    }*/

    /*video {
      position: relative;
      margin: 0px auto;
      /*position: fixed;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -100;*/
      /*transform: translateX(-50%) translateY(-50%);
      background: url('//demosthenes.info/assets/images/polina.jpg') no-repeat;
      background-size: cover;
      transition: 1s opacity;
    }*/

    .vidContain {
        width:100%; 
        height:auto;
        position:relative;
        display:inline-block;
        margin-top: -40px;
        padding: 0px;

    }

    .vid {
        position: fixed; 
        top: 0;
        left:0;
        min-width: 100%;
        min-height: 100%;
        z-index: -100;
        transform: translateX(0%) translateY(0%);
        background-size: cover;
        transition: 1s opacity;
    }

    #pie{
      position: fixed;
    }

    .stopfade { 
       opacity: .5;
    }

    #polina { 
      font-family: Open Sans, sans-serif;
      font-weight: normal; 
      background: rgba(51,51,51,0.8);
      color: white;
      padding: 2.5rem;
      width: 33%;
      margin: 2rem;
      float: right;
      font-size: 18px;
    }

    h1 {
      font-family: Lato, sans-serif;
      font-size: 3rem;
      margin-top: 0;
      margin-bottom: 25px;
      letter-spacing: .3rem;
      text-align: center;
    }

    h1:after{
      display: block;
      position: relative;
      content:'';
      bottom: -10px;
      width: 7px;
      height: 7px;
      border-radius: 50%;
      left: 50%;
      -webkit-transform: translateX(-50%);
      transform: translateX(-50%);
      background: #fff;
      box-shadow: 30px 0 #fff, -30px 0 #fff;
    }

    span{
      font-family: Quicksand;
    }
    
    @media screen and (max-width: 500px) { 
      div{width:70%;} 
    }
    @media screen and (max-device-width: 800px) {
      html { background: url(https://thenewcode.com/assets/images/polina.jpg) #000 no-repeat center center fixed; }
      #bgvid { display: none; }
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="true" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="circle"> <a id="logo" href="../index.php">OYE!</a> </div>
      </div>
      <div id="navbar" class="navbar-collapse collapse in" aria-expanded="true" style="">
        <ul class="nav navbar-nav navbar-left">
          <li><p class="navbar-text">"Interactúa con tu ciudad"</p></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a class="md-trigger" data-modal="modal-12" href="registrarse.php">REGISTRARSE</a></li>
          <li><a class="md-trigger" data-modal="modal-13" href="inicia-sesion.php">INICIA SESIÓN</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </nav>
  <br class="clearfix">
  <div class="container-fluid vidContain">
    <video class="vid" poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted loop>
      <source src="../video/calle.mp4" type="video/mp4">
    </video>
    <div id="polina">
      <h1>Más sobre <span>OYE!</span></h1>
      <p><span>OYE!</span> intenta cubrir una pequeña necesidad por y para los ciudadanos de una localidad pequeña, mediana o grande</p>
      <p>Los ayuntamientos de las localidades buscan cada vez más que los ciudadanos se sientan partícipes de las decisiones y mejoras de su municipio. De esta forma, esta aplicación ayudará a los ayuntamientos aportándoles una herramienta de comunicación directa entre dicho ayuntamiento y sus ciudadanos.</p>
      <p>Funcionará de forma parecida a un buzón de quejas o peticiones de la comunidad al ayuntamiento de su localidad. Así como el seguimiento y control de estas para que lleguen a realizarse o al menos queden atendidas.</p>
      <p>Cuando un ciudadano vaya caminando por su localidad y descubra un desperfecto o cualquier cosa susceptible de mejora podrá, a través de la aplicación, hacérselo saber al ayuntamiento. El responsable de la aplicación podrá asignar el arreglo o mejora a uno de los departamentos del ayuntamiento. Será entonces, el departamento, el encargado de informar cuando dio arreglo o mejora se haya llevado a cabo.</p>
    </div> 
  </div>
  <br class="clearfix">
  <?php 
    include '../php/footer.php';
  ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>