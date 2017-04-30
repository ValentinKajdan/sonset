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
</head>
<body>

  <header class="main_header">
    <div class="main_header--logo">
      SONSET
    </div>
    <nav class="main_header--nav">
      <ul class="">
        <li><a href="<?php echo base_url(); ?>">Connexion</a></li>
        <li><a href="<?php echo base_url(); ?>">Inscription</a></li>
        <li><a href="<?php echo base_url(); ?>">Set</a></li>
      </ul>
    </nav>
  </header>
