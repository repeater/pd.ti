<?php if( have_rows('benefits') ): ?>

<div class="section product-benefits-section vertical-pad">
    <div id="product-benefits">
        
        <div class="row align-center">
            <div class="columns small-12 large-10">
                
                <div class="row">

                    <?php while( have_rows('benefits') ): the_row(); 

                    // vars
                    $benefit = get_sub_field('benefit');

                    ?>

                    <div class="columns small-12 large-6">
                        <div class="benefits-container">
                            <span class="icon icon-io-logo"></span>
                            <p><?php echo $benefit; ?></p>
                        </div>
                    </div>
                    
                    <?php endwhile; ?>
                    
                </div>
                
            </div>
        </div>
        
    </div>                 
</div>

<?php endif; ?>