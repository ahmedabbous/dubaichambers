<?php
get_header();
?>
    <main>
        <h1><?php _t('404_page_not_found'); ?>.</h1>
        <p><a href="<?php echo home_url(); ?>" title="<?php _t('home_page'); ?>"> <?php _t('go_to_homepage'); ?></a></p>
    </main>
<?php
get_footer();
