<?php get_header();

  if(have_posts()) {

    while( have_posts() ) {
        the_post();
        
        the_content(); 
    }
  }
?>

<main class="p-4 flex-grow">

      <div class="generic-content">
      </div>
    </div>
</main>

<?php  get_footer(); ?>

