<footer>

<div class="row">

   <div class="twelve columns">

      <?php wp_nav_menu(array( 
         'theme_location' => 'header_menu',
         'container' => false,
         'menu_class' => 'footer-nav',
       )) ?>
      <!-- <ul class="footer-nav">
              <li><a href="#">Home.</a></li>
            <li><a href="#">Blog.</a></li>
            <li><a href="#">Portfolio.</a></li>
            <li><a href="#">About.</a></li>
            <li><a href="#">Contact.</a></li>
         <li><a href="#">Features.</a></li>
         </ul> -->
      
      <?php $socials = carbon_get_theme_option('footer_socials_menu') ?>
      <?php if($socials) : ?>
      <ul class="footer-social">
         <?php foreach($socials as $social) : ?>
         <li><a href="<?php echo $social['link'] ?>" target="_blank"><i class="fa <?php echo $social['select'] ?>"></i></a></li>
         <?php endforeach ?>
      </ul>
      <?php endif ?>

      <ul class="copyright">
         <li>Copyright &copy; <?php echo date('Y') ?> <?php bloginfo('name') ?></li> 
         <li>Design by <a href="http://www.styleshout.com/">Styleshout</a></li>               
      </ul>

   </div>

   <div id="go-top" style="display: block;"><a title="Back to Top" href="#">Go To Top</a></div>

</div>

</footer> <!-- Footer End-->
<?php wp_footer() ?>
</body>

</html>