<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod('understrap_container_type');
?>

<?php if (is_front_page() && is_home()): ?>
	<?php get_template_part('global-templates/hero');?>
<?php endif;?>

<div class="wrapper" id="index-wrapper">

	<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part('global-templates/left-sidebar-check');?>

			<main class="site-main" id="main">

				<h2>Недвижимость</h2>

				<?php
				$lastposts = get_posts(array(
				    'numberposts' => 5000,
				    'orderby'     => 'date',
				    'post_type'   => 'property',
				));

				if ($lastposts): ?>
				<table class="table">
				<thead>
				<tr>
				<th>Объект</th>
				<th>Тип недвижимости</th>
				<th>Описание</th>
				<th>Фото</th>
				<th>Площадь</th>
				<th>Стоимость</th>
				<th>Адрес</th>
				<th>Жилая площадь</th>
				<th>Этаж</th>
				<th>Город</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($lastposts as $post):
				    setup_postdata($post);?>
						<tr>
						<td><a href="<?php the_permalink();?>"><?php the_title();?></a></td>
						<td><?php the_terms(get_the_ID(), 'type_property');?></td>
						<td><?php the_content();?></td>
						<td><?php if (has_post_thumbnail()) { ?>
						<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >
						<?php the_post_thumbnail(array(150, 150));?>
						</a>
						<?php } ?></td>
						<td><?php the_field('площадь');?></td>
						<td><?php the_field('стоимость');?></td>
						<td><?php the_field('адрес');?></td>
						<td><?php the_field('жилая_площадь');?></td>
						<td><?php the_field('этаж');?></td>
						<td><?php $city_id = get_field('город');
				   		$city_obj = get_post($city_id);
				    	echo $city_obj->post_title; ?></td>
						</tr>
				<?php endforeach;?>
				</tbody>
				</table>
				<?php
				wp_reset_postdata();
				endif;
				?>


				<h2>Города</h2>
				<?php
				$lastposts = get_posts(array(
				    'numberposts' => 5000,
				    'orderby'     => 'date',
				    'post_type'   => 'cities',
				));
				if ($lastposts) {
				    foreach ($lastposts as $post):
				        setup_postdata($post);?>
						<h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
						  <p class="city-image"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" >
						   <?php the_post_thumbnail(array(300, 300));?>
						   </a></p>
						<?php the_excerpt();?>
					<?php
					endforeach;
					wp_reset_postdata();
				}
				?>


				<script src="/wp-content/themes/realestate/js/form.js"></script>

				<h3>Добавить недвижимость</h3>

				<form id="property-form" action="/wp-content/themes/realestate/handler-form.php">
					<p class="form-group"><label>Название объекта</label>
					<input id="input-title" type="text" class="form-control" value="" required></p>
					<p class="form-group"><label>Описание объекта</label>
					<textarea id="input-description" class="form-control"></textarea></p>
					<p class="form-group"><label>Тип недвижимости</label>
					<select id="input-type" class="form-control">
					<option option="квартира">Квартира</option>
					<option option="офис">Офис</option>
					<option option="частный дом">Частный дом</option>
					</select>
					</p>
					<p class="form-group">
					<label>Фото</label><br>
					<input type="file" id="input-image">
					</p>
					<p class="form-group"><label>Площадь</label>
					<input id="input-p" type="text" class="form-control" value="" required></p>
					<p class="form-group"><label>Стоимость</label>
					<input id="input-s" type="text" class="form-control" value="" required></p>
					<p class="form-group"><label>Адрес</label>
					<input id="input-a" type="text" class="form-control" value="" required></p>
					<p class="form-group"><label>Жилая площадь</label>
					<input id="input-g" type="text" class="form-control" value="" required></p>
					<p class="form-group"><label>Этаж</label>
					<input id="input-e" type="text" class="form-control" value="" required></p>
					<p class="form-group"><label>Город</label>
					<select id="input-city" class="form-control">
					<option value="15" selected>Москва</option>
					<option value="21">Санкт-Петербург</option>
					<option value="22">Казань</option>
					</select>
					</p>
					<p class="form-group">
					<input type="submit" class="form-submit btn btn-secondary" value="Отправить">
					</p>
				</form>

			</main><!-- #main -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #index-wrapper -->

<?php get_footer();?>