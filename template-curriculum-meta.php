<?php

/* Template Name: Curriculum Template */ 

get_header(); ?>
  
  <!-- section -->
  <section role="main">
  
    <h1><?php the_title(); ?></h1>
  
    <?php 
    // get the meta
    global $curriculum_mb;
    $meta = $curriculum_mb->the_meta();

    foreach ($meta['core_courses'] as $course)
    {
      $name = $course['course'];

      $args = array(
          'post_type' => 'courses',
          'name'      => $name,
        );

        $courses_posts = new WP_Query($args);

        if($courses_posts->have_posts()) : 
          while($courses_posts->have_posts()) : 
            $courses_posts->the_post();
              
              the_title( '<h3>', '</h3>' );

          endwhile;
        endif;
    } // end forearch

    ?>
 
  </section>
  <!-- /section -->

<h4><?php edit_post_link(); ?></h4>
  
<?php get_footer(); ?>
