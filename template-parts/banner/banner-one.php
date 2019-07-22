<?php

/**
 * The template for banner one
 *
 * @package GuCherry_Lite
 */

$banner_query = gucherry_blog_banner_posts_query();
if( $banner_query -> have_posts() ) {

?>
      
<section class="mastbanner gc-banner-s4">
    <div class="banner-inner">
        <div class="">
            <div class="banner-entry">
                <div class="gc-row">
                    <div class="gc-col left">
                        <div class="owl-carousel gc-banner-slider-s1 gc-banner-slider-s4">
                        <?php

                        $count = 1;

                        while( $banner_query -> have_posts() ) {

                            $banner_query -> the_post();

                            if( $count == 1 || $count > 3 ) {

                            $banner_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                            ?>
                            <div class="item">
                                  <article class="hentry">
                                    <figure class="thumb standard" style="background-image:url(<?php echo esc_url( $banner_image_url ); ?>);">
                                        <div class="post-content">
                                            <?php gucherry_blog_post_format_icons(); ?>
                                            <?php gucherry_blog_categories_meta( true ); ?>
                                            <div class="post-title">
                                                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                            </div><!-- // post-title -->
                                            <div class="entry-metas">
                                                <ul>
                                                    <?php gucherry_blog_posted_on( true ); ?>
                                                    <?php gucherry_blog_post_read_time( true ); ?>
                                                    <?php gucherry_blog_posted_by( true ); ?>
                                                    <?php gucherry_blog_comments_no_meta( true ); ?>
                                                </ul>
                                            </div><!-- // entry-metas -->
                                        </div><!-- // post-content -->
                                    </figure><!-- // thumb -->
                                 </article>
                            <!--// hentry -->
                            </div><!-- // item -->
                            <?php
                            }
                            $count++;
                        }
                        wp_reset_postdata();
                        ?>
                        </div><!-- // owl-carosel -->
                    </div><!-- // gc-col -->
                    <div class="gc-col right">
                    <?php

                    $count = 1;

                    while( $banner_query -> have_posts() ) {

                        $banner_query -> the_post();

                        if( $count > 1 && $count <= 3 ) {

                        $banner_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        ?>
                        <div class="banner-4-rel-post">
                            <article class="hentry">
                                <figure class="thumb standard" style="background-image:url(<?php echo esc_url( $banner_image_url ); ?>);">
                                    <div class="post-content">
                                        <?php gucherry_blog_post_format_icons(); ?>
                                        <?php gucherry_blog_categories_meta( true ); ?>
                                        <div class="post-title">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                        </div><!-- // post-title -->
                                    </div><!-- // post-content -->
                                </figure><!-- // thumb -->
                            </article><!--// hentry -->
                        </div><!--// banner-related post -->
                        <?php
                        }
                        $count++;
                    }
                    wp_reset_postdata();
                    ?>
                    </div><!-- // gc-col -->
                </div><!-- // gc-row -->
            </div><!-- // banner-entry -->
        </div><!-- // gc-container -->
    </div><!-- // banner-inner -->
</section><!-- // mastbanner gc-banner-s1 -->
    
<?php
}