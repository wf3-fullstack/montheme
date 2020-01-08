<section>
    <h3>CODE POUR LE TEMPLATE 1</h3>
</section>

<section>
    <!-- BOUCLE (LOOP) WORDPRESS -->
    <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <article>
            <h4><?php the_title(); ?></h4>
            <div><?php the_content(); ?></div>
        </article>
    <?php endwhile; ?>
</section>