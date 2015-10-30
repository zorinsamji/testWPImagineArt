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
            // Sorts the on mission posts by order of appearance field.
            global $query_string; query_posts($query_string . '&orderby=mission_order&order=ASC');
        ?>

        <h1 id="category-title">On Mission</h1>

        <?php while ( have_posts() ) : the_post(); ?>
            <?php $posttitle = get_post_field('post_title'); ?>
            <?php if ($posttitle === 'On Mission Category Introduction') : ?>
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

        <?php while ( have_posts() ) : the_post(); ?>
            <?php $posttitle = get_post_field('post_title'); ?>
            <?php if ($posttitle !== 'On Mission Category Introduction') : ?>
                <article <?php post_class() ?> id="post-<?php the_ID(); ?>">
                    <div class="entry-content">
                        <?php get_template_part( 'content', 'single' ); ?>
                    </div><!--.entry-->

                    <?php
                        if (comments_open()) {
                            echo '<p class="postmetadata">';
                            if (!post_password_required() AND (comments_open() OR (get_comments_number() > 0))) {
                                echo '<span class="commentlink">';
                                $one =  sprintf( __('1 Comment' , 'a11yall') );
                                $more = sprintf( __('Comments' , 'a11yall') );
                                comments_popup_link($more, $one, '% '.$more);
                                echo '</span>';
                            }
                            echo '</p>';
                        }
                    ?>
                </article>
                <hr />
            <?php endif; ?>
        <?php endwhile; ?>

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
