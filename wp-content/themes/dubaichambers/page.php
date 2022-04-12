<?php
get_header();
?>
<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        ?>
		<section class="sub-page" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="1100">
        <div class="container">
            <h2 class="main-title"><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
            
        </div>
		</div>
    <?php endwhile; ?>
<?php endif; ?>
<?php
get_footer();
