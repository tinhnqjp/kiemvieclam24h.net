<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('>.<! BCDOnline.net!');

if (post_password_required()) { ?>
        <p class="nocomments">Bài này muốn xem bạn phải đăng nhập.</p>
    <?php
    return;
}
?>

<div class="row no-mrg">
    <div class="comments">      
        <?php if (have_comments()) : ?>
            <div class="section-title2">
                <h3><?php comments_number('Chưa có Comment', 'Một Comment', '% Comments' );?></h3></h3>
            </div>
            <?php wp_list_comments(array('callback' => 'bcd_comment')); ?>

        <?php else : // this is displayed if there are no comments so far ?>
            <?php if (comments_open()) : ?>
                <!-- If comments are open, but there are no comments. -->
            <?php else : // comments are closed ?>
                <!-- If comments are closed. -->
                <div class="section-title2">
                    <h3>Comments đã đóng.</h3>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php if (comments_open()) : ?>
    <div class="row no-mrg">
        <div class="comments-form">
            <div class="section-title2">
                <h3><?php comment_form_title('Để lại comment của bạn', 'Trả lời cho bài %s'); ?> - <?php cancel_comment_reply_link(); ?></h3>
            </div>
            <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
                <p>Bạn phải <a href="<?php echo wp_login_url(get_permalink()); ?>">đăng nhập</a> để có thể comment.</p>
            <?php else : ?>

            <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
                <?php if (is_user_logged_in()) : ?>
                    <p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
                <?php else : ?>
                    <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" placeholder="Your Name" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?>>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <input type="email" class="form-control" placeholder="Your Email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?>>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <input type="text" class="form-control" placeholder="Your Website" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3">
                    </div>
                <?php endif; ?>
                <div class="col-md-12 col-sm-12">
                    <textarea class="form-control" placeholder="Comment" name="comment" id="comment"></textarea>
                </div>
                <button class="thm-btn btn-comment" type="submit" name="submit" >submit now</button>

                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?>
            </form>
            <?php endif; // If registration required and not logged in ?>
        </div>
    </div>
<?php endif; // if you delete this the sky will fall on your head ?>