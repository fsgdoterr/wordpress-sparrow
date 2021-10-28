<?php get_header() ?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php echo carbon_get_theme_option('portfolio_header_title') ?><span>.</span></h1>

            <p><?php echo carbon_get_theme_option('portfolio_header_desc') ?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <div class="content-outer">

<div id="page-content" class="row portfolio">

   <section class="entry cf">

      <div id="secondary"  class="four columns entry-details">

         <h1><?php echo carbon_get_theme_option('portfolio_body_title') ?></h1>

         <p class="lead"><?php echo carbon_get_theme_option('portfolio_body_excerpt') ?></p>

         <p><?php echo carbon_get_theme_option('portfolio_body_desc') ?></p>

      </div> <!-- Secondary End-->

      <div id="primary" class="eight columns portfolio-list">
        <?php 
        $args = array( 'post_type' => 'portfolio_projects', 'nopaging' => true);
        $query = new WP_Query($args);
        if($query->have_posts()) :  
        ?>
         <div id="portfolio-wrapper" class="bgrid-halves cf">
                <?php $count = 1;  while($query->have_posts()) : $query->the_post() ?>
                <?php $tax = get_the_terms($query->post->ID, 'project_category') ?>
               <div class="columns portfolio-item <?php if($count%2 == 1) echo 'first' ?>">
               <div class="item-wrap">
                       <a href="<?php the_permalink() ?>">
                     <img alt="" src="<?php the_post_thumbnail_url('portfolio_mediumthumb') ?>">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
                        <div class="portfolio-item-meta">
                           <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                     <p><?php echo $tax[0]->name ?></p>
                        </div>
               </div>
                </div>
                <?php $count++; endwhile ?>

         </div>
         <?php endif ?>

      </div> <!-- primary end-->

   </section> <!-- end section -->

</div> <!-- #page-content end-->

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