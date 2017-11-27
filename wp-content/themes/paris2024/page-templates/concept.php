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
          <source src="<?= UPLOADS.'/concept.mp4' ?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
    </div>
    <div class="video-intro__bg"></div>
</section>

<section class="description-project">
    <div class="description-project__txt">
        <h3 class="description-project__title"><?php the_field("concept_project") ?></h3>
        <p class="description-project__paragraph"><?php the_field("concept_project_text") ?></p>
    </div>
</section>

<section class="list-sports">

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
</section>

<?php get_footer() ?>