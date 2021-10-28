<?php get_header() ?>
   <!-- Intro Section
   ================================================== -->
   <section id="intro">

      <!-- Flexslider Start-->
	   <div id="intro-slider" class="flexslider">

		   <ul class="slides">

			   <!-- Slide -->
               <?php
               $slides = carbon_get_theme_option('home_page_slider');
               if($slides) : foreach($slides as $slide) :
               ?>
			   <li>
				   <div class="row">
					   <div class="twelve columns">
						   <div class="slider-text">
							   <h1><?php echo $slide['title'] ?><span>.</span></h1>
							   <p><?php echo $slide['description'] ?></p>
						   </div>
                     <div class="slider-image">
                        <img src="<?php echo wp_get_attachment_url($slide['image']) ?>" alt="" />
                     </div>
					   </div>
				   </div>
			   </li>
               <?php endforeach; endif ?>

		   </ul>

	   </div> <!-- Flexslider End-->

   </section> <!-- Intro Section End-->

   <!-- Info Section
   ================================================== -->
   <?php
   $skills = carbon_get_theme_option('skills_items');
   if($skills) :
   ?>
   <section id="info">

      <div class="row">

         <div class="bgrid-quarters s-bgrid-halves">
            <?php foreach($skills as $skill) : ?>
           <div class="columns">
              <h2><?php echo $skill['title'] ?></h2>

              <p><?php echo $skill['description'] ?>
              </p>
           </div>
           <?php endforeach ?>

           </div>

      </div>

   </section>
   <?php endif ?>
   <!-- Info Section End-->

   <!-- Works Section
   ================================================== -->
   <?php
   
   $args = array( 'post_type' => 'portfolio_projects', 'posts_per_page' => 4, );
   $query = new WP_Query($args);
   if($query->have_posts()) :
   ?>
   <section id="works">

      <div class="row">

         <div class="twelve columns align-center">
            <h1>Some of our recent works.</h1>
         </div>

         <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-halves">
                <?php while($query->have_posts()): $query->the_post() ?>
                <?php $tax = get_the_terms($query->post->ID, 'project_category') ?>
    		   <div class="columns portfolio-item">
               <div class="item-wrap">
    				   <a href="<?php the_permalink() ?>">
                     <img alt="" src="<?php the_post_thumbnail_url('portfolio_thumb') ?>">
                     <div class="overlay"></div>
                     <div class="link-icon"><i class="fa fa-link"></i></div>
                  </a>
    					<div class="portfolio-item-meta">
    					   <h5><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h5>
                     <p><?php echo $tax[0]->name ?></p>
    					</div>
               </div>
    			</div>
                <?php endwhile ?>

         </div>

      </div>

   </section> <!-- Works Section End-->
   <?php endif ?>

   <!-- Journal Section
   ================================================== -->
   <?php
   
   $args = array( 'post_type' => 'post', 'posts_per_page' => 3, );
   $query = new WP_Query($args);
   if($query->have_posts()) : ?>
   <section id="journal">

      <div class="row">
         <div class="twelve columns align-center">
            <h1>Our latest posts and rants.</h1>
         </div>
      </div>

      <div class="blog-entries">

         <!-- Entry -->
         <?php while($query->have_posts()) : $query->the_post() ?>
         <article class="row entry">

            <div class="entry-header">

               <div class="permalink">
                  <a href="<?php the_permalink() ?>"><i class="fa fa-link"></i></a>
               </div>

               <div class="ten columns entry-title pull-right">
                  <h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
               </div>

               <div class="two columns post-meta end">
                  <p>
                  <time datetime="2014-01-31" class="post-date" pubdate=""><?php the_time('M j, Y') ?></time>
                  <span class="dauthor"><?php the_author() ?></span>
                  </p>
               </div>

            </div>

            <div class="ten columns offset-2 post-content">
               <p><?php echo get_the_excerpt() ?>
               <a class="more-link" href="<?php the_permalink() ?>">Read More<i class="fa fa-arrow-circle-o-right"></i></a></p>
            </div>

         </article> <!-- Entry End -->
         <?php endwhile ?>

      </div> <!-- Entries End -->

   </section> <!-- Journal Section End-->
   <?php endif ?>

   <!-- Tweets Section
   ================================================== -->
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



   <!-- footer
   ================================================== -->

<?php get_footer() ?>