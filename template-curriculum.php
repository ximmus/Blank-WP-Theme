<?php

/* Template Name: Curriculum Template */ 

get_header(); ?>
	
	<!-- section -->
	<section role="main">
	
		<h1><?php the_title(); ?></h1>
	
    <?php 
    // get the global meta
    global $curriculum_mb;
    global $courses_mb;

    // get the meta for the current curriculum page
    $meta = $curriculum_mb->the_meta();
    ?>
    
    <h2>Core Courses</h2>
    <?php // loop the core courses
    foreach ($meta['core_courses'] as $course)
    {
      $course_name = $course['course'];

      $args = array(
          'post_type' => 'courses',
          'name'      => $course_name,
        );

        $courses = new WP_Query($args);

        if($courses->have_posts()) : 
          while($courses->have_posts()) : 
            $courses->the_post();
              
              //get the meta
              $meta = $courses_mb->the_meta();

              // variables from the course_meta
              $title        = get_the_title();
              $number       = $meta['number'];
              $credits      = $meta['credits'];
              $description  = $meta['description'];

              echo do_shortcode( '[courses title="' . $title . '" number="' . $number . '" credits="' . $credits . '"]' . $description . '[/courses]' );      

          endwhile;
        endif;
        wp_reset_postdata(); //reset the post
    } // end forearch
    ?>

    <div style="clear: both;"></div>

    <?php 
    // get the global meta
    global $curriculum_mb;
    global $courses_mb;

    // get the meta for the current curriculum page
    $meta = $curriculum_mb->the_meta();
    ?>

    <h2>Elective Courses</h2>
    <?php // loop the core courses
    foreach ($meta['elective_courses'] as $course)
    {
      $course_name = $course['elective_courses'];

      $args = array(
          'post_type' => 'courses',
          'name'      => $course_name,
        );

        $courses = new WP_Query($args);

        if($courses->have_posts()) : 
          while($courses->have_posts()) : 
            $courses->the_post();
              
              //get the meta
              $meta = $courses_mb->the_meta();

              // variables from the course_meta
              $title        = get_the_title();
              $number       = $meta['number'];
              $credits      = $meta['credits'];
              $description  = $meta['description'];

              echo do_shortcode( '[courses title="' . $title . '" number="' . $number . '" credits="' . $credits . '"]' . $description . '[/courses]' );      

          endwhile;
        endif;
        wp_reset_postdata();
    } // end forearch
    ?>
 
  </section>
  <!-- /section -->

<h4><?php edit_post_link(); ?></h4>
	
<?php get_footer(); ?>
