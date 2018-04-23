<div class="section testimonials-slider vertical-pad maintain">
  
    <?php if( have_rows('testimonial_slides') ): ?>
    
    <div class="row align-center">
        <div class="columns small-12">
            <div id="testimonial-slider" class="slick-slider">
            
                <?php while( have_rows('testimonial_slides') ): the_row(); 

                // vars
                $quote = get_sub_field('pull_quote');
                $atrib = get_sub_field('attribution_name');
                $creds = get_sub_field('credentials');
        
                ?>
                            
                <div class="row align-center">
                    <div class="columns small-12 medium-10 large-8 text-center medium-offset-1 large-offset-2">
                        <h4><?php echo $quote; ?></h4>
                        <?php echo '<span class="testimonial-atrib"><strong>' .$atrib. '</strong></span> &nbsp;'; ?> <?php echo '<span class="testimonial-creds"><i>' .$creds. '</i></span>'; ?>
                    </div>
                </div>

                <?php endwhile; ?>
            </div>
        </div>
    </div>
    
    <?php endif; ?>
    
</div>


  <script type="text/javascript">
    $(document).ready(function(){
      $('.testimonial-slider').slick({
        setting-name: testimonial-slider
      });
    });
  </script>
      
      
       
