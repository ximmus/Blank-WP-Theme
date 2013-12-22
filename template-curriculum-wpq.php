<?php

/* Template Name: Curriculum Template */ 

get_header(); ?>
	
	<!-- section -->
	<section role="main">
	
		<h1><?php the_title(); ?></h1>
	
		<?php

   	$args = array( 
   		'post_type' => 'courses', 
   		'name' 			=> 'test-course-one'
   		);

   	$category_posts = new WP_Query($args);

   	if($category_posts->have_posts()) : 
      while($category_posts->have_posts()) : 
         $category_posts->the_post();
		?>
	
		<!-- article -->
		<article>
			<h1><?php the_title() ?></h1>
    	<div class='post-content'><?php the_content() ?></div>
    </article>
		<!-- /article -->
		
		<?php
    	endwhile;
   		else: 
		?>
	
		<!-- article -->
		<article>
			
			Oops, there are no posts.
			
		</article>
		<!-- /article -->
	
		<?php
   		endif;
		?>
	
	</section>
	<!-- /section -->
	
<?php get_footer(); ?>