<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>						
					
					<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

						<header class="entry-header">

							<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

							<div class="entry-meta">

								<?php understrap_posted_on(); ?>

							</div><!-- .entry-meta -->

						</header><!-- .entry-header -->

						<div class="page-city-image"><?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?></div>

						<div class="entry-content">

							<?php the_content(); ?>							
							
							<table class="table">
							<thead>
							<tr>
							<th>Тип недвижимости</th>
							<th>Площадь</th>
							<th>Стоимость</th>
							<th>Адрес</th>
							<th>Жилая площадь</th>
							<th>Этаж</th>
							<th>Город</th>
							</tr>
							</thead>
							<tbody>		
							<tr>
							<td><?php the_terms(get_the_ID(), 'type_property'); ?></td>
							<td><?php the_field('площадь'); ?></td>
							<td><?php the_field('стоимость'); ?></td>
							<td><?php the_field('адрес'); ?></td>
							<td><?php the_field('жилая_площадь'); ?></td>
							<td><?php the_field('этаж'); ?></td>
							<td><?php $city_id = get_field('город'); $city_obj=get_post($city_id); echo $city_obj->post_title; ?></td>
							</tr>
							</tbody>
							</table>						

							<?php
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
									'after'  => '</div>',
								)
							);
							?>

						</div><!-- .entry-content -->

						<footer class="entry-footer">

							<?php understrap_entry_footer(); ?>

						</footer><!-- .entry-footer -->

					</article><!-- #post-## -->	
					

					<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->			

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->

<?php get_footer(); ?>