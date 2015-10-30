<?php
/**
 * @package tricityopenair
 */
?>

<?php get_header(); ?>

<div id="primary" class="content-area">

    <?php if (function_exists('yoast_breadcrumb')) { yoast_breadcrumb('<p id="breadcrumbs">','</p>'); } ?>

    <div class="site-content" role="main" id="content">

    <?php if ( have_posts() ) : ?>

        <?php
            // Sorts the donors posts by post title.
            global $query_string; query_posts($query_string . '&orderby=title&order=ASC');
        ?>

        <h1 id="category-title">Donors Hall of Fame</h1>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php $posttitle = get_post_field('post_title'); ?>
            <?php if ($posttitle === 'Donor Listing Introduction') : ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="entry-content">
                        <?php
                            echo apply_filters('the_content', $post->post_content);
                            $editpost =  sprintf( __('Edit This Intro' , 'a11yall') );
                            edit_post_link($editpost, '<p class="button editlink">', '</p>');
                        ?>
                    </div><!--.entry-->
                </article>
                <hr />
            <?php endif; ?>
        <?php endwhile; ?>

        <?php $isdonorlevelused = ''; ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                $donorlevel = get_post_field('donor_level');
                if ($donorlevel !== '') {
                    $isdonorlevelused .= $donorlevel;
                }
            ?>
        <?php endwhile; ?>

        <?php
            $isgold = $issilver = $isbronze = $isdonorlevelused;
            // Makes sure that no headings are displayed if no donor has been entered.
            if ($isdonorlevelused === 'Do Not List') { $isdonorlevelused = '';}
        ?>

        <?php if (strpos($isgold, 'Gold')) { echo '<div class="entry-content"><section><h3>Gold Level Donors</h3><ul>'; } ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                $posttitle = get_post_field('post_title');
                $donorlevel = get_post_field('donor_level');
                if ($posttitle !== 'Donor Listing Introduction') {
                    if ($donorlevel === 'Gold') {
                        echo '<li>'. $posttitle;
                        if (get_the_post_thumbnail()) {
                            echo '<figure>'. get_the_post_thumbnail() .'</figure>';
                        }
                        if ($post->post_content) {
                            echo apply_filters('the_content', $post->post_content);
                        }
                        echo '</li>';
                    }
                }
            ?>
        <?php endwhile; ?>
        </ul></section></div>

        <?php if (strrpos($issilver, 'Silver')) { echo '<div class="entry-content"><section><h3>Silver Level Donors</h3><ul>'; } ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                $posttitle = get_post_field('post_title');
                $donorlevel = get_post_field('donor_level');
                if ($posttitle !== 'Donor Listing Introduction') {
                    if ($donorlevel === 'Silver') {
                        echo '<li>'. $posttitle;
                        if (get_the_post_thumbnail()) {
                            echo '<figure>'. get_the_post_thumbnail() .'</figure>';
                        }
                        if ($post->post_content) {
                            echo apply_filters('the_content', $post->post_content);
                        }
                        echo '</li>';
                    }
                }
            ?>
        <?php endwhile; ?>
        </ul></section></div>

        <?php if (strrpos($isbronze, 'Bronze')) { echo '<div class="entry-content"><section><h3>Bronze Level Donors</h3><ul>'; } ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                $posttitle = get_post_field('post_title');
                $donorlevel = get_post_field('donor_level');
                if ($posttitle !== 'Donor Listing Introduction') {
                    if ($donorlevel === 'Bronze') {
                        echo '<li>'. $posttitle;
                        if (get_the_post_thumbnail()) {
                            echo '<figure>'. get_the_post_thumbnail() .'</figure>';
                        }
                        if ($post->post_content) {
                            echo apply_filters('the_content', $post->post_content);
                        }
                        echo '</li>';
                    }
                }
            ?>
        <?php endwhile; ?>
        </ul></section></div>

        <?php if ($isdonorlevelused !== '') { echo '<div class="entry-content"><section><h3>All Donations are Honored</h3><ul>'; } ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php
                $posttitle = get_post_field('post_title');
                $donorlevel = get_post_field('donor_level');
                if ($posttitle !== 'Donor Listing Introduction') {
                    if (($donorlevel !== 'Gold') && ($donorlevel !== 'Silver') && ($donorlevel !== 'Bronze')) {
                        echo '<li>'. $posttitle;
                        if (get_the_post_thumbnail()) {
                            echo '<figure>'. get_the_post_thumbnail() .'</figure>';
                        }
                        if ($post->post_content) {
                            echo apply_filters('the_content', $post->post_content);
                        }
                        echo '</li>';
                    }
                }
            ?>
        <?php endwhile; ?>
        </ul></section></div>

    <?php else : ?>
        <h1><?php _e( 'Not Found', 'a11yall' );?></h1>
        <div class="hentry">
            <p><?php _e( 'We\'re sorry.  The posts you were looking for could not be found.', 'a11yall' ); ?></p>
            <p> <?php _e( 'Perhaps using the search form below would help?', 'a11yall' ); ?> </p>
            <?php get_search_form(); ?>
    <?php endif; ?>
    </div><!--.twelve.columns-->

    <div class="four columns omega">
        <?php get_sidebar(); ?>
    </div><!--.four.columns-->
</div><!--.sixteen.columns-->

<?php get_footer(); ?>
