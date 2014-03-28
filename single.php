<?php get_header(); ?>
<div id="page-header-container" class="container">
    <div class="headsection row">
        <h2 class="title"><?php the_title(); ?></h2>
        <small class="date"><?php the_time('F jS, Y'); ?></small>
    </div>
</div>
<div id="main-content-container" class="container">     
    <div id="main-content" class="row">	
    
    <div class="col grid_8_of_12">		
        <div class="content">
            <?php if (have_posts()) : ?>

                <?php while (have_posts()) : the_post(); ?>

                    <div <?php post_class(); ?>"  id="post-<?php the_ID(); ?>">

                        <?php
                        if ('' != get_the_post_thumbnail()) {
                            the_post_thumbnail();
                        }
                        ?> 
                        <?php the_content('Read the rest of this entry &raquo;'); ?>

                        <p class="postinfo">
                            <?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
                        </p>
                        
                    </div>


                <?php endwhile; ?>

            <?php else : ?>

                <div class="entry">
                    <h2 class="title">Not Found</h2>
                    <p>Sorry, but you are looking for something that isn't here.</p>
                    <?php get_search_form(); ?>
                </div><!--end .entry-->

            <?php endif; ?>

        </div><!--end .content-->


        <div class="comments">
            <?php comments_template(); ?>
        </div>
    </div><!--end .col grid_8_of_12-->

    <div class="col grid_4_of_12 last right-sidebar">
        <?php get_sidebar(); ?>
    </div><!--end .col grid_4_of_12-->		

</div><!--end .row#main-content-->
</div><!-- end #main-content-container -->

<?php get_footer(); ?>
