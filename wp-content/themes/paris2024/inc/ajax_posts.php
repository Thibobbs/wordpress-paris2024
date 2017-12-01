<?php 
// add the ajax fetch js
add_action( 'wp_footer', 'ajax_fetch' );
function ajax_fetch() {
?>
    <script type="text/javascript">
        var page = 1;
        if (document.querySelector('body').classList.contains('.page-id-9')) {
          var number_of_pages = document.querySelector('.news__button').getAttribute('pages');
          number_of_pages--;
        }
        function fetch(element){
            if(element.tagName == 'DIV'){

                if(element.classList.contains('news__category')){
                    document.querySelector('.news__loader').style.display="block";
                    document.querySelector('.stories__container').innerHTML = "";

                    for(i = 0; i < document.querySelectorAll('.news__category').length; i++){
                        document.querySelectorAll('.news__category')[i].classList.remove('active');
                    }
                    element.classList.add('active');

                    if(element.classList.contains('all-categories')){
                        console.log("divall");
                        jQuery.ajax({
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            type: 'post',
                            data: { action: 'search_and_filter_data_fetch'},
                            success: function(data) {
                                document.querySelector('.news__loader').style.display="none";
                                document.querySelector('.stories__container').innerHTML = data;
                            }
                        });
                    }
                    else{
                        console.log("div");
                        jQuery.ajax({
                            url: '<?php echo admin_url('admin-ajax.php'); ?>',
                            type: 'post',
                            data: { action: 'search_and_filter_data_fetch', taxonomy: element.getAttribute('category') },
                            success: function(data) {
                                document.querySelector('.news__loader').style.display="none";
                                document.querySelector('.stories__container').innerHTML = data;
                            }
                        });   
                    }
                }

                else{
                    console.log('button');
                    page++;
                    number_of_pages--;
                    jQuery.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'post',
                        data: { action: 'load_more_data_fetch', page: page},
                        success: function(data) {
                            if(number_of_pages == 0){
                                document.querySelector('.news__button').remove();
                            }
                            document.querySelector('.stories__container').innerHTML += data;
                            
                        }
                    });
                }
            }
            else{
                document.querySelector('.news__loader').style.display="block";
                document.querySelector('.stories__container').innerHTML = "";

                console.log("input");
                jQuery.ajax({
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    type: 'post',
                    data: { action: 'search_and_filter_data_fetch', keyword: jQuery('#keyword').val() },
                    success: function(data) {
                        document.querySelector('.news__loader').style.display="none";
                        document.querySelector('.stories__container').innerHTML = data;
                    }
                });
            }

        }
    </script>

<?php
}

// the ajax function
add_action('wp_ajax_search_and_filter_data_fetch' , 'search_and_filter_data_fetch');
add_action('wp_ajax_nopriv_search_and_filter_data_fetch','search_and_filter_data_fetch');
function search_and_filter_data_fetch(){

    if(isset($_POST['taxonomy'])){
        $args =  array( 
            'posts_per_page' => 9, 
            's' => esc_attr( $_POST['keyword'] ), 
            'post_type' => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => $_POST['taxonomy']
                ),
            ),
        );
    }
    else{
        $args =  array( 
            'posts_per_page' => 9, 
            's' => esc_attr( $_POST['keyword'] ), 
            'post_type' => 'post'
        );
    }

    $the_query = new WP_Query( $args );
    if( $the_query->have_posts() ) :
        while( $the_query->have_posts() ): 
            $the_query->the_post(); 
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
        <?php endwhile;
        wp_reset_postdata();  
    endif;

    die();
}


add_action('wp_ajax_load_more_data_fetch' , 'load_more_data_fetch');
add_action('wp_ajax_nopriv_load_more_data_fetch','load_more_data_fetch');
function load_more_data_fetch(){

    $paged = $_POST['page'];
    $args =  array(
        'posts_per_page' => 9,
        'post_type' => 'post',
        'paged' => $paged
    );

    $load_more_query = new WP_Query( $args );
    if( $load_more_query->have_posts() ) :
        while( $load_more_query->have_posts() ): $load_more_query->the_post(); ?>
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
        endwhile;
    /* Restore original Post Data */
    wp_reset_postdata();

    endif;

    die();
} ?>