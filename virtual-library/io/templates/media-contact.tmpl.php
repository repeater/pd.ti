<?php
/**
 * Template Name: Media Contact
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<div class="gray-back">
    <div class="row align-center big-form">
        <div class="columns large-9 medium-10 small-12 vertical-pad">
            <div id="media-form">
                <form data-abide novalidate id="form_0010" method="post" enctype="multipart/form-data" action="//marketing.ioeducation.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8" target="_blank">
                    <input type="hidden" name="ao_a" value="18553"	>
                    <input type="hidden" name="ao_f" value="0010"	>
                    <input type="hidden" name="ao_d"	value="0010:d-0001"	>
                    <input type="hidden" name="ao_p" id="ao_p" value="0"	>
                    <input type="hidden" name="ao_jstzo"	id="ao_jstzo" value=""	>
                    <input type="hidden" name="ao_cuid" value=""	>
                    <input type="hidden" name="ao_srcid"	value=""	>
                    <input type="hidden" name="ao_bot"	id="ao_bot"	value="yes"	>
                    <input type="hidden" name="ao_camp"	value=""	>

                    <div id="ao_alignment_container" class="aoFormContainer" align="center">
                        <div class="row">
                            <div class="columns">
                                <div data-abide-error class="alert callout" style="display: none;">
                                    <p>There are some errors in your form.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="small-12 medium-6 columns">
                                <label for="form_0010_fld_0_fn">First Name *
                                    <input type="text" id="form_0010_fld_0_fn" name="First Name" required>
                                    <span class="form-error">
                                        Required
                                    </span>
                                </label>
                            </div>
                            <div class="small-12 medium-6 columns">
                                <label for="form_0010_fld_0_ln">Last Name *
                                    <input type="text" id="form_0010_fld_0_ln" name="Last Name" required>
                                    <span class="form-error">
                                        Required
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="small-12 columns">
                                <label for="form_0010_fld_0_em">E-mail *
                                    <input type="email" id="form_0010_fld_0_em" name="Email" required>
                                    <span class="form-error">
                                        Required
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="small-12 medium-6 columns">
                                <label for="form_0010_fld_1_1">Business Phone
                                    <input type="text" id="form_0010_fld_1_1" name="Business Phone">
                                </label>
                            </div>
                            <div class="small-12 medium-6 columns">
                                <label for="form_0010_fld_1_2">Mobile Phone
                                    <input type="text" id="form_0010_fld_1_2" name="Mobile Phone">
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="small-12 medium-6 columns">
                                <label for="form_0010_fld_2_title">Title *
                                    <input type="text" id="form_0010_fld_2_title" name="Title" required>
                                    <span class="form-error">
                                        Required
                                    </span>
                                </label>
                            </div>
                            <div class="small-12 medium-6 columns">
                                <label for="form_0010_fld_2_dept">Department *
                                    <input type="text" id="form_0010_fld_2_dept" name="Department" required>
                                    <span class="form-error">
                                        Required
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="small-12 columns">
                                <label for="form_0010_fld_2_company">District, school or organization *
                                    <input type="text" id="form_0010_fld_2_company" name="Organization" required>
                                    <span class="form-error">
                                        Required
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="small-12 columns">
                                <label for="form_0010_fld_3">How can we help you *
                                    <textarea id="form_0010_fld_3" rows="4" name="How can we help" required></textarea>
                                    <span class="form-error">
                                        Required
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="columns">
                                <input class="button" id="form_0010_ao_submit_input" type="submit" name="Submit" value="Submit" onClick="doMediaSubmit(document.getElementById('form_0010'))">
                                <input type="hidden" id="ao_form_neg_cap" name="ao_form_neg_cap" value="">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
