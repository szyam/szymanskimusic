<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package SzymanskiMusic
 */

get_header(); ?>

<header class="text-center padded">
    <h4>albums / singles / discogrophy</h4>
</header>
<div class="rel-container">

<ul class="img-grid-4" id="releases">

    <?php global $post;
    $args = array(
        'post_type'        => 'download',
        'posts_per_page'   => '-1',
        'category_id'      => array(2, 5, 4),
        'order'            => 'ASC'
    );
    $custom_posts = get_posts($args);
    foreach($custom_posts as $post) : setup_postdata($post); ?>


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



            <?php // start second loop
            $temp_post = $post; // Storing the object temporarily
            //setup_postdata($post);
            $posts = get_field('szy_singles');

            if( $posts ): ?>
                <ul class="tracks">
                <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>

                <?php 
                    //setup_postdata($post);
                    $id = get_the_ID();
                    $sample = the_field( "sample", $id ); 
                ?>

                    <li>
                        <a href="" data-src='<?php echo $sample; ?>' class="sm2_link">
                            <?php the_title(); ?>
                        </a>
                        <?php echo do_shortcode('[purchase_link class="button icon-cart" id="'. $id .'"]'); ?>
                    </li>
                <?php endforeach; ?>
                </ul>
                <?php //wp_reset_postdata(); this reverts the post back to WP's sample post ?>
            <?php endif; ?>

            <?php $post = $temp_post; // Restore the value of $post to the original ?>
            <?php //end 2nd loop ?>



            <?php the_content(); ?>
            <?php echo do_shortcode('[purchase_link class="button"]'); ?>

            <footer class="entry-footer">
                <?php szymanskimusic_entry_footer(); ?>
            </footer><!-- .entry-footer -->
        </section>
                
    </li>

<?php endforeach; ?>
</ul>

<?php get_footer(); ?>
