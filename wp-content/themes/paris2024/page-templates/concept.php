<?php
/*
* Template name: Concept
*/
?>

<?php get_header() ?>

<div class="video-intro">
    <div class="video-intro__page-name">Concept</div>
    <h1 class="video-intro__title">Paris, parc olympique</h1>
    <p class="video-intro__paragraph">Notre projet comprend des sites existants ou temporaires à hauteur de 95% et chacun d’entre eux présente la perspective d’un héritage défini précis et respectueux des plans de développement de la ville à long terme.</p>
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

<div class="description-project">
    <div class="description-project__txt">
        <h3 class="description-project__title">Un projet en héritage</h3>
        <p class="description-project__paragraph">Le village olympique est conçu comme un projet exceptionnel de rénovation urbaine, il deviendra une référence majeure en termes de durabilité et de rénovation urbaine.</p>
    </div>
</div>

<div class="list-sports">

    <?php
    $args= array(
    'post_type' => 'sport',
    'posts_per_page' => 20
    );

    $the_query = new WP_Query( $args );

    // Start Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
            $the_query->the_post();
    ?>

    <div class="list-sports__item">
        <a href="<?php the_permalink() ?>">
        <?php the_title() ?>
        <div class="thumbnail">
            <?php
              if(has_post_thumbnail())
              {
                the_post_thumbnail("hub_sport_thumbnail");
              }
            ?>
        </div>
        </a>
    </div>

     <!-- End loop -->
    <?php
    }
       /* Restore original Post Data */
       wp_reset_postdata();
    }
    ?>
    
</div>


<div class="slider-concept">
  <div class="slider__name">SITES</div>
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

      <div class="slider__slide" index="<?= $i ?>">
        <div class="slide__info">
          <h3 class="slide__category">
            <?php the_category(', '); ?>
          </h3>
          <h2 class="slide__title">
            <?php the_title(); ?>
          </h2>
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

<?php get_footer() ?>