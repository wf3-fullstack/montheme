
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

        <section>
            <h3>CONTENU DE LA SECTION</h3>
            <img src="<?php echo get_theme_file_uri("/assets/img/photo.jpg") ?>" alt="">
        </section>