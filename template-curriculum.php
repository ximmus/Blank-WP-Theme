<?php

/* Template Name: Curriculum Template */ 

get_header(); ?>
	
	<!-- section -->
	<section role="main">
	   
		<h1><?php the_title(); ?></h1>

    <h2>Core Courses</h2>
    <!-- make sure to include the curriculum-function.php into functions.php -->
    <?php course_func('core_courses'); ?>

    <div style="clear: both;"></div>

    <h2>Elective Courses</h2>

    <?php course_func('elective_courses'); ?>

    <div style="clear: both;"></div>

    <h2>Cross-Cutting Courses</h2>

    <?php course_func('cross_courses'); ?>

    <div style="clear: both;"></div>

    <h2>Skills Courses</h2>

    <?php course_func('skills_courses'); ?>
 
  </section>
  <!-- /section -->

<h4><?php edit_post_link(); ?></h4>
	
<?php get_footer(); ?>
