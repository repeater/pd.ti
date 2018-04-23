<?php
/**
 * Template Name: Registration
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
$registration = simple_fields_fieldgroup('registration');
?>
<h1 class="hide">IO Insights Registration</h1>
<div id="registration-container">
    <div id="registration-body">
        <div class="row align-center" id="registration-body-wrapper">
            <div class="column medium-6 large-4">
                <h2 class="text-center"><?php get_template_part('partials/insights-logo-white'); ?></h2>
                <h5 class="text-center"><?php echo $registration['subheading']; ?></h5>
                <div id="registration-form-container">
                    <h3><?php echo $registration['form_title']; ?></h3>
                    <form action="https://auth.ioeducation.com/users/register" method="POST">
                        <input type="hidden" name="redirect_uri" value="http://ioeducation.com/registration">
                        <input type="hidden" name="mail_redirect_uri" value="http://ioeducation.com/">
                        <input type="hidden" name="mail_subject" value="Please confirm your new ioEducation account.">
                        <?php
                        if (!empty($_GET['message'])) {
                            ?>
                            <div class="row align-middle form-callout slide-in">
                                <div class="columns shrink">
                                    <span class="icon icon-info"></span>
                                </div>
                                <div class="columns">
                                    <h5><?php echo $_GET['message']; ?></h5>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="input-group">
                            <span class="input-group-label"><span class="icon icon-user"></span></span>
                            <input class="input-group-field" type="text" name="first_name" placeholder="First name" required>
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><span class="icon icon-user"></span></span>
                            <input class="input-group-field" type="text" name="last_name" placeholder="Last name" required>
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><span class="icon icon-envelope"></span></span>
                            <input class="input-group-field" type="email" name="email" placeholder="Email address" required>
                        </div>
                        <h6><?php echo $registration['form_disclaimer']; ?></h6>
                        <div class="text-center">
                            <input type="submit" value="<?php echo $registration['signup_button_text']; ?>" class="button white-stroke">
                        </div>
                        <div class="text-center">
                            <a href="https://insights-cmp.ioeducation.com/authredirect/"><?php echo $registration['signin_button_text']; ?></a>
                        </div>
                    </form>
                </div>
                <h4 class="text-center"><span class="icon icon-envelope"></span><a href="mailto:support@ioeducation.com"><?php echo $registration['support_text']; ?></a></h4>
            </div>
        </div>
    </div>
    <div id="registration-footer">
        <?php $options = get_option( 'syrup_settings' ); ?>
        <div class="text-center">
            <ul>
                <li>
                    <a href="<?php echo $options['syrup_settings_twitter']; ?>" target="_blank"><span class="icon icon-twitter"></span></a>
                </li>
                <li>
                    <a href="<?php echo $options['syrup_settings_facebook']; ?>" target="_blank"><span class="icon icon-facebook"></span></a>
                </li>
                <li>
                    <a href="<?php echo $options['syrup_settings_linkedin']; ?>" target="_blank"><span class="icon icon-linkedin"></span></a>
                </li>
                <li>
                    <a href="<?php echo $options['syrup_settings_googleplus']; ?>" target="_blank"><span class="icon icon-googleplus"></span></a>
                </li>
            </ul>
        </div>
        <div id="registration-copyrights">
            <div class="row">
                <div class="column">
                    <div class="text-center">
                        <small>&copy; 2016 IO Education. All Rights Reserved.  <span class="hide-for-small-only">|</span><br class="show-for-small-only">  <a href="/terms-of-service" target="_blank">Terms of Service</a>  |  <a href="/privacy-policy" target="_blank">Privacy Policy</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
