<?php
/*
* Template name: Vision
*/
?>

<?php get_header() ?>

<div class="video-intro">
  <div class="video-intro__page-name"><?php the_field('vision'); ?></div>
  <h1 class="video-intro__title"><?php the_field('vision_title'); ?></h1>
  <p class="video-intro__paragraph"><?php the_field('vision_text'); ?></p>
  <button class="video-intro__button">
        <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 5v14l11-7z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
  <div class="video-intro__fade-effect"></div>
  <div class="video-intro__player">
    <video>
          <source src="<?= UPLOADS.'/concept.mp4' ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
  </div>
</div>

<div class="description-vision">
  <div class="description-vision__txt">
    <h4 class="txt__title"><?php the_field('vision_stats_title'); ?></h4>
    <p class="txt__paragraph"><?php the_field('vision_stats_text'); ?></p>
    <div class="description-vision__cards">
      <div class="cards card-spectators">
        <img src="" alt="" class="cards__img">
        <p class="cards__number"><?php the_field('vision_stats_1_number'); ?></p>
        <p class="cards__txt"><?php the_field('vision_stats_1_text'); ?></p>
      </div>
      <div class="cards card-cities">
        <img src="" alt="" class="cards__img">
        <p class="cards__number"><?php the_field('vision_stats_2_number'); ?></p>
        <p class="cards__txt"><?php the_field('vision_stats_2_text'); ?></p>
      </div>
      <div class="cards card-transports">
        <img src="" alt="" class="cards__img">
        <p class="cards__number"><?php the_field('vision_stats_3_number'); ?></p>
        <p class="cards__txt"><?php the_field('vision_stats_3_text'); ?></p>
      </div>
    </div>
  </div>
</div>

<div class="athlete">
  <div class="athlete__txt">
    <h3 class="athlete__name"><?php the_field('vision_athlete'); ?></h3>
    <p class="athlete__caption"><?php the_field('vision_athlete_caption'); ?></p>
    <a href="" class="athlete__button btn__main btn__main--white btn__text btn__text--blue"><?php the_field('vision_athlete_button'); ?></a>
  </div>
</div>

<?php get_footer() ?>