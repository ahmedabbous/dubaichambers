<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-top" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="900">
            <div class="footer-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-secondary.svg" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/></a>
            </div>
            <div class="footer-contact">
                <p><?php _t('for_more_information_contact'); ?>: </p>
                <p><a href="mailto:DubaiChambers@Dubaichamber.com">DubaiChambers@Dubaichamber.com</a></p>
            </div>
        </div>

        <div class="footer-bottom" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1000">
            <div class="copyright"><span> <?php _t('copyright'); ?></span></div>

            <div class="social-media">
                <ul>
                    <li><a href="https://www.facebook.com/dubaichamber/" title="<?php _t('facebook'); ?>"><i class="fi-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/dubaichamber/" title="<?php _t('instagram'); ?>"><i class="fi-instagram"></i></a></li>
                    <li><a href="https://twitter.com/dubaichamber" title="<?php _t('twitter'); ?>"><i class="fi-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/company/427459?trk=tyah" title="<?php _t('linkedin'); ?>"><i class="fi-linkedin"></i></a></li>
                    <li><a href="https://www.youtube.com/user/DubaiChamberTV/featured" title="<?php _t('youtube'); ?>"><i class="fi-youtube"></i></a></li>

                </ul>
            </div>

            <div class="bootom-links">
                <ul>
                    <?php $quickLinksMenuitems = wp_get_nav_menu_items(3); ?>
                    <?php foreach ($quickLinksMenuitems as $menu) { ?>
                        <?php if ($menu->menu_item_parent == 0) { ?>
                            <li>
                                <a href="<?php echo get_permalink(get_post_meta($menu->ID, '_menu_item_object_id', true)) ?>"><?php echo get_the_title(get_post_meta($menu->ID, '_menu_item_object_id', true)) ?></a>
                            </li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
