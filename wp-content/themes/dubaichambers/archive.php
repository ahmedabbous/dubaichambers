<?php if ( is_post_type_archive() ) {
    $post_type = get_post_type( get_queried_object_id() );?>
    <p><strong>Subscribe to: <a href="<?php echo get_post_type_archive_link( $post_type  ); ?>feed/"><?php post_type_archive_title(); ?></a></strong></p>
<?php } ?>

