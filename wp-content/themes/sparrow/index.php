<?php get_header() ?>

   <!-- Page Title
   ================================================== -->
   <div id="page-title">

      <div class="row">

         <div class="ten columns centered text-center">
            <h1><?php echo carbon_get_theme_option('blog_header_title') ?><span>.</span></h1>

            <p><?php echo carbon_get_theme_option('blog_header_desc') ?></p>
         </div>

      </div>

   </div> <!-- Page Title End-->

   <!-- Content
   ================================================== -->
   <div class="content-outer">

      <div id="page-content" class="row">

         <div id="primary" class="eight columns">

            <?php if(have_posts()) : while(have_posts()) : the_post() ; 
            $category = get_the_category( );
            $category = $category[0];
            $categories = get_ancestors($category->term_id, 'category');
            array_unshift($categories, $category->term_id);
            $categories = array_reverse($categories);
            ?>
            <article class="post">

               <div class="entry-header cf">

                  <h1><a href="<?php the_permalink() ?>" title=""><?php the_title() ?></a></h1>

                  <p class="post-meta">

                     <time class="date" datetime="2014-01-14T11:24"><?php the_time( 'M j, Y' ) ?></time>
                     /
                     <span class="categories">
                     <?php foreach($categories as $key => $value) : $name = get_term($value) ?>
                        <a href="<?php echo get_category_link($value) ?>"><?php echo $name->name ?></a><?php if($value != end($categories)) : ?> / <?php endif ?>
                     <?php endforeach ?>
                     </span>

                  </p>

               </div>

               <div class="post-thumb">
                  <a href="<?php the_permalink() ?>" title=""><img src="<?php the_post_thumbnail_url('blog_thumb') ?>" alt="post-image" title="post-image"></a>
               </div>

               <div class="post-content">

                  <p><?php the_excerpt() ?></p>

               </div>

            </article> <!-- post end -->
            <?php endwhile; endif ?>

            <!-- Pagination -->
            <?php the_posts_pagination([
               'prev_text' => __('Prev', 'paginate_prev'),
               'next_text' => __('Next', 'paginate_next'),
            ]) ?>

         </div> <!-- Primary End-->

         <div id="secondary" class="four columns end">
            <aside id="sidebar">
               <?php if(carbon_get_theme_option('search_checkbox')) : ?>
               <div class="widget widget_search">
                  <?php if($title = carbon_get_theme_option('search_widget_title')) : ?><h5><?php echo $title ?></h5><?php endif ?>
                  <?php get_search_form() ?>
               </div>
               <?php endif ?>
               <?php if(carbon_get_theme_option('text_widget_checkbox')) : ?>
                  <div class="widget widget_text">
                     <?php if($title = carbon_get_theme_option('text_widget_title')) : ?><h5 class="widget-title"><?php echo $title ?></h5><?php endif ?>
                     <div class="textwidget"><?php echo carbon_get_theme_option('textarea_text_widget') ?></div>
		            </div>
               <?php endif ?>
            <?php dynamic_sidebar('blog_sidebar') ?>
            </aside>

         </div> <!-- Secondary End-->

      </div>

   </div> <!-- Content End-->

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

<?php get_footer() ?>