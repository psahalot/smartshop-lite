<?php
/**
 *  Front page sidebars for 
 * 
 *  Home Featured
 *  Home CTA
 *  Home #1, Home #2 and Home #3
 */
// Check if home featured sidebar is active. Yes, then output the relevant HTML else exit. 

if (is_active_sidebar('home-featured')) {
    ?>

    <div id="home-featured-area" class="container" >

        <div class="row" id="featured-widgets">

            <div class="col grid_12_of_12 last">

                <?php dynamic_sidebar('home-featured'); ?>

            </div>

        </div> <!--end .row --> 

    </div> <!--end .container -->

    <?php
}


// check if any of the three Home #1, #2 or #3 sidebars is active
if (is_active_sidebar('home_one') || is_active_sidebar('home_two') || is_active_sidebar('home_three')) {
    ?>
    <div id="home-widgets-area" class="container">
        <div class="row" id="home-widgets">

            <?php if (is_active_sidebar('home_one')) { ?>
            <div class="col grid_4_of_12 home-widget-one">
                <?php dynamic_sidebar('home_one'); ?>

            </div>
        <?php } ?>

        <?php if (is_active_sidebar('home_two')) { ?>

            <div class="col grid_4_of_12 home-widget-two">
                <?php dynamic_sidebar('home_two'); ?>
            </div>
        <?php } ?>

        <?php if (is_active_sidebar('home_three')) { ?>

            <div class="col grid_4_of_12 home-widget-three last">
                <?php dynamic_sidebar('home_three'); ?>
            </div>
        <?php } ?>

    </div>
</div>
<?php } 

    

// Check if home CTA sidebar is active 
if (is_active_sidebar('home_cta')) {
    ?>
    <div id="home-cta-area" class="container" >

        <div class="row" id="home-cta">

            <div class="col grid_12_of_12">
                <?php dynamic_sidebar('home_cta'); ?>
            </div>

        </div> <!--end .row --> 

    </div> <!--end .container -->
    <?php
} ?>
