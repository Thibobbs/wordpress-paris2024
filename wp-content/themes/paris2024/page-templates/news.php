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

    <form class="image-intro__search" onsubmit="fetch(this);return false;" method="post">
        <div class="search__input">
            <input type="text" placeholder="<?php the_field('news_search_sentence'); ?>" name="keyword" id="keyword">     
        </div>
        <div class="search__button">
            <button type="submit">
                <span><?php the_field('news_search'); ?></span>
            </button>
        </div> 
    </form>
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

        <div class="stories__container">
            <?php
                $args= array(
                    'post_type' => 'post',
                    'posts_per_page' => 9
                );

                $wp_query = new WP_Query( $args );

                // Start Loop
                if ( $wp_query->have_posts() ) {
                    while ( $wp_query->have_posts() ) {
                        $wp_query->the_post();
            ?>
                        <a class="stories" href="<?php the_permalink() ?>">
                            <div class="stories__link <?= get_the_terms($post->id, 'category')[0]->slug ?>">
    
                                <div class="stories__link--thumbnail">
                                    <?php if(has_post_thumbnail()) { the_post_thumbnail("hub_post_thumbnail"); } ?>
                                    <div class="thumbnail__line"></div>
                                </div>
    
                                <div class="stories__content">
                                    <div class="stories__content--text">
                                        <h4><?php the_title() ?></h4>
                                        <p class="stories__link--excerpt">
                                            <?php echo custom_field_excerpt(); ?>
                                        </p>
                                    </div>
                                    <div class="stories__content--infos">
                                        <p><?php the_field('article_date'); ?></p>
                                        <p>#<?= get_the_terms($post->id, 'category')[0]->slug ?></p>
                                    </div>
                                </div>
    
                            </div>
                        </a>
                    <!-- End loop -->
                    <?php
                    }
                /* Restore original Post Data */
                wp_reset_postdata();
                }
            ?>
           
        </div>
        <?php if (  $wp_query->max_num_pages > 1 ){ ?>
            <div class="news__button" pages="<?php $wp_query->max_num_pages ?>" onclick="fetch(this)">
                <div class="news__see-more">Voir plus</div>
            </div>
        <?php } ?>
    </div>
</div>
<?php get_footer(); ?>