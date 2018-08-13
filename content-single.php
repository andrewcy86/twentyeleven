<?php
/**
 * The template for displaying content in the single.php template
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">		
		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php twentyeleven_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
			<h1 class="entry-title"><?php the_title(); ?></h1>

<? if ( function_exists( 'coauthors_posts_links' ) ) {
    global $post;
        $author_id=$post->post_author;
        foreach( get_coauthors() as $coauthor ): ?>

		<?php


//$avatar_url = get_wp_user_avatar( $coauthor->user_email, '50' );

//if (strpos($avatar_url, 'wp-content') !== false) {

?>
		
	<div class="author-meta">
<?php //echo get_wp_user_avatar( $coauthor->user_email, '50' ); ?>
							

  <?php

$fname = $coauthor->first_name;
$lname = $coauthor->last_name;
$title = $coauthor->description;

$full_name = '';

if( empty($fname)){
    $full_name = $lname;
} elseif( empty( $lname )){
    $full_name = $fname;
} else {
    //both first name and last name are present
    $full_name = "{$fname} {$lname}";
}

echo "<span class='name-title'>". $full_name . "<br />" . $title . "</span>"; 

?>


</div><!-- .author-meta -->
        <?php }
		endforeach;
//} 

?>

		<?php the_content(); ?>
		
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		
<p class="ed_note">
<em>Editor's Note:</em> 
The views expressed here are intended to explain EPA policy. They do not change anyone's rights or obligations.  You may share this post. However, please do not change the title or the content, or remove EPA’s identity as the author. If you do make substantive changes, please do not attribute the edited title or content to EPA or the author. 
<br /> <br />
EPA's official web site is <a href="https://www.epa.gov">www.epa.gov</a>. Some links on this page may redirect users from the EPA website to specific content on a non-EPA, third-party site. In doing so, EPA is directing you only to the specific content referenced at the time of publication, not to any other content that may appear on the same webpage or elsewhere on the third-party site, or be added at a later date. 
<br /> <br />
EPA is providing this link for informational purposes only.  EPA cannot attest to the accuracy of non-EPA information provided by any third-party sites or any other linked site. EPA does not endorse any non-government websites, companies, internet applications or any policies or information expressed therein. 
</p>


	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
			if ( '' != $tag_list ) {
				$utility_text = __( 'This entry was posted in %1$s and tagged %2$s by <a href="%6$s">%5$s</a>. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} elseif ( '' != $categories_list ) {
				$utility_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			} else {
				$utility_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'twentyeleven' );
			}

			printf(
				$utility_text,
				$categories_list,
				$tag_list,
				esc_url( get_permalink() ),
				the_title_attribute( 'echo=0' ),
				get_the_author(),
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )
			);
		?>
		<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( get_the_author_meta( 'description' ) && ( ! function_exists( 'is_multi_author' ) || is_multi_author() ) ) : // If a user has filled out their description and this is a multi-author blog, show a bio on their entries ?>
		
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
