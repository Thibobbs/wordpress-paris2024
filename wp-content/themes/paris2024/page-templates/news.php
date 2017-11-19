<?php
/*
* Template name: Actualités
*/
?>
<?php get_header(); ?>

<div class="image-intro">
    <h1 class="image-intro__title"><?php the_field('news_title'); ?></h1>
    <div class="image-intro__overlay"></div>
    <div class="image-intro__background"></div>

    <div class="image-intro__search">
        <div class="search__input">
            <div><?php the_field('news_search_sentence'); ?></div></div>
        <div class="search__button">
            <div><?php the_field('news_search'); ?></div></div>
    </div>
</div>
<div class="news">
    <div class="news__wrapper">
        <div class="news__categories">
            <a href="#" title=""><?php the_field('news_categories_1'); ?></a>
            <a href="#" title=""><?php the_field('news_categories_2'); ?></a>
            <a href="#" title=""><?php the_field('news_categories_3'); ?></a>
            <a href="#" title=""><?php the_field('news_categories_4'); ?></a>
            <a href="#" title=""><?php the_field('news_categories_5'); ?></a>
        </div>
        <div class="news__articles">
        <?php
            $args= array(
            'post_type' => 'article',
            'posts_per_page' => 20
            );

            $the_query = new WP_Query( $args );

            // Start Loop
            if ( $the_query->have_posts() ) {
                while ( $the_query->have_posts() ) {
                    $the_query->the_post();
        ?>

        <div class="articles__article">
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
            <div class="articles__article">
                <div class="article__thumbnail">
                    <img src="" alt="Article thumbnail">
                    <div class="thumbnail__line"></div>
                </div>
                <div class="article__content">
                    <div class="article__title">Les athlètes au cœur des Jeux Olympiques</div>
                    <div class="article__text">Les athlètes sont au cœur des Jeux Olympiques. Sans eux, les Jeux ne pourraient pas avoir lieu et leur expérience est inestimable pour une...</div>
                </div>
                <div class="article__data-wrapper">
                    <div class="article__line"></div>
                    <div class="article__data">
                        <div class="article__data-date">10 Juil. 2017</div>
                        <div class="article__data-hastag">#Paris2024</div>
                    </div>
                </div>
            </div>
           
        </div>
        <div class="news__button">
            <a class="news__see-more" href="#" title="Voir plus">Voir plus</a>
        </div>
    </div>
</div>
<?php get_footer(); ?> 