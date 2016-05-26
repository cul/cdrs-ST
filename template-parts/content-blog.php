<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content-list clear' ); ?>>
<?php
				if ( get_field('misc_article_subtitle') != "" ) {
				$subtitle = get_field('misc_article_subtitle');
				$sub = '<span class="feed_item_subtitle">'; 
				$sub .= $subtitle; 
				$sub .= '</span>';
				}
				if ( in_category( 'reviews' )) {
				$catname = 'Features: Reviews';
				$catlink = get_category_link( '12' );
				} elseif ( in_category( 'events' )) {
				$catname = 'Features: Events';
				$catlink = get_category_link( '3' );
				} elseif ( in_category( 'poetry' )) {
				$catname = 'Features: Poetry';
				$catlink = get_category_link( '2569' );
				} elseif ( in_category( 'interviews' )) {
				$catname = 'Features: Interviews';
				$catlink = get_category_link( '30' );
				} else {
				$catname = 'Features';
				$catlink = get_permalink( get_option('page_for_posts' ) );
				}
?>
	<header class="entry-header">
		<h2 class="content-list-title entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?><?php echo $sub; ?></a></h2>
		
			<span class="feed_item_cat"><?php the_author_posts_link(); ?></span>
		
	</header><!-- .entry-header -->

<?php	if( has_post_thumbnail() ) {  ?>
	<div class="content-list-thumb">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
		<?php the_post_thumbnail('feed-image'); ?>
		</a>
	</div>

	<div class="entry-content entry-content-float">
<?php } else { ?>
	<div class="entry-content">
<?php } ?>
	
		<?php
			/* translators: %s: Name of current post */
			the_excerpt( sprintf(
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
				get_the_title()
			) );

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

				<span class="feed_item_details">
				<span class="feed_item_author"><time class="feed_item_date" datetime=""><?php the_time('F j, Y'); ?></time><?php if ( !is_tax( 'periscope_topic' ) ) { ?> | <a href="<?php echo esc_url( $catlink ); ?>"><?php echo $catname; ?></a>
				<?php } ?></span>

	</div><!-- .entry-content -->

</article><!-- #post-## -->
