<div class="section title-subtitle vertical-pad-top maintain">

    <div class="row align-center">

        <div class="column small-12 large-10 text-center">

            <?php $heading = get_sub_field( "section_title" );
                if( $heading ) {
                    echo '<h2 class="section-title">' .$heading. '</h2>';
                }
            ?>

            <?php $subheading = get_sub_field( "section_subtitle" );
                if( $heading ) {
                    echo '<h4>' .$subheading. '</h4>';
                }
            ?>

        </div>

    </div>
</div>