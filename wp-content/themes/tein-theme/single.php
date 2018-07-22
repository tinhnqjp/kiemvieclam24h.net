
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

<?php
if (have_posts()) : while (have_posts()) : the_post();
    get_template_part('content-single', get_post_format());
endwhile;
endif;
?>

<?php get_footer(); ?>