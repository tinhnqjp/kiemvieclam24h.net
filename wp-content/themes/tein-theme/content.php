<article class="blog-news">
    <div class="short-blog">
        <figure class="img-holder">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'single-post-thumbnail', ['class' => 'img-responsive'] ); ?></a>
            <div class="blog-post-date">
                <?php the_date(); ?>
            </div>
        </figure>
        <div class="blog-content">
            <div class="post-meta">By: <span class="author"><?php the_author(); ?></span> | <?php comments_number('Chưa có Comment', 'Một Comment', '% Comments' );?> </div>
            <a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
            <div class="blog-text">
                <p><?php the_excerpt(); ?></p>
                <div class="post-meta">
                    <?php echo custom_taxonomies_terms_links($post->ID); ?>
                </div>
            </div>
        </div>
    </div>
</article>