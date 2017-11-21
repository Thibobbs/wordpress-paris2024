<?php get_header(); ?>

<div id="content">

    <div class="slider">
      <div class="slider__controllers">
        <a href="" class="controllers__prev">prev</a>
        <a href="" class="controllers__next">next</a>
      </div>
       
       <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
       
        <div class="slider__slide">
            <div class="slider__slide__filter" style="background-image:url('<?= the_post_thumbnail_url(); ?>')">
                <div class="slider__slide__container">
                    <h2 class="slider__slide__article-type"><?php the_category(', '); ?></h2>
                    <h1 class="slider__slide__title"><?php the_title(); ?></h1>
                    <a href="<?php the_permalink(); ?>" class="btn--blue btn__text--white slider__slide__button">Voir l'article</a>
                </div>
            </div>
        </div>
        <div class="slider__slide">
            <div class="slider__slide__filter">
                <div class="slider__slide__container">
                    <h2 class="slider__slide__article-type">Développement territorial2</h2>
                    <h1 class="slider__slide__title">Des Jeux de partage, plus inclusifs et solidaires</h1>
                    <a href="#" class="btn--blue btn__text--white slider__slide__button">Voir l'article</a>
                </div>
            </div>
        </div>
        <div class="slider__slide">
            <div class="slider__slide__filter">
                <div class="slider__slide__container">
                    <h2 class="slider__slide__article-type">Développement territorial2</h2>
                    <h1 class="slider__slide__title">Des Jeux de partage, plus inclusifs et solidaires</h1>
                    <a href="#" class="btn--blue btn__text--white slider__slide__button">Voir l'article</a>
                </div>
            </div>
        </div>

      <?php endwhile; else: ?>
      <p>Désolé, le site semble rencontrer un problème ... Merci de revenir ultérieurement.</p>
      <?php endif; ?>

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
        <p class="athlete__caption">La jeunesse va se préparer à accueillir les jeux.</p>
        <a href="" class="athlete__button btn--white btn__text--blue">Le judo</a>
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


