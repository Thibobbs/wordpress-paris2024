<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<div class="story__hero"><?php the_post_thumbnail(); ?></div>
<div class="story__container">
  <div class="story__info container">
    <div class="story__category"><?= get_the_terms($post->id, 'category')[0]->name ?></div>
    <div class="story__date">Publié le <?php the_field('article_date'); ?></div>
  </div>
  <div class="story__main container">
    <h1><?php the_title(); ?></h1>
    <h2 class="story__main--heading"><?php the_field('article_intro');?></h2>
  </div>
  <div class="story__content container">
    <article>
      <?php the_content(); ?>
    </article>
  </div>
<?php endwhile; else: ?>
  <p>Sorry, no posts matched your criteria.</p>

</div>
<?php endif; ?>

<footer id="footer" class="footer">
<div class="footer__container">
  <div class="container footer__content">
    <p class="mainTitle"><a href="<?php echo get_page_link( get_page_by_title('actualites')->ID ); ?>">Revenir aux actualités</a></p>
    <span>Retrouvez toutes les informations relatives à l’organisation des jeux de Paris 2024.</span>
  </div>
</div>
</footer>

<?php get_footer(); ?>