<section>
    <h3>SECTION POUR AFFICHER DES BOUCLES MULTIPLES</h3>
</section>

<section>
    <h3>FORMATIONS</h3>
    <!-- ON VA FAIRE UNE BOUCLE MULTIPLE AVEC WORPRESS -->
    <div class="ligne formations">
        <!-- ON FILTRE AVEC LE slug DE LA CATEGORIE category_name=formations -->
        <?php $my_formations = new WP_Query('category_name=formations'); ?>

        <?php while ($my_formations->have_posts()) : $my_formations->the_post(); ?>
            <article>
                <h4><?php echo get_post_meta(get_the_ID(), "annee", true) ?></h4>
                <!-- ATTENTION the_field EST UNE FONCTION DE ACF -->
                <h4><?php the_field('annee'); ?></h4>

                <h4><?php the_title() ?></h4>
                <?php the_post_thumbnail() ?>
                <div><?php the_content() ?></div>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</section>

<section>
    <h3>EXPERIENCES</h3>
    <!-- ON VA FAIRE UNE BOUCLE MULTIPLE AVEC WORPRESS -->
    <div class="ligne experiences">
        <!-- ON FILTRE AVEC LE slug DE LA CATEGORIE category_name=formations -->
        <?php $my_experiences = new WP_Query('category_name=experiences'); ?>

        <?php while ($my_experiences->have_posts()) : $my_experiences->the_post(); ?>
            <article>
                <h4><?php the_title() ?></h4>
                <h4>(pendant <?php the_field('nb_annees'); ?> années)</h4>
                <div><?php the_content() ?></div>
                <?php the_post_thumbnail() ?>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</section>


<section>
    <h3>COMPETENCES</h3>
    <!-- ON VA FAIRE UNE BOUCLE MULTIPLE AVEC WORPRESS -->
    <div class="ligne competences">
        <!-- ON FILTRE AVEC LE slug DE LA CATEGORIE category_name=formations -->
        <?php $my_competences = new WP_Query('category_name=competences'); ?>

        <?php while ($my_competences->have_posts()) : $my_competences->the_post(); ?>
            <article>
                <?php the_post_thumbnail() ?>
                <h4><?php the_title() ?></h4>
                <h4>niveau: <?php the_field('niveau'); ?></h4>
                <div><?php the_content() ?></div>
            </article>
        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    </div>
</section>