<?php
/*
* Template name: Concept
*/
?>

<?php get_header() ?>

<section class="video-intro">
    <div class="video-intro__page-name"><?php the_field("page_name")?></div>
    <h1 class="video-intro__title"><?php the_field("concept_title")?></h1>
    <p class="video-intro__paragraph"><?php the_field("concept_text")?></p>
    <button class="video-intro__button">
        <svg fill="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 5v14l11-7z"/>
            <path d="M0 0h24v24H0z" fill="none"/>
        </svg>
    </button>
    <div class="video-intro__fade-effect"></div>
    <div class="video-intro__player">
        <video>
          <source src="<?= UPLOAD.'/concept.mp4' ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
    </div>
<<<<<<< HEAD
    <div class="video-intro__bg"></div>
=======
    <div class="video-intro__bg" style="background-image: url('<?= get_field('concept_video')['url']; ?>'); background-size: cover;"></div>
>>>>>>> dev
</section>

<section class="description-project">
    <div class="description-project__txt">
        <h3 class="description-project__title"><?php the_field("concept_project") ?></h3>
        <p class="description-project__paragraph"><?php the_field("concept_project_text") ?></p>
    </div>
</section>

<section class="list-sports">
<<<<<<< HEAD

    <h3 class="list-sports__title"><?php the_field("concept_sports_title") ?></h3>
    <p class="list-sports__text"><?php the_field("concept_sports_text") ?></p>
    
    <div class="list-sports__items">
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
            <div class="item__fade"></div>
            <h3 class="item__title"><?php the_title() ?></h3>
            <div class="thumbnail">
                <?php
                  if(has_post_thumbnail())
                  {
                    the_post_thumbnail("hub_sport_thumbnail");
                  }
                ?>
            </div>
        </div>

         <!-- End loop -->
        <?php
        }
           /* Restore original Post Data */
           wp_reset_postdata();
        }
        ?>
    </div>
    
</section>

<section class="sites">
     <h3 class="sites__title"><?php the_field("concept_sites_title") ?></h3>
=======
    <div class="container">
        <h3 class="list-sports__title"><?php the_field("concept_sports_title") ?></h3>
        <p class="list-sports__text"><?php the_field("concept_sports_text") ?></p>
        
        <div class="list-sports__items">
            <?php
            $args= array(
              'post_type' => 'sport',
              'posts_per_page' => 34,
              'orderby'=>'title',
              'order'=>'ASC'
            );

            $the_query = new WP_Query( $args );

            // Start Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
            ?>
            <a href="<?php the_permalink() ?>">
              <div class="list-sports__item">
                  <div class="item__fade"></div>
                  <h3 class="item__title"><?php the_title() ?></h3>
                  <div class="thumbnail">
                      <?php
                        if(has_post_thumbnail())
                        {
                          the_post_thumbnail("hub_sport_thumbnail");
                        }
                      ?>
                  </div>
              </div>
            </a>

             <!-- End loop -->
            <?php
            }
               /* Restore original Post Data */
               wp_reset_postdata();
            }
            ?>
        </div>
    </div>
</section>

<section class="sites">
  <h3 class="sites__title"><?php the_field("concept_sites_title") ?></h3>
    

  <div class="slider-concept">
    <div class="slider__slides">

      <?php

            $args = array(
              'post_type' => 'lieu',
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
              <?php the_title(); ?>
            </h3>
            <h2 class="slide__title">
              <?php the_content(); ?>
            </h2>  
            <div class="slide__image">
              <img src="<?= get_field('place_image')['url']; ?>" alt="">
            </div>
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
>>>>>>> dev
</section>

<?php get_footer() ?>