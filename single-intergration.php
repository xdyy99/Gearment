<?php
get_header();
while (have_posts()) :
  the_post();
?>

  <!--Start content-->
  <?php the_content(); ?>
  <!--End content-->

<?php
endwhile;
get_footer();
?>