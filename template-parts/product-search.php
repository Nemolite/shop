<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package shop
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="container">
	<div class="row">

		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				shop_posted_on();
				shop_posted_by();
				?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

	<div class="col-md-4">
		<?php 
		//shop_post_thumbnail(); 
		//the_post_thumbnail();
		?>
		<img src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'medium', false );?>" alt="">
	</div>	<!-- class="col-md-4" -->
	<div class="col-md-8">

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

	</div>	<!-- class="col-md-8" -->

	<?php if ( 'post' === get_post_type() ) : ?>
		<footer class="entry-footer">
			<?php shop_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
	</div>	<!-- class="row" -->
</div>	<!-- class="container" -->
</article><!-- #post-<?php the_ID(); ?> -->
