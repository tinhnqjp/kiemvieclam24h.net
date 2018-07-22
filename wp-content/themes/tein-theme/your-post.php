
<?php get_header(); ?>

<?php get_sidebar(); ?>

<!-- Title Header Start -->
<section class="inner-header-title" style="background-image:url(http://job365-dev.net/wp-content/uploads/2018/07/freelancer-763730_1920-1.jpg);">
    <div class="container">
        <h1>Blog Page</h1>
    </div>
</section>
<div class="clearfix"></div>
<!-- Title Header End -->

<!-- All blog List Start -->
<section class="section">
    <div class="container">
        <div class="row .no-mrg">
            <!-- Start Blogs -->
            <div class="col-md-8">
                <?php 

                $args = array(
                    'post_type' => 'your_post',
                );
                $your_loop = new WP_Query($args);


                if ($your_loop->have_posts()) : while ($your_loop->have_posts()) :
                    $your_loop->the_post();
                    $meta = get_post_meta($post->ID, 'your_fields', true); ?>
                    <h1>Title</h1>
                    <?php the_title(); ?>

                    <h1>Content</h1>
                    <?php the_content(); ?> 
                    <h1>Text Input</h1>
                    <?php echo $meta['text']; ?>

                    <h1>Textarea</h1>
                    <?php echo $meta['textarea']; ?>

                    <h1>Checkbox</h1>
                    <?php if ( $meta['checkbox'] === 'checkbox') { ?>
                    Checkbox is checked.
                    <?php } else { ?> 
                    Checkbox is not checked. 
                    <?php } ?>

                    <h1>Select Menu</h1>
                    <p>The actual value selected.</p>
                    <?php echo $meta['select']; ?>

                    <p>Switch statement for options.</p>
                    <?php 
                        switch ( $meta['select'] ) {
                            case 'option-one':
                                echo 'Option One';
                                break;
                            case 'option-two':
                                echo 'Option Two';
                                break;
                            default:
                                echo 'No option selected';
                                break;
                        } 
                    ?>

                    <h1>Image</h1>
                    <img src="<?php echo $meta['image']; ?>">
                <!-- contents of Your Post -->

                <?php endwhile;
                endif;
                wp_reset_postdata(); ?>
            </div>
            <!-- End Blogs -->
            
            <!-- Sidebar Start -->
            <div class="col-md-4">
                <div class="blog-sidebar">
                
                    <form action="#">
                        <div class="search-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search…">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default">Go</button>
                                </span>
                            </div>
                        </div>
                    </form>
                    
                    <div class="sidebar-widget">
                        <h4>Archives</h4>
                        <ul class="sidebar-list">
                            <?php wp_get_archives('type=monthly'); ?>
                        </ul>
                    </div>
                    <div class="sidebar-widget">
                        <h4>About</h4>
                        <p><?php the_author_meta('description'); ?> </p>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h4>Popular Category</h4>
                        <ul class="sidebar-list">
                            <?php wp_list_pages('&title_li='); ?>
                        </ul>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h4>Popular Category</h4>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="assets/img/blog/1.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="assets/img/blog/2.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div><div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="assets/img/blog/3.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h4>Recent Category</h4>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="assets/img/blog/1.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="assets/img/blog/2.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div><div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="assets/img/blog/3.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- End Sidebar Start -->
        </div>
        <div class="row">
            <ul class="pagination">
                <li><a href="#">&laquo;</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li> 
                <li><a href="#">4</a></li> 
                <li><a href="#"><i class="fa fa-ellipsis-h"></i></a></li> 
                <li><a href="#">&raquo;</a></li> 
            </ul>
        </div>
    </div>
</section>
<!-- All Blog List End -->

<?php get_footer(); ?>