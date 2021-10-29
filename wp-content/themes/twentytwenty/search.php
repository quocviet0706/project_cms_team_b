<?php

/**
 * Search result page.
 */
get_header();
global $wp_query;

//echo '<pre/>';
//print_r($wp_query);
//wp_die();
?>
<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container">
            <header class="mb-5">
                <h2 class="page-title text-center"> <?php echo $wp_query->found_posts; ?>
                    <?php _e('Search Results Found For', 'locale'); ?>: "<?php the_search_query(); ?>"
                </h2>
            </header>

            <?php if (have_posts()) { ?>

                <div>

                    <?php while (have_posts()) {
                        the_post(); ?>
                        <div class="card mb-5 pb-3 card--custom">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'thumbnail'); ?>
                                        <img src="<?php echo $url ?>" />
                                    </div>
                                    <div class="col-12 col-lg-2">
                                        <?php
                                     echo "<div class='contentdate'>"."<span class='topnewsdate date'>". get_the_date('d', $post->ID)."</span>","<br>" ."<span class='topnewsmonth date'>Tháng ".get_the_date('m', $post->ID)."</span>","</div>";
                                        ?>
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <div class="search-card-container">
                                            <h3 class="card-title">
                                                <a class="title-link--custom" href="<?php echo esc_url(get_the_permalink()); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <?php //the_post_custom_thumbnail( get_the_ID(), 'medium', [ 'class' => 'search-card-thumbnail' ] ); 
                                            ?>
                                            <div class="search-card-content">
                                                <?php echo the_excerpt() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php get_template_part('template-parts/pagination'); ?>
            <?php } else {
                get_search_form();
            } ?>
        </div>
    </main>
</div>
<?php get_footer(); ?>