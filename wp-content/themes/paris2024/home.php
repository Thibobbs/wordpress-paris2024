<?php
/**
  *Template Name: Home
*/
get_header(); ?>
<div id="content">

    <div class="slider">
      <div class="slider__slides">
       
       <?php

          $button_txt = get_field('home_slider_button_text');

          $args = array(
            'posts_per_page' => '3'
          );
          // The Query
          $the_query = new WP_Query( $args );

          // The Loop
          if ( $the_query->have_posts() ) {
            $i = 0;
            while ( $the_query->have_posts() ) {
              $the_query->the_post();
        ?>
       
        <div class="slider__slide" index="<?= $i ?>" style="background-image:url('<?= the_post_thumbnail_url(); ?>')">
          <div class="slide__info">
            <h3 class="slide__category"><?php the_category(', '); ?></h3>
            <h2 class="slide__title"><?php the_title(); ?></h2>
            <a href="<?php the_permalink(); ?>" class="slide__button btn__main btn__main--blue btn__text btn__text--white"><?= $button_txt; ?></a>
          </div>
        </div>

      <?php
              $i = ($i + 1);
            }
            wp_reset_postdata();
          } else {
            echo '<p>Désolé, le site semble rencontrer un problème ... Merci de revenir ultérieurement.</p>';
          }
      ?>
      
      </div>
      
      <div class="slider__controllers">
        <a href="" class="controllers controllers__prev"><img src="<?= IMAGES_URL ?>/arrows/left-arrow.svg" alt=""></a>
        <a href="" class="controllers controllers__next"><img src="<?= IMAGES_URL ?>/arrows/right-arrow.svg" alt=""></a>
        <div class="controllers__tiles">
          <div class="tile"></div>
          <div class="tile tile--active"></div>
          <div class="tile"></div>
        </div>
      </div>

    </div>

    <div class="vision">
      <div class="vision__container">
        <div class="container__text">
          <h2 class="vision__title">
            <?php the_field('home_vision_title'); ?>
          </h2>
          <p class="vision__text">
            <?php the_field('home_vision_text'); ?>
          </p>
          <a href="" class="vision__button">
            <?php the_field('home_vision_button'); ?>
          </a>
        </div>
        <div class="container__img">
          <img src="<?= get_field('home_vision_image')['url']; ?>" alt="" class="vision__img">
        </div>
      </div>
    </div>

    <div class="partners">
      <ul>
        <li class="partner"><img src="<?= get_field('home_partner_logo_1')['url']; ?>" alt=""></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_1')['url']; ?>" alt=""></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_1')['url']; ?>" alt=""></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_1')['url']; ?>" alt=""></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_1')['url']; ?>" alt=""></li>
      </ul>
    </div>

    <div class="home-athlete">
      <div class="home-athlete__container">
        <div class="container__img">
          <img src="<?= get_field('home_athlete_image')['url']; ?>" alt="" class="home-athlete__img">
        </div>
        <div class="home-athlete__txt">
          <h3 class="home-athlete__name">
            <?php the_field('home_athlete'); ?>
          </h3>
          <p class="home-athlete__caption">
            <?php the_field('home_athlete_caption'); ?>
          </p>
          <a href="" class="home-athlete__button btn__main btn__main--white btn__text btn__text--blue">
            <?php the_field('home_athlete_button'); ?>
          </a>
        </div>
      </div>
    </div>

    <div class="concept">
      <div class="concept__container">
        <div class="container__img">
          <img src="<?= get_field('home_concept_image')['url']; ?>" alt="" class="concept__img">
        </div>
        <div class="container__text">
          <h2 class="concept__title">
            <?php the_field('home_concept_title'); ?>
          </h2>
          <p class="concept__text">
            <?php the_field('home_concept_text'); ?>
          </p>
          <a href="" class="concept__button">
            <?php the_field('home_concept_button'); ?>
          </a>
        </div>
      </div>
    </div>

</div>

<?php get_footer(); ?>


