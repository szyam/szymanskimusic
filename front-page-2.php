<?php
/**
 * front-page.php
 *
 *
 * @package SzymanskiMusic
 */

get_header(); ?>

<header class="text-center padded">
    <h4>albums / singles / discogrophy</h4>
</header>
<div class="rel-container">

<ul class="img-grid-4" id="releases">

    <?php //global $post;
    $args = array(
        'post_type'        => 'download',
        'posts_per_page'   => -1,
        'cat'               => -8,
        'order'            => 'ASC',
        'paged' => ( get_query_var('page') ? get_query_var('page') : 1 ),
    );
    $custom_posts = new WP_Query($args);
    if ($custom_posts->have_posts()) :
        while( $custom_posts->have_posts()) :
            $custom_posts->the_post(); ?>


    <li>
        <a class="hook" href="<?php the_permalink(); ?>">
            <h5><?php the_title(); ?></h5>
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail('full', array('class' => 'cover'));
            }  ?>
        </a>
        <section class="info">
            <h1><?php the_title(); ?></h1>
            <span class="close"><i class="icon-close"></i></span>
            <h6 class="price">Singles - $0.89 | Album - <?php echo get_post_meta( get_the_ID(), 'edd_price', true ); ?></h6>


    <?php if( have_rows('release_singles') ): ?>

        <ul class="tracks">
        <?php while( have_rows('release_singles') ): the_row(); 
            // vars
            $title = get_sub_field('title');
            $id = get_sub_field('cart_id');
            $link = get_sub_field('sample');
            ?>

            <li>
                <a href="" data-src="<?php echo $link; ?>" class="sm2_link">
                    <?php echo $title; ?>
                </a>
                <?php echo do_shortcode('[purchase_link class="button icon-cart" id="'. $id .'"]'); ?>       
            </li>

        <?php endwhile; ?>

        </ul>

    <?php endif; ?>



            <?php the_content(); ?>

            <a class="button" href="<?php the_permalink(); ?>">See Page</a>

            <?php echo do_shortcode('[purchase_link class="button"]'); ?>

            <footer class="entry-footer">
                <?php szymanskimusic_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </section>
                
    </li>

<?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</ul>

<?php get_footer(); ?>
