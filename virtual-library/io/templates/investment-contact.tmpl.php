<?php
/**
 * Template Name: Investment Contact
 *
 * @package WordPress
 * @subpackage syrup
 */
get_header();
?>
<div class="gray-back">
    <div class="row align-center big-form">
        <div class="columns large-9 medium-10 small-12 vertical-pad">
            <div id="investment-contact">
                <form data-abide novalidate id="form_0011" method="post" enctype="multipart/form-data" action="//marketing.ioeducation.com/acton/forms/userSubmit.jsp" accept-charset="UTF-8" target="_blank">
                    <input type="hidden" name="ao_a" value="18553"	>
                    <input type="hidden" name="ao_f" value="0011"	>
                    <input type="hidden" name="ao_d"	value="0011:d-0001"	>
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
                				<label for="form_0011_fld_0_ln">First Name *
                					<input type="text" id="form_0011_fld_0_ln" name="First Name" required>
                					<span class="form-error">
                						Required
                					</span>
                				</label>
                			</div>
                			<div class="small-12 medium-6 columns">
                				<label for="form_0011_fld_0_ln">Last Name *
                                    <input type="text" id="form_0011_fld_0_ln" name="Last Name" required>
                					<span class="form-error">
                						Required
                					</span>
                				</label>
                			</div>
                		</div>

                        <div class="row">
                			<div class="small-12 columns">
                				<label for="form_0011_fld_0_em">E-mail *
                                    <input type="email" id="form_0011_fld_0_em" name="Email" required>
                					<span class="form-error">
                						Required
                					</span>
                				</label>
                			</div>
                		</div>

                		<div class="row">
                			<div class="small-12 medium-6 columns">
                				<label for="form_0011_fld_1_title">Title *
                                    <input type="text" id="form_0011_fld_1_title" name="Title" required>
                					<span class="form-error">
                						Required
                					</span>
                				</label>
                			</div>
                			<div class="small-12 medium-6 columns">
                				<label for="form_0011_fld_1_dept">Department *
                                    <input type="text" id="form_0011_fld_1_dept" name="Department" required>
                					<span class="form-error">
                						Required
                					</span>
                				</label>
                			</div>
                		</div>

                        <div class="row">
                			<div class="small-12 columns">
                				<label for="form_0011_fld_1_company">Organization *
                                    <input type="text" id="form_0011_fld_1_company" name="Organization" required>
                					<span class="form-error">
                						Required
                					</span>
                				</label>
                			</div>
                		</div>

                        <div class="row">
                			<div class="small-12 columns">
                				<label for="form_0011_fld_2">Students *
                                    <?php
                                    $students = (!empty($_GET['students']) ? $_GET['students'] : '');
                                    ?>
                                    <input type="text" id="form_0011_fld_2" name="Students" value="<?php echo $students; ?>" required>
                					<span class="form-error">
                						Required
                					</span>
                				</label>
                			</div>
                		</div>

                        <div class="row">
                			<div class="small-12 columns">
                				<label for="form_0011_fld_3">Buildings
                                    <?php
                                    $educator = (!empty($_GET['educator']) ? $_GET['educator'] : '');
                                    ?>
                                    <input type="number" id="form_0011_fld_3" name="Buildings" value="<?php echo $educator; ?>">
                				</label>
                			</div>
                		</div>

                        <div class="row">
                			<div class="small-12 columns">
                				<label for="form_0011_fld_4">Functional Areas
                                    <?php
                                    $operational = (!empty($_GET['operational']) ? $_GET['operational'] : '');
                                    ?>
                                    <input type="number" id="form_0011_fld_4" name="Functional Areas" value="<?php echo $operational; ?>">
                				</label>
                			</div>
                		</div>

						<div class="row">
                			<div class="small-12 columns">
                				<label for="form_0011_fld_4">Operational Buildings
                                    <?php
                                    $operationalBuildings = (!empty($_GET['operationalBuildings']) ? $_GET['operationalBuildings'] : '');
                                    ?>
                                    <input type="number" id="form_0011_fld_4" name="Operational Buildings" value="<?php echo $operationalBuildings; ?>">
                				</label>
                			</div>
                		</div>

                        <div class="row">
                			<div class="small-12 columns">
                                <?php
                                $packages = (!empty($_GET['packages']) ? $_GET['packages'] : '');
                                ?>
                				<label for="form_0011_fld_5">Shopping Cart
                                    <textarea id="form_0011_fld_5" rows="4" name="Shopping Cart"><?php echo $packages; ?></textarea>
                				</label>
                			</div>
                		</div>

                        <div class="row">
                            <div class="columns">
                                <input class="button" id="form_0011_ao_submit_input" type="submit" name="Submit" value="Submit" onClick="doPricingSubmit(document.getElementById('form_0011'))">
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
