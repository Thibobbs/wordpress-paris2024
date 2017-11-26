<?php get_header(); ?>

<div id="content">

    <div class="slider">
      <div class="slider__slides">
       
       <?php

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
            <a href="<?php the_permalink(); ?>" class="slide__button btn__main btn__main--blue btn__text btn__text--white">Voir l'article</a>
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
        <a href="" class="controllers__prev">prev</a>
        <a href="" class="controllers__next">next</a>
        <div class="controllers__tiles">
          <div class="tile"></div>
          <div class="tile tile--active"></div>
          <div class="tile"></div>
        </div>
      </div>

    </div>

    <div class="discover">
        <div class="discover__image">

        </div>
        <div class="discover__container">
            <h1 class="discover__title">Venez partager notre vision des Jeux</h1>
            <p class="discover__text">Depuis des centaines d'années, Paris accueuille tous les peuples de la Terre, y compris les pères fondateurs du Mouvement olympique, dans un esprit de collaboration et d'inspiration mutuelle, pour générer des idées et façonner l'avenir</p>
            <a href="#" class="discover__link">Découvrir</a>
        </div>
    </div>

    <div class="partners">
      <ul>
        <li class="partner"><img src="" alt=""></li>
        <li class="partner"><img src="" alt=""></li>
        <li class="partner"><img src="" alt=""></li>
        <li class="partner"><img src="" alt=""></li>
        <li class="partner"><img src="" alt=""></li>
      </ul>
    </div>

    <div class="athlete">
      <div class="athlete__txt">
        <h3 class="athlete__name">Teddy Rinner</h3>
        <p class="athlete__caption">La jeunessa va se préparer à accueillir les jeux.</p>
        <a href="" class="athlete__button btn__main btn__main--white btn__text btn__text--blue">Le judo</a>
      </div>
    </div>
    
    <div class="discover">
        <div class="discover__image">

        </div>
        <div class="discover__container">
            <h1 class="discover__title">Venez partager notre vision des Jeux</h1>
            <p class="discover__text">Depuis des centaines d'années, Paris accueuille tous les peuples de la Terre, y compris les pères fondateurs du Mouvement olympique, dans un esprit de collaboration et d'inspiration mutuelle, pour générer des idées et façonner l'avenir</p>
            <a href="#" class="discover__link">Découvrir</a>
        </div>
    </div>

</div>

<?php get_footer(); ?>


