<div class="page-sub-nav hide">
    <div class="row">
        <div class="columns">
            <ul>
                <?php
                $terms = get_terms('news_type');
                foreach ($terms as $term){
                    echo '<li>';
                    echo '<a href="#term-'.$term->term_id.'" class="scroll">';
                    if ($term->name == 'News') {
                        echo 'In The News';
                    } else {
                        echo $term->name;
                    }
                    echo '</a>';
                    echo '</li>';
                }
                ?>
                <li>
                    <a href="/media-resources">Media Resources</a>
                </li>
              
            </ul>
        </div>
    </div>
</div>
