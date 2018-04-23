<?php
/**
 * @package WordPress
 * @subpackage syrup
 */
$social_menu = social_menu('footer-social');
$phone_display = get_option('syrup_settings')['syrup_settings_phonedisplay'];
$phone_link = get_option('syrup_settings')['syrup_settings_phonelink'];
$footer_email = get_option('syrup_settings')['syrup_settings_footeremail'];
if (!empty($phone_link)) {
    $phone_anchor = '<a class="phone-link" href="'.$phone_link.'">'.$phone_display.'</a>';
}
if (!empty($footer_email)) {
    $email_link = '<a class="email-link" href="mailto:'.$footer_email.'">'.$footer_email.'</a>';
}
?>

<footer id="footer">
    <div class="row text-left">
        <div class="columns">
          <span style="display:none;">
            <?php
            echo $phone_anchor;
            echo $email_link;
            ?></span>
            
            <?php
                $args = array(
                    'theme_location'  => 'footer_1_navigation',
                    'echo'            => true,
                    'container'      => '',
                    'items_wrap'      => '<ul>%3$s</ul>'
                );
                wp_nav_menu( $args );
            ?>
            
        </div>
           
        <?php
        for ($i = 2; $i <= 5; $i++) {
            echo '<div class="columns small-12 medium-6 large-expand footer-menu-wrap">';
                $args = array(
                    'theme_location'  => 'footer_'.$i.'_navigation',
                    'echo'            => true,
                    'container'      => '',
                    'items_wrap'      => '<ul>%3$s</ul>'
                );
                wp_nav_menu( $args );
            echo '</div>';
        }
        ?>
        
    </div>
   
    <div id="disclaimer">
        <div class="row align-middle">
            <div class="columns small-12 medium-6 large-3 footer-menu-wrap text-left small-order-2 medium-order-1">
                <?php
                    $args = array(
                        'theme_location'  => 'footer_badge',
                        'echo'            => true,
                        'container'      => '',
                        'items_wrap'      => '<ul>%3$s</ul>'
                    );
                    $badges = wp_get_nav_menu_items('Badges');
                    for ($i = 0; $i < count($badges); $i++) {
                        ?>
                        <a class="footer-badge" href="<?php echo $badges[$i]->url; ?>" target="_blank"><i class="fa fa-shield" aria-hidden="true"></i> <span><?php echo $badges[$i]->title; ?></span></a>
                <?php
                    }
                ?>
            </div>
            <div class="columns small-12 medium-6 large-9 text-left small-order-1 medium-order-2">
                <div class="row align-middle">
                    <div class="columns small-12 large-5 small-order-2 medium-order-2 large-order-1">
                        <p class="footer-utils">
                            <small>
                                <a title="Marketing Websites Terms of Use" href="/terms-of-use/">Terms of Use.</a>&nbsp;<a title="Privacy Policy Test" href="/privacy-policy/">Privacy Policy.</a>&nbsp;©<?php echo date("Y"); ?> <span class="hide-medium">IO Education.</span>
                            </small>
                        </p>
                    </div>
                    <div class="columns small-12 large-7 small-order-1 medium-order-1 large-order-2 footer-social-links">
                       
                        <ul id="footer-social">
                            <li id="menu-item-17396" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17396">
                                <a target="_blank" href="https://twitter.com/ioeducation">
                                    <svg viewBox="0 0 512 512"><path d="M419.6 168.6c-11.7 5.2-24.2 8.7-37.4 10.2 13.4-8.1 23.8-20.8 28.6-36 -12.6 7.5-26.5 12.9-41.3 15.8 -11.9-12.6-28.8-20.6-47.5-20.6 -42 0-72.9 39.2-63.4 79.9 -54.1-2.7-102.1-28.6-134.2-68 -17 29.2-8.8 67.5 20.1 86.9 -10.7-0.3-20.7-3.3-29.5-8.1 -0.7 30.2 20.9 58.4 52.2 64.6 -9.2 2.5-19.2 3.1-29.4 1.1 8.3 25.9 32.3 44.7 60.8 45.2 -27.4 21.4-61.8 31-96.4 27 28.8 18.5 63 29.2 99.8 29.2 120.8 0 189.1-102.1 185-193.6C399.9 193.1 410.9 181.7 419.6 168.6z"></path></svg>
                                </a>
                            </li>
                            <li id="menu-item-17395" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17395">
                                <a target="_blank" href="https://www.facebook.com/ioeducation">
                                    <svg viewBox="0 0 512 512"><path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z"></path></svg>
                                </a>
                            </li>
                            <li id="menu-item-17394" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17394">
                                <a target="_blank" href="https://www.linkedin.com/company/io-education">
                                    <svg viewBox="0 0 512 512"><path d="M186.4 142.4c0 19-15.3 34.5-34.2 34.5 -18.9 0-34.2-15.4-34.2-34.5 0-19 15.3-34.5 34.2-34.5C171.1 107.9 186.4 123.4 186.4 142.4zM181.4 201.3h-57.8V388.1h57.8V201.3zM273.8 201.3h-55.4V388.1h55.4c0 0 0-69.3 0-98 0-26.3 12.1-41.9 35.2-41.9 21.3 0 31.5 15 31.5 41.9 0 26.9 0 98 0 98h57.5c0 0 0-68.2 0-118.3 0-50-28.3-74.2-68-74.2 -39.6 0-56.3 30.9-56.3 30.9v-25.2H273.8z"></path></svg>
                                </a>
                            </li>
                            <li id="menu-item-17393" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17393">
                                <a target="_blank" href="https://plus.google.com/+Ioeducation">
                                    <svg viewBox="0 0 512 512"><path d="M179.7 237.6L179.7 284.2 256.7 284.2C253.6 304.2 233.4 342.9 179.7 342.9 133.4 342.9 95.6 304.4 95.6 257 95.6 209.6 133.4 171.1 179.7 171.1 206.1 171.1 223.7 182.4 233.8 192.1L270.6 156.6C247 134.4 216.4 121 179.7 121 104.7 121 44 181.8 44 257 44 332.2 104.7 393 179.7 393 258 393 310 337.8 310 260.1 310 251.2 309 244.4 307.9 237.6L179.7 237.6 179.7 237.6ZM468 236.7L429.3 236.7 429.3 198 390.7 198 390.7 236.7 352 236.7 352 275.3 390.7 275.3 390.7 314 429.3 314 429.3 275.3 468 275.3"></path></svg>
                                </a>
                            </li>
                            <li id="menu-item-17392" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-17392">
                                <a target="_blank" href="https://www.youtube.com/c/Ioeducation">
                                    <svg viewBox="0 0 512 512"><path d="M422.6 193.6c-5.3-45.3-23.3-51.6-59-54 -50.8-3.5-164.3-3.5-215.1 0 -35.7 2.4-53.7 8.7-59 54 -4 33.6-4 91.1 0 124.8 5.3 45.3 23.3 51.6 59 54 50.9 3.5 164.3 3.5 215.1 0 35.7-2.4 53.7-8.7 59-54C426.6 284.8 426.6 227.3 422.6 193.6zM222.2 303.4v-94.6l90.7 47.3L222.2 303.4z"></path></svg>
                                </a>
                            </li>
                        </ul>
                       

                    </div>  
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- See IO In Action Overlay -->

