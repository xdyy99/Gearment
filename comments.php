<?php
/*
The comments page for Bones
*/

// don't load it if you can't comment
if (post_password_required()) {
  return;
}


/************* COMMENT LAYOUT *********************/

// Comment Layout
function align_comments($comment, $args, $depth)
{
  $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call 
        ?>
        <?php
        // create variable
        $bgauthemail = get_comment_author_email();
        echo get_avatar(get_the_author_meta('ID'), 32);
        ?>
        <?php // end custom gravatar call 
        ?>
        <div class="info">
          <?php printf(__('<div class="name">%1$s</div> %2$s', 'align'), get_comment_author_link(), edit_comment_link(__('(Edit)', 'align'), '  ', '')) ?>
          <div class="date" datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars(get_comment_link($comment->comment_ID)) ?>"><?php comment_time(__('F jS, Y', 'align')); ?> </a></div>
        </div>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e('Your comment is awaiting moderation.', 'align') ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
    <?php // </li> is added by WordPress automatically 
    ?>
  <?php
}
  ?>

  <?php // You can start editing here. 
  ?>

  <?php if (have_comments()) : ?>

    <h3 id="comments-title" class="h2"><?php comments_number(__('<span>No</span> Comments', 'align'), __('<span>One</span> Comment', 'align'), __('<span>%</span> Comments', 'align')); ?></h3>

    <section class="commentlist">
      <?php
      wp_list_comments(array(
        'style'             => 'div',
        'short_ping'        => true,
        'avatar_size'       => 40,
        'callback'          => 'align_comments',
        'type'              => 'all',
        'reply_text'        => __('Reply', 'align'),
        'page'              => '',
        'per_page'          => '',
        'reverse_top_level' => null,
        'reverse_children'  => ''
      ));
      ?>
    </section>

    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
      <nav class="navigation comment-navigation" role="navigation">
        <div class="comment-nav-prev"><?php previous_comments_link(__('&larr; Previous Comments', 'align')); ?></div>
        <div class="comment-nav-next"><?php next_comments_link(__('More Comments &rarr;', 'align')); ?></div>
      </nav>
    <?php endif; ?>

    <?php if (!comments_open()) : ?>
      <p class="no-comments"><?php _e('Comments are closed.', 'align'); ?></p>
    <?php endif; ?>

  <?php endif; ?>

  <?php comment_form(); ?>