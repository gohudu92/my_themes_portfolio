<?php get_header() ?>


<?php
$terms = get_terms(array(
 'taxonomy' => 'project_skill',
 'hide_empty' => true ));
if( have_posts() ) {
  while ( have_posts() ) {
    the_post(); // adds stuff to $post ?>
    <section>
      
      <main>
        <?php the_post_thumbnail('medium'); ?>
        
        <?php //the_content() ?>
        <?php 
          if(is_page()){ ?>
            <div class="gridcontainer">

<h1 class="entry-title"><?php the_title(); ?></h1>

<?php
 foreach ($terms as $value) { ?>
 <span><a href="/project_skill/<?php echo $value->slug ?>">
 <?php echo $value->name ?>
 </a></span>
<?php } 
// Grid Parameters
$counter = 1; // Start the counter
$grids = 5; // Grids per row
$titlelength = 20; // Length of the post titles shown below the thumbnails
// The Query
$args=array (
  'post_type' => 'project',
  'posts_per_page' => -1
  );
$the_query = new WP_Query($args);
// The Loop
while ( $the_query->have_posts() ) :
  $the_query->the_post();
// Show all columns except the right hand side column
if($counter != $grids) :
?>
<div class="griditemleft">
  <div class="postimage">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
  </div><!-- .postimage -->
  <h2 class="postimage-title">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php if (mb_strlen($post->post_title) > $titlelength)
      { echo mb_substr(the_title($before = '', $after = '', FALSE), 0, $titlelength) . ' ...'; }
    else { the_title(); } ?>
    </a>
  </h2>
</div><!-- .griditemleft -->
<?php
// Show the right hand side column
elseif($counter == $grids) :
?>
<div class="griditemright">
  <div class="postimage">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('medium'); ?></a>
  </div><!-- .postimage -->
  <h2 class="postimage-title">
    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php if (mb_strlen($post->post_title) > $titlelength)
      { echo mb_substr(the_title($before = '', $after = '', FALSE), 0, $titlelength) . ' ...'; }
    else { the_title(); } ?>
    </a>
  </h2>
</div><!-- .griditemright -->

<div class="clear"></div>
<?php
$counter = 0;
endif;
$counter++;
endwhile;
wp_reset_postdata();
?>

</div><!-- .gridcontainer -->
          
        
        
      </main>
      <aside>
        <ul id="sidebar">
          <?php dynamic_sidebar('page-sidebar');?>
        </ul>
      </aside>
    </section> <?php
  }
} //else {
  //echo ':(' ;
}
 ?>

<?php get_footer() ?>
</body>
</html>