<div class="reveal" id="see-io-in-action" data-reveal>
    <div class="row">
        <div class="columns small-8 small-offset-2 medium-12 medium-offset-0 text-center">
            <h3><b>Are You Ready To Improve Educational Outcomes?</b></h3>
            <h5>Ask us about our products, pricing, implementation, or anything else!</h5>
        </div>
    </div>
    
    <div class="row vertical-pad-2">
        <div class="columns small-12">
            <div class="row">
                <div class="columns small-12">
                    <div class="contact-form simple-form rounded-corners-8 shadow-7">
                        <div class="form-header">
                            <h4><b>Get Started:</b></h4>
                            <hr>
                        </div>
                        <div class="form-body">
                            
                            <!--[if lte IE 8]>
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                            <![endif]-->
                            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                            <script>
                              hbspt.forms.create({ 
                                css: '',
                                portalId: '3408304',
                                formId: 'abf28666-580a-4011-859b-6157c0d2cd3a'
                              });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
    
</div>

<div class="reveal" id="get-more-info" data-reveal>
    <div class="row">
        <div class="columns small-8 small-offset-2 medium-12 medium-offset-0 text-center">
            <h3><b>Are You Ready To Improve Educational Outcomes?</b></h3>
            <h5>Ask us about our products, pricing, implementation, or anything else!</h5>
            <p><a href="/support">Need product support? click here!</a></p>
        </div>
    </div>
    
    <div class="row vertical-pad-2">
        <div class="columns small-12">
            <div class="row">
                <div class="columns small-12">
                    <div class="contact-form simple-form rounded-corners-8">
                        <div class="form-header">
                            <h4><b>Get Started:</b></h4>
                            <hr>
                        </div>
                        <div class="form-body">
                            
                            <!--[if lte IE 8]>
                                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2-legacy.js"></script>
                                <![endif]-->
                                <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/v2.js"></script>
                                <script>
                                  hbspt.forms.create({
                                    portalId: "3408304",
                                    formId: "0e769659-8d76-45f1-9ccf-f2bfc8e18c9f",
                                    css: ""
                                });
                                </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
    
</div>
