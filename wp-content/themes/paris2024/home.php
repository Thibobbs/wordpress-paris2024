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
            <h3 class="slide__category"><p><?= get_the_terms($post->id, 'category')[0]->slug ?></p></h3>
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
          <a href="<?php echo get_page_link( get_page_by_title('vision')->ID ); ?>" class="vision__button">
            <?php the_field('home_vision_button'); ?>
          </a>
        </div>
        <div class="container__image">
          <img src="<?= get_field('home_vision_image')['url']; ?>" alt="" class="vision__img">
        </div>
      </div>
    </div>

    <div class="partners">
      <ul>
        <li class="partner"><img src="<?= get_field('home_partner_logo_1')['url']; ?>" alt="logo 1"></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_2')['url']; ?>" alt="logo 2"></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_3')['url']; ?>" alt="logo 3"></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_4')['url']; ?>" alt="logo 4"></li>
        <li class="partner"><img src="<?= get_field('home_partner_logo_5')['url']; ?>" alt="logo 5"></li>
      </ul>
    </div>

    <div class="home-athlete">
      <div class="home-athlete__container">
        <div class="container__image">
          <img src="<?= get_field('home_athlete_image')['url']; ?>" alt="" class="home-athlete__img">
        </div>
        <div class="home-athlete__txt">
          <h3 class="home-athlete__name">
            <?php the_field('home_athlete'); ?>
          </h3>
          <p class="home-athlete__caption">
            <?php the_field('home_athlete_caption'); ?>
          </p>
          <a href="<?php the_field('home_athlete_button_link'); ?>" class="home-athlete__button btn__main btn__main--white btn__text btn__text--blue">
          <img src="<?= get_field('home_athlete_button_img')['url']; ?>" alt="" class="cards__img">
            <?php the_field('home_athlete_button'); ?>
          </a>
        </div>
      </div>
    </div>
    
    <div class="news">
     <h3 class="news__title"><?php the_field('home_news_title'); ?></h3>
     <p class="news__text"><?php the_field('home_news_text'); ?></p>
      <div class="slider2">
        <div class="slider2__slides">
         
         <?php
      
            $args = array(
              'posts_per_page' => '9'
            );
            // The Query
            $the_query = new WP_Query( $args );
      
            // The Loop
            if ( $the_query->have_posts() ) {
              $i = 0;
              while ( $the_query->have_posts() ) {
                $the_query->the_post();
                
                if (($i % 3) === 0) {
                  echo '<div class="slider2__slide" index="' . $i . '">';
                }
          ?>
            <a class="stories" href="<?php the_permalink() ?>">
            <div class="stories__link <?= get_the_terms($post->id, 'category')[0]->slug ?>">

                <div class="stories__link--thumbnail">
                    <?php if(has_post_thumbnail()) { the_post_thumbnail("hub_post_thumbnail"); } ?>
                    <div class="thumbnail__line"></div>
                </div>

                <div class="stories__content">
                    <div class="stories__content--text">
                        <h4><?php the_title() ?></h4>
                        <p class="stories__link--excerpt">
                            <?php echo custom_field_excerpt(); ?>
                        </p>
                    </div>
                    <!-- <hr> -->
                    <div class="stories__content--infos">
                        <p><?php the_field('article_date'); ?></p>
                        <p>#<?= get_the_terms($post->id, 'category')[0]->slug ?></p>
                    </div>
                </div>

            </div>
            </a>

        <?php
                  if ((($i+1) % 3) === 0) {
                    echo '</div>';
                  }
                $i = ($i + 1);
              }
              wp_reset_postdata();
            } else {
              echo '<p>Désolé, le site semble rencontrer un problème ... Merci de revenir ultérieurement.</p>';
            }
        ?>
        
        </div>
        
        <div class="slider2__controllers2">
          <a href="" class="controllers controllers2__prev"><img src="<?= IMAGES_URL ?>/arrows/left-arrow.svg" alt=""></a>
          <a href="" class="controllers controllers2__next"><img src="<?= IMAGES_URL ?>/arrows/right-arrow.svg" alt=""></a>
          <div class="controllers__tiles">
            <div class="tile"></div>
            <div class="tile tile--active"></div>
            <div class="tile"></div>
          </div>
        </div>
      
      </div>
      <a href="<?= get_post_type_archive_link('posts') ?>" class="news__button btn__main btn__main--blue btn__text btn__text--white"><?php the_field('home_news_button'); ?></a>
    </div>

    <div class="concept">
      <div class="concept__container">
        <div class="container__image">
          <img src="<?= get_field('home_concept_image')['url']; ?>" alt="" class="concept__img">
        </div>
        <div class="container__text">
          <h2 class="concept__title">
            <?php the_field('home_concept_title'); ?>
          </h2>
          <p class="concept__text">
            <?php the_field('home_concept_text'); ?>
          </p>
          <a href="<?php echo get_page_link( get_page_by_title('concept')->ID ); ?>" class="concept__button">
            <?php the_field('home_concept_button'); ?>
          </a>
        </div>
      </div>
    </div>

</div>

<?php get_footer(); ?>


