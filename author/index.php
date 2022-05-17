<?php
include 'functions.php';
// Your PHP code here.

// Home Page template below.
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Author | Home</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Bootstrap Icon -->
  		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />

  		<!-- Bootstrap CSS -->
  		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />

	</head>
	<body>
    <nav class="navtop">
    	<div>
    		<h1>Author</h1>
            <a href="index.php"><i class="fas fa-home"></i>Home</a>
    		<a href="read.php"><i class="fas fa-store"></i>Data</a>
    	</div>
    </nav>

	<!-- Hero Text -->
    <div class="container">
    	<div class="row">
       		<div class="col-12 col-lg-6 mt-lg-0 mt-5 ms-4">
         		<div class="hero-text">
           			<h1 class="fw-bold animate__animated animate__fadeInUp" style="font-size: 4rem">   <center> Ingin Mencari Buku?  <center>
           			<p class="mt-3 mb-5 animate__animated animate__fadeInUp" style="color: rgb(134, 134, 134); font-size: 1.2rem">
					   <center>
					   Author merupakan website untuk mencari buku dan data data terkait buku yang dicari. 
           			    <center>
						</p>
        			<a href="read.php" class="btn shadow-sm border-3 py-2 px-3 fw-bold text-white btn-orange animate__animated animate__fadeInUp">Manage</a>
       			</div>
      		</div>
     	</div>
    </div>
<!-- Akhir Hero Text -->


<?=template_footer()?>