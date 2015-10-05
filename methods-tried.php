<?php 
$singles  = get_field('szy_singles');

if( $singles ): ?>
    <ul class="tracks">
    <?php foreach( $singles as $post ): // variable must NOT be called $post (IMPORTANT) ?>
    <?php setup_postdata($post);
    $id = get_the_id( $post->ID ); ?>

        <li>
            <a href="" data-src="<?php if ( get_field('sample') ) : ?><?php the_field('sample'); ?><?php endif; ?>" class="sm2_link">
                <?php the_title(); ?>
            </a>
            <?php echo do_shortcode('[purchase_link class="button icon-cart" id="'. $id .'"]'); ?>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>






 
<?php //these 2 are not looping correctly thru the tracks ?>
<?php 
    $temp_post = $post; // Storing the object temporarily
    $ids = get_field('szy_singles', false, false);

    $query_2 = new WP_Query(array(
        'post_type'         => 'download',
        'posts_per_page'    => 3,
        'post__in'      => $ids,
    ));

    if ( $query_2->have_posts() ) : ?>

    <ul class="tracks">

    <?php while ( $query_2->have_posts() ) : $query_2->the_post(); ?>
    <?php $id = get_the_id( $post->ID ); ?> 

        <li>
            <a href="" data-src="<?php if ( get_field('sample') ) : ?><?php the_field('sample'); ?><?php endif; ?>" class="sm2_link">
                <?php the_title(); ?>
            </a>
            <?php echo do_shortcode('[purchase_link class="button icon-cart" id="'. $id .'"]'); ?>
        </li>

    <?php endwhile; ?>
    <?php $post = $temp_post; // Restore the value of $post to the original ?>
    </ul>
    <?php endif; ?>






<?php 
$temp_post = $post; // Storing the object temporarily
$ids = get_field('szy_singles', false, false);

$query_2 = new WP_Query(array(
    'post_type'         => 'download',
    'posts_per_page'    => 3,
    'post__in'      => $ids,
    'order'         =>  'ASC'
));

if ( $query_2->have_posts() ) : ?>

<ul class="tracks">

<?php while ( $query_2->have_posts() ) : $query_2->the_post(); ?>
<?php $id = get_the_id( $post->ID ); ?> 

    <li>
        <a href="" data-src="<?php if ( get_field('sample') ) : ?><?php the_field('sample'); ?><?php endif; ?>" class="sm2_link">
            <?php the_title(); ?>
        </a>
        <?php echo do_shortcode('[purchase_link class="button icon-cart" id="'. $id .'"]'); ?>
    </li>

<?php endwhile; ?>
</ul>
<?php //wp_reset_postdata(); ?>
<?php endif; ?>
<?php $post = $temp_post; // Restore the value of $post to the original ?>









<?php 
//$temp_post = $post; // Storing the object temporarily
$posts = get_field('szy_singles');

if( $posts ): ?>
    <ul class="tracks">
    <?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
    <?php 
    global $post;
    //$id = the_ID( $p->ID ); ?>
        <li>
            <a href="" data-src="<?php if ( get_field('sample') ) : ?><?php echo get_field('sample'); ?><?php endif; ?>" class="sm2_link">
                <?php //the_title(); ?>
            </a>
            <?php echo do_shortcode('[purchase_link class="button icon-cart" id="'. get_the_ID( $p->ID ) .'"]'); ?>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php //$post = $temp_post; // Restore the value of $post to the original ?>
<?php endif; ?>






 <?php $featured_projects = get_field('release_singles'); //Set $featured_projects to equal the array of projects from the home page repeater. ?>

    <?php if($featured_projects): ?>
    <?php global $post; ?>
        <ul class="tracks">

            <?php foreach($featured_projects as $featured_project) : //Loop through each featured project ?>
    
                <li>
                    <?php  // vars
                        $project_id = $featured_project['song']->ID; //Get the id for the current featured project 
                        $project_title = get_the_title($project_id); //set $title to be the title of the project 
                        $project_featured_images = get_field('song', $project_id); //get the repeater field of the featured images from the project post 
                        $project_sample = the_field('sample', $project_id);
                    ?>
                    <?php //$id = get_the_id( $post->ID ); ?>

                    <a href="" data-src="<?php echo $project_sample; ?>" class="sm2_link"><?php echo $project_title; ?></a>
                    <?php //echo do_shortcode('[purchase_link class="button icon-cart id="'. $id .'"]'); ?>
                </li>
                <?php wp_reset_postdata(); ?>
            <?php endforeach; ?>

      </ul>







<?php if( have_rows('release_singles') ): ?>

        <ul class="tracks">

        <?php while( have_rows('release_singles') ): the_row(); 

            // vars
            $title = get_sub_field('title');
            $id = get_sub_field('cart_id');
            $link = get_sub_field('sample');

            ?>

            <li>
                <a href="" data-src="<?php if ( $link ) : ?><?php echo $link; ?><?php endif; ?>" class="sm2_link">
                    <?php echo $title; ?>
                </a>
                <?php echo do_shortcode('[purchase_link class="button icon-cart" id="'. $id .'"]'); ?>       
            </li>

        <?php endwhile; ?>

        </ul>

    <?php endif; ?>

<?php endif; ?>






<?php 
        $rows = get_field('release_singles');
        if($rows)
        {
            echo '<ul class="tracks">';

            foreach($rows as $row)
            {
                echo '<li>';
                echo '<a href="" data-src="' . $row['sample'] . '" class="sm2_link">';
                echo $row['title'];
                echo '</a>';
                echo do_shortcode('[purchase_link class="button icon-cart" id="'. $row['cart_id'] .'"]');
                echo '</li>';
            }

            echo '</ul>';
        }

        ?>
