<div id="container">

  <?php //var_dump($posts[0]); ?>

  <?php
    function dateDifference($date)
    {
        // Set timezone to France
        date_default_timezone_set('Europe/Paris');

        $dateObject = date_create($date);
        $now = date_create(date("Y-m-d H:i:s"));

        $interval = date_diff($dateObject, $now);

        if ($interval->i == 0 && $interval->h == 0 && $interval->d == 0 && $interval->m == 0 && $interval->y == 0) {
          $return = "à l'instant";
        } elseif ( $interval->h == 0 && $interval->d == 0 && $interval->m == 0 && $interval->y == 0) {
          $return = "il y a ".$interval->i." minutes";
        } elseif ($interval->d == 0 && $interval->m == 0 && $interval->y == 0) {
          $return = "il y a ".$interval->h." heures";
        } else {
          $return = "le ". date_format($dateObject, 'd/m/Y \à H\hi').".";
        }

        return $return;

    }
  ?>


  <?php foreach ($posts as $post) {
    $picLink = "https://i.ytimg.com/vi/".$post->refVideo."/hqdefault.jpg"?>

    <a href="<?php echo base_url(); ?>" class="card">
      <div class="card__pic" style="background-image: url('<?php echo $picLink; ?>');"></div>
      <div class="card__description">
        <div class="card__description--title">
          <?php echo $post->title; ?>
        </div>
        <div class="">
          Par <?php echo $post->name .' '. dateDifference($post->date); ?>
        </div>
      </div>
    </a href="<?php echo base_url(); ?>">

  <?php } ?>
</div>
