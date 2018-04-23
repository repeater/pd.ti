<?php
/**
 * Template Name: Media Resources
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$statics = simple_fields_fieldgroup('media_statics');
$documents = simple_fields_fieldgroup('media_documents');
$logos = simple_fields_fieldgroup('media_logos');
$photo_categories = simple_fields_fieldgroup('media_photo_categories');
$photos = simple_fields_fieldgroup('media_photos');
$video_categories = simple_fields_fieldgroup('media_video_categories');
$videos = simple_fields_fieldgroup('media_videos');
$faq = simple_fields_fieldgroup('media_faq');
include(locate_template('partials/navigation-media.php'));
?>
<h1 class="hide">Media Resources</h1>
<div id="media-resources">
    <div id="media-documents" class="vertical-pad">
        <div class="row">
            <div class="columns">
                <h3><?php echo $statics['documents_heading']; ?></h3>
            </div>
        </div>
        <div class="row align-center">
            <div class="columns small-12 medium-10 large-8">
                <ul>
                    <?php
                    for ($i = 0; $i < count($documents); $i++) {
                        $document = $documents[$i];
                        ?>
                        <li>
                            <div class="row">
                                <div class="columns small-10 medium-11">
                                    <h4><?php echo $document['document_name']; ?></h4>
                                </div>
                                <div class="columns small-2 medium-1 align-self-middle">
                                    <a href="<?php echo $document['document_file']['url']; ?>" target="_blank"><span class="icon icon-arrow-down"></span></a>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div id="media-logos" class="vertical-pad">
        <div class="row">
            <div class="columns">
                <h3><?php echo $statics['logos_heading']; ?></h3>
            </div>
        </div>
        <div id="media-logos-container">
            <div class="row align-center">
                <div class="columns large-11">
                    <div class="row" data-equalizer data-equalize-on="medium">
                        <?php
                        for ($i = 0; $i < count($logos); $i++) {
                            if (!empty($logos[$i]['color']['image_src']['medium'][0])) {
                                $logoThumbnailArray = $logos[$i]['color'];
                            } else {
                                $logoThumbnailArray = $logos[$i]['black'];
                            }
                            $logoThumbnailImage = $logoThumbnailArray['image_src']['medium'][0];

                            if (!empty($logos[$i]['color'])) {
                                $logoColorLink = $logos[$i]['color']['url'];
                            }
                            if (!empty($logos[$i]['black'])) {
                                $logoBlackLink = $logos[$i]['black']['url'];
                            }
                            if (!empty($logos[$i]['white'])) {
                                $logoWhiteLink = $logos[$i]['white']['url'];
                            }
                            ?>
                            <div class="columns small-12 medium-6 large-4">
                                <div class="logo-image-wrapper" data-equalizer-watch>
                                    <img src="<?php echo $logoThumbnailImage; ?>" alt="<?php echo $logoThumbnailArray['metadata']['file']; ?>">
                                </div>
                                <div class="logo-image-links">
                                    <div class="expanded button-group">
                                        <?php
                                        if (!empty($logoColorLink)) {
                                            ?>
                                            <a href="<?php echo $logoColorLink; ?>" class="button" download>Full color <span class="icon icon-arrow-down"></span></a>
                                            <?php
                                        }
                                        if (!empty($logoBlackLink)) {
                                            ?>
                                            <a href="<?php echo $logoBlackLink; ?>" class="button" download>Black <span class="icon icon-arrow-down"></span></a>
                                            <?php
                                        }
                                        if (!empty($logoWhiteLink)) {
                                            ?>
                                            <a href="<?php echo $logoWhiteLink; ?>" class="button" download>White <span class="icon icon-arrow-down"></span></a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (!empty($photos)) {
        ?>
        <div id="media-photos" class="vertical-pad">
            <div class="row">
                <div class="columns">
                    <h3><?php echo $statics['photos_heading']; ?></h3>
                </div>
            </div>
            <?php
            $sorted_photos = array();

            // compile ALL folder
            $folder = array(
                'title' => 'ALL',
                'photos' => array()
            );
            for ($j = 0; $j < count($photos); $j++) {
                $photo = array(
                    'title' => $photos[$j]['title'],
                    'description' => $photos[$j]['description'],
                    'thumbnail' => $photos[$j]['file']['image_src']['medium'][0],
                    'link' => $photos[$j]['file']['url']
                );
                array_push($folder['photos'], $photo);
            }
            array_push($sorted_photos, $folder);

            // compile individual folders
            for ($i = 0; $i < count($photo_categories); $i++) {
                $folder = array(
                    'title' => $photo_categories[$i]['title'],
                    'photos' => array()
                );

                for ($j = 0; $j < count($photos); $j++) {
                    if ($photos[$j]['category_id'] == $photo_categories[$i]['id']) {
                        $photo = array(
                            'title' => $photos[$j]['title'],
                            'description' => $photos[$j]['description'],
                            'thumbnail' => $photos[$j]['file']['image_src']['medium'][0],
                            'link' => $photos[$j]['file']['url']
                        );
                        array_push($folder['photos'], $photo);
                    }
                }
                array_push($sorted_photos, $folder);
            }
            ?>
            <div id="media-photos-container">
                <div class="row collapse">
                    <div class="small-12 medium-3 columns">
                        <ul class="tabs vertical" id="photos-vert-tabs" data-tabs>
                            <?php
                            for ($i = 0; $i < count($sorted_photos); $i++) {
                                ?>
                                <li class="tabs-title<?php echo ($i == 0 ? ' is-active' : ''); ?>">
                                    <a href="#photo-panel<?php echo $i; ?>" <?php echo ($i == 0 ? 'aria-selected="true"' : ''); ?>>
                                        <?php echo $sorted_photos[$i]['title']; ?>
                                        <span class="icon icon-chevron-right"></span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="small-12 medium-8 medium-offset-1 columns">
                        <div class="tabs-content vertical" data-tabs-content="photos-vert-tabs">
                            <?php
                            for ($i = 0; $i < count($sorted_photos); $i++) {
                                ?>
                                <div class="tabs-panel<?php echo ($i == 0 ? ' is-active' : ''); ?>" id="photo-panel<?php echo $i; ?>">
                                    <div class="row small-up-1 medium-up-2 large-up-3">
                                        <?php
                                        $folder_photos = $sorted_photos[$i]['photos'];
                                        for ($j = 0; $j < count($folder_photos); $j++) {
                                            $folder_photo = $folder_photos[$j];
                                            ?>
                                            <div class="column">
                                                <div class="file-container">
                                                    <a href="<?php echo $folder_photo['link']; ?>" download>
                                                        <img src="<?php echo $folder_photo['thumbnail']; ?>" alt="<?php echo $folder_photo['title']; ?>">
                                                    </a>
                                                </div>
                                                <div class="description-container">
                                                    <h4><?php echo $folder_photo['title']; ?></h4>
                                                    <p><?php echo $folder_photo['description']; ?></p>
                                                    <a class="button white-stroke small"  href="<?php echo $folder_photo['link']; ?>" download>Download <span class="icon icon-arrow-down"></span></a>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div id="media-videos" class="vertical-pad">
        <div class="row">
            <div class="columns">
                <h3><?php echo $statics['videos_heading']; ?></h3>
            </div>
        </div>
        <?php
        $sorted_videos = array();

        // compile ALL folder
        $folder = array(
            'title' => 'ALL',
            'videos' => array()
        );
        for ($j = 0; $j < count($videos); $j++) {
            $vimeo_video = get_vimeo_html($videos[$j]['vimeo_id'], 1);
            if (!empty($vimeo_video)) {
                $video_ob = get_vimeo_html($videos[$j]['vimeo_id'], 1);
            } else {
                $video_ob = get_youtube_html($videos[$j]['youtube_id'], 1);
            }
            $video = array(
                'title' => $videos[$j]['title'],
                'description' => $videos[$j]['description'],
                'thumbnail' => $videos[$j]['thumbnail']['image_src']['medium'][0],
                'video' => $video_ob
            );
            array_push($folder['videos'], $video);
        }
        array_push($sorted_videos, $folder);

        // compile individual folders
        for ($i = 0; $i < count($video_categories); $i++) {
            $folder = array(
                'title' => $video_categories[$i]['title'],
                'videos' => array()
            );

            for ($j = 0; $j < count($videos); $j++) {
                if ($videos[$j]['category_id'] == $video_categories[$i]['id']) {
                    $vimeo_video = get_vimeo_html($videos[$j]['vimeo_id'], 1);
                    if (!empty($vimeo_video)) {
                        $video_ob = get_vimeo_html($videos[$j]['vimeo_id'], 1);
                    } else {
                        $video_ob = get_youtube_html($videos[$j]['youtube_id'], 1);
                    }
                    $video = array(
                        'title' => $videos[$j]['title'],
                        'description' => $videos[$j]['description'],
                        'thumbnail' => $videos[$j]['thumbnail']['image_src']['medium'][0],
                        'video' => $video_ob
                    );
                    array_push($folder['videos'], $video);
                }
            }
            array_push($sorted_videos, $folder);
        }
        ?>
        <div id="media-videos-container">
            <div class="row collapse">
                <div class="small-12 medium-3 columns">
                    <ul class="tabs vertical" id="videos-vert-tabs" data-tabs>
                        <?php
                        for ($i = 0; $i < count($sorted_videos); $i++) {
                            ?>
                            <li class="tabs-title<?php echo ($i == 0 ? ' is-active' : ''); ?>">
                                <a href="#video-panel<?php echo $i; ?>" <?php echo ($i == 0 ? 'aria-selected="true"' : ''); ?>>
                                    <?php echo $sorted_videos[$i]['title']; ?>
                                    <span class="icon icon-chevron-right"></span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="small-12 medium-8 medium-offset-1 columns">
                    <div class="tabs-content vertical" data-tabs-content="videos-vert-tabs">
                        <?php
                        for ($i = 0; $i < count($sorted_videos); $i++) {
                            ?>
                            <div class="tabs-panel<?php echo ($i == 0 ? ' is-active' : ''); ?>" id="video-panel<?php echo $i; ?>">
                                <div class="row small-up-1 medium-up-2 large-up-3">
                                    <?php
                                    $folder_videos = $sorted_videos[$i]['videos'];
                                    for ($j = 0; $j < count($folder_videos); $j++) {
                                        $folder_video = $folder_videos[$j];
                                        ?>
                                        <div class="column">
                                            <div class="file-container">
                                                <a class="media-video-trigger" data-video="<?php echo htmlspecialchars($folder_video['video']['iframe']); ?>" href="#">
                                                    <img src="<?php echo $folder_video['thumbnail']; ?>" alt="<?php echo $folder_video['title']; ?>">
                                                </a>
                                            </div>
                                            <div class="description-container">
                                                <h5><?php echo $folder_video['title']; ?></h5>
                                                <p><?php echo $folder_video['description']; ?></p>
                                                <a class="media-video-trigger button white-stroke small" data-video="<?php echo htmlspecialchars($folder_video['video']['iframe']); ?>" href="#">Watch Video <span class="icon icon-play"></span></a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="media-faq" class="vertical-pad">
        <div class="row">
            <div class="columns">
                <h3><?php echo $statics['faq_heading']; ?></h3>
            </div>
        </div>
        <div class="row align-center">
            <div class="columns small-12 medium-11 large-9">
                <ul class="accordion" data-accordion>
                    <?php
                    for ($i = 0; $i < count($faq); $i++) {
                        ?>
                        <li class="accordion-item<?php echo ($i == 0 ? ' is-active': ''); ?>" data-accordion-item>
                            <a href="#" class="accordion-title"><?php echo $faq[$i]['question']; ?></a>
                            <div class="accordion-content" data-tab-content>
                                <?php echo $faq[$i]['answer']; ?>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div><!-- #media-resources -->
<?php
get_footer();
?>
