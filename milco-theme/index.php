<?php get_header(); ?>

<main style="padding: 100px 5%; text-align: center;">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
