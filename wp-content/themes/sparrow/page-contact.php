<?php get_header() ?>

<div id="page-title">

<div class="row">

   <div class="ten columns centered text-center">
      <h1><?php echo carbon_get_theme_option('contact_header_title') ?><span>.</span></h1>

      <p><?php echo carbon_get_theme_option('contact_header_desc') ?></p>
   </div>

</div>

</div> <!-- Page Title End-->

<!-- Content
================================================== -->
<div class="content-outer">

<div id="page-content" class="row page">

   <div id="primary" class="eight columns">

      <section>

        <h1><?php echo carbon_get_theme_option('contact_body_title') ?></h1>

        <p class="lead"><?php echo carbon_get_theme_option('contact_body_excerpt') ?></p>

        <p><?php echo carbon_get_theme_option('contact_body_desc') ?></p>



        <?php echo do_shortcode('[contact-form-7 id="131" title="Contact form"]') ?>

         </div>

      </section> <!-- section end -->

   </div>

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
    <?php dynamic_sidebar('contact_sidebar') ?>

    </aside>

    </div> <!-- secondary End-->

</div>

</div> <!-- Content End-->

<!-- Tweets Section
================================================== -->
<<?php 
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