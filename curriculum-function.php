<?php

// build the course function - takes the course section parameter 
function course_func($course_section) {
   
  // get the global meta
  global $curriculum_mb;
  global $courses_mb;

  // get the meta for the current curriculum page
  $meta = $curriculum_mb->the_meta();
      
  // loop the courses section
  foreach ($meta[$course_section] as $course) {
        
    // query the course for the given value
    $args = array(
      'post_type'   => 'courses',
      //'name'        => $course['course'],
      'meta_query' => array(
        array(
            'key'   => '_course_number', 
            'value' => $course['course']
          )
        )
    );

    $courses = new WP_Query($args);

    // loop the post
    if($courses->have_posts()) : while($courses->have_posts()) : $courses->the_post();
                
      //get the meta
      $meta = $courses_mb->the_meta();

      // variables from the course_meta
      $title        = get_the_title();
      $number       = $meta['number'];
      $credits      = $meta['credits'];
      $description  = $meta['description'];

      // print out the shortcode
      echo do_shortcode( '[courses title="' . $title . '" number="' . $number . '" credits="' . $credits . '"]' . $description . '[/courses]' );      

      endwhile; endif; } // end forearch

    // reset the post
    wp_reset_postdata();

} // end course_func ?>