
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
        <div class="row no-mrg">
            <!-- Start Blogs -->
            <div class="col-md-8">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <!-- contents of the loop -->
                <?php get_template_part('content', get_post_format()); ?>
                
                <!-- contents of the loop -->
                <?php endwhile;
                endif; ?>
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
                            <?php wp_get_archives( 'type=monthly' ); ?>
                        </ul>
                    </div>
                    <div class="sidebar-widget">
                        <h4>Popular Category</h4>
                        <ul class="sidebar-list">
                            <?php wp_list_pages( '&title_li=' ); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Sidebar Start -->
        </div>
        <div class="row">
            <ul class="pagination">
            <li><?php next_posts_link( 'Next' ); ?></li>
            <li><?php previous_posts_link( 'Previous' ); ?></li>
            </ul>
        </div>
    </div>
</section>
<!-- All Blog List End -->

<?php get_footer(); ?>