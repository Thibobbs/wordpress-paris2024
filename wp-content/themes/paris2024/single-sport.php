<?php
/*
* Single-sport
*/
?>
<?php get_header(); ?>
    <div class="sport__hero">
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <div class="sport__heroTitle" style="background-image: url('<?php echo $thumb['0'];?>');">
            <div class="hero__filter"></div>
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
  <?php 

  $places = get_field('single_sport_place');

  if( $places ): ?>
    <?php foreach( $places as $post): // variable must be called $post (IMPORTANT) ?>
  <div class="sport__site">
    <div class="sport__site--content">
      <p class="sport__site--title"><?php the_title(); ?></p>
      <p class="sport__site--note">
        <?php the_field('place_adress'); ?>
      </p>
    </div>
    <div class="sport__site--img"><img src="<?= get_field('place_image')['url']; ?>" alt="image sport"></div>
  </div>
  <?php setup_postdata($post); ?>
    <?php endforeach; ?>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
  <?php endif; ?>
</div>

<footer id="footer" class="footer">
<div class="footer__container">
  <div class="container footer__content">
    <p class="mainTitle"><a href="<?php echo get_page_link( get_page_by_title('concept')->ID ); ?>">Revenir au concept</a></p>
    <span>Retrouvez toutes les informations relatives à l’organisation des jeux de Paris 2024.</span>
  </div>
</div>
</footer>

<?php get_footer(); ?>