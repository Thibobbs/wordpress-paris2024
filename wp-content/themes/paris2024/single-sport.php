<?php
/*
* Single-sport
*/
?>
<?php get_header(); ?>
    <div class="sport__hero">
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <div class="sport__heroTitle" style="background-image: url('<?php echo $thumb['0'];?>');">
            <h2><?php the_title(); ?></h2>
            <div class="container sport__heroInfos">
                <div class="sport__heroInfos--content">
                    <div>
                        <h3><?php the_field('single_sport_intro_title_1'); ?></h3>
                        <p><?php the_field('single_sport_intro_element_1'); ?></p>
                    </div>
                    <div>
                        <h3><?php the_field('single_sport_intro_title_2'); ?></h3>
                        <p><?php the_field('single_sport_intro_element_2'); ?></p>
                    </div>
                    <div>
                        <h3><?php the_field('single_sport_intro_title_3'); ?></h3>
                        <p><?php the_field('single_sport_intro_element_3'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sport__view container">
        <div class="sport__viewGeneral">
            <p class="general__title"><?php the_field('single_sport_description_title'); ?></p>
            <div class="general__content">
                <p><?php the_field('single_sport_description_texte'); ?></p>
            </div>
        </div>
        <div class="sport__viewKey">
            <div class="sport__viewKey--img">
                <img src="<?php the_field('single_sport_image'); ?>" />
            </div>
            <div class="sport__viewKey--content">
                <h4 class="key__title"><?php the_field('single_sport_content_title'); ?></h4>
                <div class="key__content">
                    <p><?php the_field('single_sport_content_texte'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="sport__siteList container">
        <h4>Les sites</h4>
        <div class="sport__site">
            <div class="sport__site--content">
                <p class="sport__site--title">Le Bourget – Pavillon I</p>
                <p class="sport__site--note"><?php var_dump(get_field('single_sport_place')); ?></p>
            </div>
            <div class="sport__site--img"></div>
        </div>
    </div>

<div class="sport__siteList container">
  <h4>Les sites</h4>
  <?php 

  $places = get_field('relationship_field_name');

  if( $places ): ?>
    <?php foreach( $places as $place): // variable must be called $place (IMPORTANT) ?>
  <div class="sport__site">
    <div class="sport__site--content">
      <p class="sport__site--title"><?php get_field('place_adress'); ?></p>
      <p class="sport__site--note">
        <?php the_title() ?>
      </p>
    </div>
    <div class="sport__site--img"></div>
  </div>
  <?php setup_postdata($place); ?>
    <?php endforeach; ?>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $place object so the rest of the page works correctly ?>
  <?php endif; ?>
</div>


<?php get_footer(); ?>