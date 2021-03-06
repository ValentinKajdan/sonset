<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
  <meta name="Content-type" content="text/html; charset=utf-8" type="equiv">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <meta name="author" content="Sonset">
  <meta name="description" content="Partage, découvre et regroupe tes sons préférés !">
	<title><?php echo $title; ?></title>
  <?php echo link_tag( $linkcss ); ?>
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="assets/js/home.js"></script>
</head>
<body>

  <header class="main_header">
		<div class="main_header__top">
	    <div class="main_header__top--logo">
	      SONSET
					<?php var_dump($username); ?>
	    </div>
	    <div class="main_header__top--right">
	      <ul class="">
	        <li><span class="open-popup" data-popup="login">Connexion</span></li>
	        <li><span class="open-popup" data-popup="signup">Inscription</span></li>
	      </ul>
	    </div>
		</div>
		<nav class="main_header__nav">
			<ul class="">
				<li><a href="<?php echo base_url(); ?>">Top</a></li>
				<li><a href="<?php echo base_url(); ?>">Recherche</a></li>
				<li><a href="<?php echo base_url(); ?>">Set</a></li>
			</ul>
		</nav>
	</header>
