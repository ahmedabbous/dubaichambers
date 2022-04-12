<?php
$lang = get_locale();
include 'languages/language-' . $lang . '.php';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body data-gr-c-s-loaded="true" <?php body_class($lang); ?>>

<div class="loader-wrapper">
    <div class="loader">
        <div class="preloader_inner">0</div>
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>

<!-- Header -->
<header data-aos="fade-down" data-aos-duration="1200" data-aos-delay="900">
    <div class="container">
        <div class="dc-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri() ?>/assets/images/dcs-logo.svg" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>"/></a>
        </div>
        <div class="dc-right">
            <div class="dc-control">
                <div class="burger-nav burger-icons">
                    <div>
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="language">
                    <span>
                        <a href="<?php $otherLangSwitcher = (pll_current_language() == 'en') ? 'ar' : 'en';
                        $langSwitcher = pll_the_languages(array('raw' => 1));
                        echo $langSwitcher[$otherLangSwitcher]['url']; ?>" class="ar" data-bs-toggle="tooltip" title="<?php _t('go_to_language'); ?>"><?php _t('lang_switcher'); ?></a>

                    </span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="burger-slide">

    <div class="burger-herder">
        <a href="javascript:void(0)" class="buger-close"><i class="fi-circle-close"></i></a>
    </div>
    <ul class="burger-nav-list">
		 <?php if((pll_current_language() == 'en')){ ?>
        <li><a href="#Focus">Ambition in Focus</a></li>
        <li><a href="#Strategy">Dubai Chambers Strategy</a></li>
        <li><a href="#Chairman">Message From Chairman</a></li>
        <li><a href="#Members">Board Members & Advisory Councils</a></li>
		<?php }else{ ?>
		 <li><a href="#Focus">في محور الطموح</a></li>
                    <li><a href="#Strategy">استراتيجية غرف دبي</a></li>
                    <li><a href="#Chairman">رسالة رئيس مجلس الإدارة</a></li>
                    <li><a href="#Members">أعضاء مجلس الإدارة والمجالس الاستشارية</a></li>
		<?php } ?>
    </ul>


</div>


