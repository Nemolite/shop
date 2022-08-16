<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package shop
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php if ( have_posts() ) : ?>

			<div class="product-big-title-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="product-bit-title text-center">                        
								<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
									<h2><?php woocommerce_page_title(); ?></h2>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */					
				
				//	get_template_part( 'template-parts/content', 'search' );
				
				get_template_part( 'template-parts/product', 'search' );				

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
//get_sidebar();
get_footer();
