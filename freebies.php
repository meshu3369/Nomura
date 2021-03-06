<?php
/*
  * Template Name: Template Freebies
  * */
get_header(); ?>
    <!--
      middle area
     -->
    <div class="container-fluid main_container">
         <div class="container">
             <div class="row">

                 <div class="col-sm-8 freebies_left_side">
                     <div class="row post_area">
                         <h4 class="title">Latest posts</h4>
                         <?php


                         $args = array('post_type'=>'freebies','posts_per_page' => '5');
                         // the query

                         $the_query = new WP_Query( $args );

                         ?>


                         <?php if ( $the_query->have_posts() ) : ?>

                             <!-- the loop -->
                             <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                                 $tweet = get_post_meta(get_the_ID(),'tweet',true);
                                 ?>
                                 <!--post content of freebies-->

                                 <div class="col-sm-12 single_post">
                                     <h4 class="post_title"><?php the_title(); ?></h4>
                                     <div class="content_layer">
                                         <div class="col-sm-3">
                                             <?php the_post_thumbnail('freebies-size',array('class'=>'img-responsive')) ?>

                                             <button class="btn btn-link my_btn" type="button"  data-toggle="tooltip" data-placement="right" title="<?php echo $tweet; ?>">
                                                 <span><i class="fa fa-twitter"></i></span> Tweet
                                             </button>
                                         </div>
                                         <div class="col-sm-9">
                                             <h5>Posted By <a href="#"><?php the_author(); ?></a></h5>
                                             <p>
                                                 <?php read_more(30); ?>...
                                             </p>
                                             <a href="<?php the_permalink(); ?>" target="_blank" class="post_read_more">Click Here to Read More</a>
                                         </div>
                                     </div>
                                 </div>



                             <?php endwhile; ?>
                             <!-- end of the loop -->

                             <!-- pagination here -->


                             <?php wp_reset_postdata(); ?>


                         <?php else : ?>
                             <p><?php _e( 'Sorry, No post found..' ); ?></p>
                         <?php endif;

                         ?>


                     </div> <!-- end of latest post -->



                     <br>
                     <div class="row post_area">
                         <h4 class="title">Featured posts</h4>


                         <?php


                         $args = array('post_type'=>'freebies','post_per_page' => '5','meta_key'   => 'feature_post',
                             'meta_value' => 'yes');
                         // the query
                         $the_query = new WP_Query( $args ); ?>

                         <?php if ( $the_query->have_posts() ) : ?>

                             <!-- the loop -->
                             <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                                 $tweet = get_post_meta(get_the_ID(),'tweet',true);
                                 $short = get_post_meta(get_the_ID(),'short_desc',true);
                                 ?>
                                 <!--post content of freebies-->

                                 <div class="col-sm-12 single_post">
                                     <h4 class="post_title"><?php the_title(); ?></h4>
                                     <div class="content_layer">
                                         <div class="col-sm-3">
                                             <?php the_post_thumbnail('freebies-size',array('class'=>'img-responsive')) ?>

                                             <button class="btn btn-link my_btn" type="button"  data-toggle="tooltip" data-placement="right" title="<?php echo $tweet; ?>">
                                                 <span><i class="fa fa-twitter"></i></span> Tweet
                                             </button>
                                         </div>
                                         <div class="col-sm-9">
                                             <h5>Posted By <a href="#"><?php the_author(); ?></a></h5>
                                             <p>
                                                 <?php echo $short; ?>
                                             </p>
                                             <a href="<?php the_permalink(); ?>" target="_blank" class="post_read_more">Click Here to Read More</a>
                                         </div>
                                     </div>
                                 </div>



                             <?php endwhile; ?>
                             <!-- end of the loop -->


                             <!-- pagination here -->

                             <div class="pagination">
                                 <p><a class="my_btn" href="/blog/all-freebies" >ALL POST</a></p>
                             </div>

                             <?php wp_reset_postdata(); ?>

                         <?php else : ?>
                             <p><?php _e( 'Sorry, No post found..' ); ?></p>
                         <?php endif; ?>





                     </div>
                  </div>



                 <div class="col-sm-4 freebies_right_side">
                     <?php
                       if(!dynamic_sidebar('freebies_sidebar')):
                     ?>

                     <div class="freebies_widget">
                         <img src="http://placehold.it/400x300" alt="adv1" class="img-responsive">
                     </div>

                     <div class="freebies_widget">
                         <img src="http://placehold.it/400x300" alt="adv1" class="img-responsive">
                     </div>

                     <div class="freebies_widget">
                         <img src="http://placehold.it/400x490" alt="adv1" class="img-responsive">
                     </div>

                     <div class="freebies_widget">
                         <img src="http://placehold.it/400x490" alt="adv1" class="img-responsive">
                     </div>

                           <?php
                           endif;
                           ?>



                 </div>


             </div>
         </div>
    </div>
<?php get_footer(); ?>