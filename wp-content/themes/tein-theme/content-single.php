<!-- Blog Detail -->
<section class="section">
    <div class="container">
        <div class="row no-mrg">
            <div class="col-md-8">
                <article class="blog-news">
                    <div class="full-blog">
                    
                        <figure class="img-holder">
                            <?php the_post_thumbnail( 'single-post-thumbnail', ['class' => 'img-responsive'] ); ?>
                            <div class="blog-post-date">
                                <?php the_date(); ?>
                            </div>
                        </figure>
                        
                        <div class="full blog-content">
                            <div class="post-meta">By: <span class="author"><?php the_author(); ?></span> | <?php comments_number('Chưa có Comment', 'Một Comment', '% Comments' );?> </div>
                            <a href="blog-detail.html"><h2><?php the_title(); ?></h2></a>
                            <div class="blog-text">
                                <p><?php the_content(); ?></p>
                                <div class="post-meta">
                                    <?php echo custom_taxonomies_terms_links($post->ID); ?>
                                </div>
                            </div>
                            <div class="row no-mrg">
                                <div class="blog-footer-social">
                                    <span>Share <i class="fa fa-share-alt"></i></span>
                                    <ul class="list-inline social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </article>
                <?php
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>
                
            </div>
            
            <!-- Start Sidebar -->
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
                        <h4>Popular Category</h4>
                        <ul class="sidebar-list">
                            <li><a href="#">About Donation <span>(8)</span></a></li>
                            <li><a href="#">About Donation <span>(8)</span></a></li>
                            <li><a href="#">About Donation <span>(8)</span></a></li>
                            <li><a href="#">About Donation <span>(8)</span></a></li>
                            <li><a href="#">About Donation <span>(8)</span></a></li>
                            <li><a href="#">About Donation <span>(8)</span></a></li>
                        </ul>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h4>Popular Category</h4>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/blog/1.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/blog/2.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div><div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/blog/3.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                    </div>
                    
                    <div class="sidebar-widget">
                        <h4>Recent Category</h4>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/blog/1.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                        <div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/blog/2.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div><div class="blog-item">
                            <div class="post-thumb"><a href="blog-detail.html"><img src="<?php echo get_bloginfo('template_directory'); ?>/assets/img/blog/3.jpg" class="img-responsive" alt=""></a></div>
                            <a href="blog-details.html"><h4>Enim Ad Minim Veniam, Quis Nostrud Exercitation</h4></a>
                            <div class="post-info">Aug 10 2016</div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- End Start Sidebar -->
        </div>
    </div>
</section>
<!-- Blog Detail End -->