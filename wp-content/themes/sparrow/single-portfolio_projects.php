<?php get_header() ?>
<div id="page-title">

<div class="row">

   <div class="ten columns centered text-center">
      <h1><?php echo carbon_get_theme_option('portfolio_header_title') ?><span>.</span></h1>

      <p><?php echo carbon_get_theme_option('portfolio_header_desc') ?></p>
   </div>

</div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

<?php if(have_posts()) : while(have_posts()) : the_post() ?>
<?php $tags = get_the_terms(get_the_ID(  ), 'project_skill');
$string = [];
if($tags) {
    foreach($tags as $tag) $string[] = $tag->name;
    $string = implode(', ', $string);
}

?>
<div id="page-content" class="row portfolio">

   <section class="entry cf">

      <div id="secondary"  class="four columns entry-details">

            <h1><?php the_title() ?></h1>

            <div class="entry-description">

               <p><?php echo get_the_excerpt() ?></p>

            </div>

            <ul class="portfolio-meta-list">
                     <li><span>Date: </span><?php the_time( 'F Y' ) ?></li>
                     <?php if($client =  carbon_get_post_meta(get_the_ID(), 'project_client')) : ?>
                     <li><span>Client </span><?php echo $client ?></li>
                     <?php endif ?>
                     <?php if(is_string($string)) : ?><li><span>Skills: </span><?php echo $string ?></li><?php endif ?>
                </ul>
            <?php if($link = carbon_get_post_meta(get_the_ID(), 'project_link')) : ?>
            <a class="button" target="_blank" href="<?php echo $link ?>">View project</a>
            <?php endif ?>

      </div> <!-- secondary End-->

      <div id="primary" class="eight columns">

        <?php the_content() ?>

      </div> <!-- primary end-->

   </section> <!-- end section -->
   <ul class="post-nav cf">
       <?php
        $prevpost = get_adjacent_post( false, '', false);
        $nextpost = get_adjacent_post( false, '', true);
       ?>
       <?php if($prevpost) : ?>
         <li class="prev"><a href="<?php the_permalink($prevpost) ?>" rel="prev"><strong>Previous Entry</strong> <?php echo get_the_title($prevpost) ?></a></li>
         <?php endif ?>
         <?php if($nextpost) : ?>
          <li class="next"><a href="<?php the_permalink($nextpost) ?>" rel="next"><strong>Next Entry</strong> <?php echo get_the_title($nextpost) ?></a></li>
          <?php endif ?>
      </ul>

</div>
<?php endwhile; endif ?>

</div> <!-- content End-->

<?php 
   $desc = carbon_get_theme_option('twitter_description');
   $day = carbon_get_theme_option('twitter_last');
   $link = carbon_get_theme_option('twitter_link');
   if($desc && $day && $link) :
   ?>
   <section id="tweets">

      <div class="row">

         <div class="tweeter-icon align-center">
            <i class="fa fa-twitter"></i>
         </div>

         <ul id="twitter" class="align-center">
            <li>
               <span>
               <?php echo $desc ?>
               <a href="<?php echo $link ?>"><?php echo $link ?></a>
               </span>
               <b><a href="<?php echo $link ?>"><?php echo $day ?> Days Ago</a></b>
            </li>
            <!--
            <li>
               <span>
               This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet.
               Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum
               <a href="#">http://t.co/CGIrdxIlI3</a>
               </span>
               <b><a href="#">3 Days Ago</a></b>
            </li>
            -->
         </ul>

         <p class="align-center"><a href="<?php echo $link ?>" class="button">Follow us</a></p>

      </div>

   </section> <!-- Tweet Section End-->
   <?php endif ?>

<?php get_footer() ?>