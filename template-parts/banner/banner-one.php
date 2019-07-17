<?php

/**
 * The template for banner one
 *
 * @package gucherry-blog
 */

$banner_query = gucherry_blog_banner_posts_query();
if( $banner_query -> have_posts() ) {

?>
       
    <section class="mastbanner gc-banner-s1 gc-banner-s4">
        <div class="banner-inner">
            <div class="">
                <div class="banner-entry">
                    <div class="owl-carousel  gc-banner-slider-s1 gc-banner-slider-s4">
                   <?php
                    while( $banner_query -> have_posts() ) {
                        
                        $banner_query -> the_post();
                        
                        $banner_image_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                        
                        if( !empty( $banner_image_url ) ) {
                        ?>
                        <div class="item">
                            <article class="hentry">
                                <div class="banner full">
                                    <div class="gc-banner-holder" style="background-image: url(<?php echo esc_url( $banner_image_url ); ?>);">
                                        <div class="gc-container">
                                            <div class=" gc-caption-sec">
                                                <div class=" post-content">
                                                    <div class="is-post-format">
                                                        <span class="is-link">
                                                            <i class="feather icon-external-link"></i>
                                                        </span>
                                                    </div>
                                                    <div class="cate-list-4">
                                                        <?php gucherry_blog_categories_meta( true ); ?>
                                                    </div>
                                                    <div class="post-title">
                                                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    </div>
                                                <div class="gc-meta-4">
                                                    <div class="entry-metas">
                                                        <ul>
                                                            <li class="posted-time">
                                                                <span>2 months ago</span>
                                                            </li>                   
                                                             <li class="read-time">Read Time: <span>5 minutes</span></li>                    <li class="author">by 
                                                                <span class="author vcard">
                                                                    <a class="url fn n" href="http://localhost/wp-test/author/admin/">admin</a>
                                                                </span>
                                                            </li>                                  
                                                            <li class="comment">
                                                                <a href="http://localhost/wp-test/2019/05/24/anatomy-of-the-gutenberg-wordpress-editor/">
                                                                Leave a comment 
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div><!--meta-->
                                                </div>
                                                    <div class="permalink">
                                                        <a class="gc-button-primary medium" href="<?php the_permalink(); ?>"><?php echo esc_html__( 'Read More', 'gucherry-lite' ); ?></a>
                                                    </div>
                                                </div><!--post content-->
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- // gc-col -->
                            </article>
                            <!--// hentry -->
                        </div><!-- // item -->
                        <?php
                        } //end of banner image
                    } //end of while loop
                    wp_reset_postdata();
                    ?>
                    </div><!-- // owl-carosel -->
                </div><!-- // banner-entry -->
            </div><!-- // gc-container -->
        </div><!-- // banner-inner -->
    </section><!-- // mastbanner gc-banner-s1 -->
    
<?php
}