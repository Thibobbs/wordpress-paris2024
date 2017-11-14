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
        <?php the_title() ?>
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

<?php get_footer() ?>