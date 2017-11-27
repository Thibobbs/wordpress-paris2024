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
            <input type="text" placeholder="<?php the_field('news_search_sentence'); ?>" name="keyword" id="keyword" onkeydown="fetch(this)">     
        </div>
        <div class="search__button">
            <button><?php the_field('news_search'); ?></button>
        </div> 
    </div>
</div>
<div class="news">
    <div class="news__wrapper">
        <div class="news__categories">
            <div class="news__category all-categories active" onclick="fetch(this)"><?php the_field('news_categories_1'); ?></div>
            <?php 
                $terms = get_terms(array('taxonomy'=>'category'));
                foreach($terms as $term){ ?>
                
                    <div class="news__category" category="<?= $term->slug ?>" onclick="fetch(this)"><?= $term->name ?></div>
            <?php    
                }
            ?>
        </div>

        <div class="news__loader">
            <div class="news__loader__bar"></div>
            <div class="news__loader__bar"></div>
            <div class="news__loader__bar"></div>
            <div class="news__loader__bar"></div>
            <div class="news__loader__bar"></div>
            <div class="news__loader__ball"></div>
        </div>

        <div class="news__articles">
            <?php
                $args= array(
                    'post_type' => 'post',
                    'posts_per_page' => 9
                );

                $the_query = new WP_Query( $args );

                // Start Loop
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();
            ?>

            <div class="articles__article">
                <a href="<?php the_permalink() ?>">
                    <div class="article__thumbnail">
                        <?php
                        if(has_post_thumbnail())
                        {
                            the_post_thumbnail("hub_post_thumbnail");
                        }
                        ?>
                        <div class="thumbnail__line"></div>
                    </div>
                    <div class="article__content">
                        <div class="article__title"><?php the_title() ?></div>
                        <div class="article__text"><?php the_field('article_intro'); ?></div>
                    </div>
                    <div class="article__data-wrapper">
                        <div class="article__line"></div>
                        <div class="article__data">
                            <div class="article__data-date"><?php the_field('article_date'); ?></div>
                            <div class="article__data-hastag">#Paris2024</div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- End loop -->
            <?php
                    }
                /* Restore original Post Data */
                wp_reset_postdata();
                }
            ?>
           
        </div>
        <div class="news__button">
            <a class="news__see-more" href="#" title="Voir plus">Voir plus</a>
        </div>
    </div>
</div>
<?php get_footer(); ?>