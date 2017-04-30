<div id="container">

  <?php //var_dump($posts[0]); ?>


  <?php foreach ($posts as $post) {
    $picLink = "https://i.ytimg.com/vi/".$post->refVideo."/hqdefault.jpg"?>

    <div class="card">
      <div class="card__pic" style="background-image: url('<?php echo $picLink; ?>');"></div>
      <div class="card__description">
        <div class="card__description--title">
          <?php echo $post->title; ?>
        </div>
        <div class="">
          Par <?php echo $post->name; ?> le <?php echo $post->date; ?>
        </div>
      </div>
    </div>

  <?php } ?>
</div>
