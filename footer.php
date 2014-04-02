<div class="container" id="footer">

    <?php if (is_active_sidebar('footer_one') || is_active_sidebar('footer_two') || is_active_sidebar('footer_three') || is_active_sidebar('footer_four')) { ?>
        <div class="row" id="footer-widgets">

            <?php if (is_active_sidebar('footer_one')) { ?>
                <div class="col grid_4_of_12 footer-widget">
                    <?php dynamic_sidebar('footer_one'); ?>
                </div><!--end .col grid_4_of_12-->
            <?php } ?>

            <?php if (is_active_sidebar('footer_two')) { ?>
                <div class="col grid_4_of_12 footer-widget">
                    <?php dynamic_sidebar('footer_two'); ?>
                </div><!--end .col grid_4_of_12-->
            <?php } ?>

            <?php if (is_active_sidebar('footer_three')) { ?>
                <div class="col grid_4_of_12 footer-widget">
                    <?php dynamic_sidebar('footer_three'); ?>
                </div><!--end .col grid_4_of_12-->
            <?php } ?>

        </div><!--end .row#footer-widgets-->
    <?php } ?>

    <div class="row copyright">
        <div class="col grid_12_of_12">
            <?php if (get_theme_mod('smartshop_footer_footer_text')=='') { ?>
                 <p class="footer-des">
                     <a href="<?php $my_theme = wp_get_theme(); echo $my_theme->get( 'ThemeURI' ); ?>">
                        <?php _e('Smart Shop WordPress theme by IdeaBox','smartshop'); ?>
                     </a>
                 </p>
            <?php } else { ?>   
                 <p class="footer-des"><?php echo wpautop(get_theme_mod('smartshop_footer_footer_text')); ?></p>
            <?php } ?> 
        </div>

    </div> <!-- end .copyright --> 

</div><!--end .container#footer-->
</div> <!-- end #wrapper --> 
<div><?php wp_footer(); ?></div>

</body>
</html>
