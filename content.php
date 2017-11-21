<?php
/**
 * Template for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php if ( is_sticky() ) : ?>
				<hgroup>
					<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<h3 class="entry-format"><?php _e( 'Featured', 'twentyeleven' ); ?></h3>
				</hgroup>
			<?php else : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>

			<?php if ( 'post' == get_post_type() ) : ?>


   <?php if ( function_exists( 'coauthors_posts_links' ) ) {
    global $post;
        $author_id=$post->post_author;
        foreach( get_coauthors() as $coauthor ): ?>
		
	<div class="author-meta">
<?php echo get_avatar( $coauthor->user_email, '50' ); ?>
							

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
        <?php endforeach;
} ?>



			<?php endif; ?>

			<?php if ( comments_open() && ! post_password_required() ) : ?>
			<div class="comments-link">
				<?php comments_popup_link( '<span class="leave-reply">' . __( 'Reply', 'twentyeleven' ) . '</span>', _x( '1', 'comments number', 'twentyeleven' ), _x( '%', 'comments number', 'twentyeleven' ) ); ?>
			</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'twentyeleven' ) . '</span>', 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

<p class="ed_note">
<em>Editor's Note:</em> 
The views expressed here are intended to explain EPA policy. They do not change anyone's rights or obligations.  You may share this post. However, please do not change the title or the content, or remove EPA’s identity as the author. If you do make substantive changes, please do not attribute the edited title or content to EPA or the author. 
<br /> <br />
EPA's official web site is <a href="https://www.epa.gov">www.epa.gov</a>. Some links on this page may redirect users from the EPA website to specific content on a non-EPA, third-party site. In doing so, EPA is directing you only to the specific content referenced at the time of publication, not to any other content that may appear on the same webpage or elsewhere on the third-party site, or be added at a later date. 
<br /> <br />
EPA is providing this link for informational purposes only.  EPA cannot attest to the accuracy of non-EPA information provided by any third-party sites or any other linked site. EPA does not endorse any non-government websites, companies, internet applications or any policies or information expressed therein. 
</p>

		<footer class="entry-meta">
			<?php $show_sep = false; ?>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'category' ) ) : // Hide category text when not supported ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'twentyeleven' ) );
				if ( $categories_list ):
			?>
			<span class="cat-links">
				<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list );
				$show_sep = true; ?>,
				<?php twentyeleven_posted_on(); ?>
			</span>
			<?php endif; // End if categories ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'category' ) ?>
			<?php if ( is_object_in_taxonomy( get_post_type(), 'post_tag' ) ) : // Hide tag text when not supported ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'twentyeleven' ) );
				if ( $tags_list ):
				if ( $show_sep ) : ?>
			<span class="sep"> | </span>
				<?php endif; // End if $show_sep ?>
			<span class="tag-links">
				<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyeleven' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list );
				$show_sep = true; ?>
			</span>
			<?php endif; // End if $tags_list ?>
			<?php endif; // End if is_object_in_taxonomy( get_post_type(), 'post_tag' ) ?>

			<?php if ( comments_open() ) : ?>
			<?php if ( $show_sep ) : ?>
			<span class="sep"> | </span>
			<?php endif; // End if $show_sep ?>
			<span class="comments-link"><?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a reply', 'twentyeleven' ) . '</span>', __( '<b>1</b> Reply', 'twentyeleven' ), __( '<b>%</b> Replies', 'twentyeleven' ) ); ?></span>
			<?php endif; // End if comments_open() ?>

			<?php edit_post_link( __( 'Edit', 'twentyeleven' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->
