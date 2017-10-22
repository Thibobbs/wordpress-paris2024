<?php get_header(); ?>

<div id="content">
  <h1>home.php</h1>
  <div class="container__grid home__grid">
  <?php if ( have_posts() ) : while ( have_posts() ): the_post(); ?>
    <div class="post">
      <a href="<?php the_permalink(); ?>">
        <div class="post__thumbnail"><?php if(has_post_thumbnail()) the_post_thumbnail(); ?></div>
        <h2><?php the_title(); ?></h2>
        <div class="entry"><?php the_excerpt(); ?></div>
        <small>Ajouté le <?php the_time('j F Y'); ?> </small>
      </a>
    </div>
    <?php endwhile; else: ?>
    <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>