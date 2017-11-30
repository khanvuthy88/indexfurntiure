<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package indexfurinture
 */

get_header(); ?>
    
    <?php if (is_home() && !is_page()) { ?>
        <?php 
            $slider_posts=new WP_Query('cat=3&posts_per_page=4'); ?>
            
            <section id="home_slider">
                <div class="container">
                    <div class="row">
                        <?php while ($slider_posts->have_posts()) {
                            $slider_posts->the_post(); ?>
                             <div class="col-md-3" itemscope itemtype="http://schema.org/BlogPosting">
                                <meta itemprop="datePublished" content="<?php echo esc_attr( date( DateTime::ISO8601, get_the_time( 'U', true ) ) ); ?>">
                                <meta itemprop="dateModified" content="<?php echo esc_attr( date( DateTime::ISO8601, get_the_modified_date( 'U', true ) ) ); ?>">
                                <span itemprop="publisher" itemscope itemtype="http://schema.org/Organization">
                                    <meta itemprop="name" content="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                    <span itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
                                        <meta itemprop="url" content="<?php echo esc_url( get_site_icon_url( 512, get_avatar_url( get_the_author_meta( 'ID' ) ) ) ); ?>">
                                    </span>
                                </span>
                                <meta itemprop="author" content="<?php echo esc_attr( get_the_author() ); ?>"> 
                                <a href="<?php echo esc_url( get_the_permalink() ); ?>" title="" rel="nofollow" class="post-image post-image-left" itemprop="mainEntityOfPage">
                                    <div class="featured-thumbnail">

                                        
                                        <?php the_post_thumbnail('featured',array('title' => '')); ?>

                                        <header>
                                            <h2 class="title front-view-title" itemprop="headline"><?php the_title(); ?></h2>
                                        </header>

                                    </div>
                                </a>                               
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
                    
                   
            
    <?php } ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">

        <?php
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) : ?>
                <header>
                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                </header>

            <?php
            endif;

            /* Start the Loop */
            while ( have_posts() ) : the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', get_post_format() );

            endwhile;

            the_posts_navigation();

        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
