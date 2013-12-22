<?php

/* Template Name: Curriculum Template */ 

get_header(); ?>
	
	<!-- section -->
	<section role="main">
	
		<h1><?php the_title(); ?></h1>
	
    <?php 
    // get the meta
    global $curriculum_mb;
    $curriculum_mb->the_meta();

    // loop course-courses group
    while($curriculum_mb->have_fields('core_courses')) {
        $curriculum_mb->the_value('course');
      }
    ?>
  
  </section>
  <!-- /section -->

<h4><?php edit_post_link(); ?></h4>
	
<?php get_footer(); ?>

looping
    // loop course-courses group
    while($curriculum_mb->have_fields('core_courses')) {
        $name = $curriculum_mb->the_value('course');

        $args = array(
          'post_type' => 'courses',
          'name'      => $name,
        );

        $category_posts = new WP_Query($args);

        if($category_posts->have_posts()) : 
          while($category_posts->have_posts()) : 
            $category_posts->the_post();
              
              the_title( '<h3>', '</h3>' );

          endwhile;
        endif;
    
    }
