<?php
/*
* Template name: Vision
*/
?>

<?php get_header() ?>

<section class="video-intro">
  <div class="video-intro__page-name">
    <?php the_field("page_name")?>
  </div>
  <h1 class="video-intro__title container">
    <?php the_field("vision_title")?>
  </h1>
  <p class="video-intro__paragraph container">
    <?php the_field("vision_text")?>
  </p>
  <button class="video-intro__button">
    <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path d="M8 5v14l11-7z" />
      <path d="M0 0h24v24H0z" fill="none" />
    </svg>
  </button>

  <div class="video-intro__fade-effect"></div>
  <div class="video-intro__player">
    <video>
      <source src="<?= UPLOAD.'/concept.mp4' ?>" type="video/mp4"> Your browser does not support the video tag.
    </video>
  </div>
  <div class="video-intro__bg" style="background: url('<?= get_field('vision_video')['url']; ?>');"></div>
</section>

  <div class="description-vision">
    <div class="description-vision__txt container">
      <h4 class="txt__title">
        <?php the_field('vision_stats_title'); ?>
      </h4>
      <p class="txt__paragraph">
        <?php the_field('vision_stats_text'); ?>
      </p>
      <div class="description-vision__cards">
        <div class="cards card-spectators">
          <img src="<?= get_field('vision_stats_1_img')['url']; ?>" class="cards__img">
          <p class="cards__number">
            <?php the_field('vision_stats_1_number'); ?>
          </p>
          <p class="cards__txt">
            <?php the_field('vision_stats_1_text'); ?>
          </p>
        </div>
        <div class="cards card-cities">
          <img src="<?= get_field('vision_stats_2_img')['url']; ?>" class="cards__img">
          <p class="cards__number">
            <?php the_field('vision_stats_2_number'); ?>
          </p>
          <p class="cards__txt">
            <?php the_field('vision_stats_2_text'); ?>
          </p>
        </div>
        <div class="cards card-transports">
          <img src="<?= get_field('vision_stats_3_img')['url']; ?>" class="cards__img">
          <p class="cards__number">
            <?php the_field('vision_stats_3_number'); ?>
          </p>
          <p class="cards__txt">
            <?php the_field('vision_stats_3_text'); ?>
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="vision-athlete">
    <div class="container__img">
      <img src="<?= get_field('vision_athlete_image')['url']; ?>" alt="" class="vision-athlete__img">
    </div>
    <div class="vision-athlete__container container">
      <div class="vision-athlete__txt">
        <h3 class="vision-athlete__name">
          <?php the_field('vision_athlete'); ?>
        </h3>
        <p class="vision-athlete__caption">
          <?php the_field('vision_athlete_caption'); ?>
        </p>
        <a href="" class="vision-athlete__button btn__main btn__main--white btn__text btn__text--blue">
          <img src="<?= get_field('vision_athlete_button_img')['url']; ?>" alt="" class="cards__img">
          <?php the_field('vision_athlete_button'); ?>
        </a>
      </div>

    </div>
  </div>


  <?php get_footer() ?>