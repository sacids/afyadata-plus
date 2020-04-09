<!-- Page content -->
<div class="page-content">
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline" style="margin-top: -25px;
            margin-bottom: -25px !important;">
                <div class="page-title d-flex">
                    <img src="<?= base_url('assets/img/CoatofArms_Lg.png') ?>"/>
                    <h4 class="pl-2">
                        <span class="font-weight-semibold text-uppercase">
                            United Republic of Tanzania<br/>
                            Ministry of health</span>
                    </h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div><!--./page-title -->

                <div class="header-elements d-none">
                    <a href="<?= site_url('auth/login') ?>" class="btn btn-labeled btn-labeled-right bg-primary">Login
                        <b><i
                                    class="icon-lock"></i></b></a>
                </div><!--./header-elements -->
            </div><!--./page-header-content -->
        </div><!-- /page header -->

        <!-- Content area -->
        <div class="content">

            <!-- Basic card -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">PoE Risk Assessment</h5>
                </div><!--./card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if ($this->session->flashdata('message') != '') {
                                echo '<div class="success_message">' . $this->session->flashdata('message') . '</div>';
                            } ?>

                            <form id="regForm" action="<?= site_url('') ?>" method="post">
                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">Traveller Information</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Surname <span style="color: red;">*</span></label>
                                                <?= form_input($surname) ?>
                                                <span style="color: red;"><?= form_error('surname'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Other Names <span style="color: red;">*</span></label>
                                                <?php echo form_input($other_names); ?>
                                                <span style="color: red;"><?= form_error('other_names'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Age <span style="color: red;">*</span></label>
                                                <?php echo form_input($age); ?>
                                                <span style="color: red;"><?= form_error('age'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Sex <span style="color: red;">*</span></label><br/>
                                                <?php
                                                $sex_options = ['' => 'Select Sex', 'M' => 'Male', 'F' => 'Female'];
                                                echo form_dropdown('sex', $sex_options, set_value('sex'), 'class="form-control"'); ?>
                                                <span style="color: red;"><?= form_error('sex'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Passport Number <span style="color: red;">*</span></label>
                                                <?php echo form_input($passport_number); ?>
                                                <span style="color: red;"><?= form_error('passport_number'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Passport Country <span style="color: red;">*</span></label>
                                                <?php echo form_input($passport_country); ?>
                                                <span style="color: red;"><?= form_error('passport_country'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Emergency Contact <span style="color: red;">*</span></label>
                                                <?php echo form_input($emergency_contact); ?>
                                                <span style="color: red;"><?= form_error('emergency_contact'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">Location where traveller either had exposure of became
                                                ill</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Village or Town </label>
                                                <?php echo form_input($village); ?>
                                                <span style="color: red;"><?= form_error('village'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>District </label>
                                                <?php echo form_input($district); ?>
                                                <span style="color: red;"><?= form_error('district'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Province or Region </label>
                                                <?php echo form_input($region); ?>
                                                <span style="color: red;"><?= form_error('region'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>From Date </label>
                                                <?php echo form_input($from_date); ?>
                                                <span style="color: red;"><?= form_error('from_date'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>To Date</label>
                                                <?php echo form_input($to_date); ?>
                                                <span style="color: red;"><?= form_error('to_date'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Did you have contact </label>
                                                <p>With a known or suspect case of Ebola, or any sick person</p>
                                                <?php
                                                echo form_radio('contact_with', 'No', TRUE, 'id="contact_with" ' . set_radio('contact_with', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('contact_with', 'Yes', NULL, 'id="contact_with" ' . set_radio('contact_with', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('contact_with', 'Unknown', NULL, 'id="contact_with" ' . set_radio('contact_with', 'Unknown'));
                                                echo '<label>Unknown</label>';
                                                ?>
                                                <span style="color: red;"><?= form_error('contact_with'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Appropriate PPE </label>
                                                <p>Did you wear appropriate personal protective equipment (PPE) during
                                                    all exposures</p>
                                                <?php
                                                echo form_radio('appropriate_ppe', 'No', TRUE, 'id="appropriate_ppe" ' . set_radio('appropriate_ppe', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('appropriate_ppe', 'Yes', NULL, 'id="appropriate_ppe" ' . set_radio('appropriate_ppe', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('appropriate_ppe', 'Unknown', NULL, 'id="appropriate_ppe" ' . set_radio('appropriate_ppe', 'Unknown'));
                                                echo '<label>Unknown</label>';
                                                ?>
                                                <span style="color: red;"><?= form_error('appropriate_ppe'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>PPE Breach</label>
                                                <p>Did you experience any breaches in PPE</p>
                                                <?php
                                                echo form_radio('ppe_breaches', 'No', TRUE, 'id="ppe_breaches" ' . set_radio('ppe_breaches', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('ppe_breaches', 'Yes', NULL, 'id="ppe_breaches" ' . set_radio('ppe_breaches', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('ppe_breaches', 'Unknown', NULL, 'id="ppe_breaches" ' . set_radio('ppe_breaches', 'Unknown'));
                                                echo '<label>Unknown</label>';
                                                ?>
                                                <span style="color: red;"><?= form_error('ppe_breaches'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Work in Lab</label>
                                                <p>Did you work in a laboratory processing body fluids of Ebola
                                                    patients</p>
                                                <?php
                                                echo form_radio('work_in_lab', 'No', TRUE, 'id="work_in_lab" ' . set_radio('work_in_lab', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('work_in_lab', 'Yes', NULL, 'id="work_in_lab" ' . set_radio('work_in_lab', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('work_in_lab', 'Unknown', NULL, 'id="work_in_lab" ' . set_radio('work_in_lab', 'Unknown'));
                                                echo '<label>Unknown</label>';
                                                ?>
                                                <span style="color: red;"><?= form_error('work_in_lab'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Biosafety measures </label>
                                                <p>Did you wear appropriate PPE and follow standard lab biosafety
                                                    precautions at all times</p>
                                                <?php
                                                echo form_radio('biosafety_measures', 'No', TRUE, 'id="biosafety_measures" ' . set_radio('biosafety_measures', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('biosafety_measures', 'Yes', NULL, 'id="biosafety_measures" ' . set_radio('biosafety_measures', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('biosafety_measures', 'Unknown', NULL, 'id="biosafety_measures" ' . set_radio('biosafety_measures', 'Unknown'));
                                                echo '<label>Unknown</label> ';
                                                ?>
                                                <span style="color: red;"><?= form_error('biosafety_measures'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Biosafety Breach </label>
                                                <p>Did you wear experience any breaches in PPE or biosafety</p>
                                                <?php
                                                echo form_radio('biosafety_breach', 'No', TRUE, 'id="biosafety_breach" ' . set_radio('biosafety_breach', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('biosafety_breach', 'Yes', NULL, 'id="biosafety_breach" ' . set_radio('biosafety_breach', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('biosafety_breach', 'Unknown', NULL, 'id="biosafety_breach" ' . set_radio('biosafety_breach', 'Unknown'));
                                                echo '<label>Unknown</label> ';
                                                ?>
                                                <span style="color: red;"><?= form_error('biosafety_breach'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Funeral Attendance</label>
                                                <p>Did you attend a funeral</p>
                                                <?php
                                                echo form_radio('funeral_attendance', 'No', TRUE, 'id="funeral_attendance" ' . set_radio('funeral_attendance', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('funeral_attendance', 'Yes', NULL, 'id="funeral_attendance" ' . set_radio('funeral_attendance', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('funeral_attendance', 'Unknown', NULL, 'id="funeral_attendance" ' . set_radio('funeral_attendance', 'Unknown'));
                                                echo '<label>Unknown</label> ';
                                                ?>
                                                <span style="color: red;"><?= form_error('funeral_attendance'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Travel Outside</label>
                                                <p>Did you attend travel outside your home or village/town</p>
                                                <?php
                                                echo form_radio('travel_outside', 'No', TRUE, 'id="travel_outside" ' . set_radio('travel_outside', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('travel_outside', 'Yes', NULL, 'id="travel_outside" ' . set_radio('travel_outside', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('travel_outside', 'Unknown', NULL, 'id="travel_outside" ' . set_radio('travel_outside', 'Unknown'));
                                                echo '<label>Unknown</label>'; ?>
                                                <span style="color: red;"><?= form_error('travel_outside'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Hospitalized</label>
                                                <p>Were you hospitalized, or did you go to a clinic or visit anyone in
                                                    the hospital</p>
                                                <?php
                                                echo form_radio('hospitalized', 'No', TRUE, 'id="hospitalized" ' . set_radio('hospitalized', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('hospitalized', 'Yes', NULL, 'id="hospitalized" ' . set_radio('hospitalized', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('hospitalized', 'Unknown', NULL, 'id="hospitalized" ' . set_radio('hospitalized', 'Unknown'));
                                                echo '<label>Unknown</label> ';
                                                ?>
                                                <span style="color: red;"><?= form_error('hospitalized'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Hospital Name </label>
                                                <?php echo form_input($hospital_name); ?>
                                                <span style="color: red;"><?= form_error('hospital_name'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Hospitalization Reason </label>
                                                <?php echo form_textarea($hospitalization_reason); ?>
                                                <span style="color: red;"><?= form_error('hospitalization_reason'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Consultation</label>
                                                <p>Did you consult a traditional or spiritual healer</p>
                                                <?php
                                                echo form_radio('consultation', 'No', TRUE, 'id="consultation" ' . set_radio('consultation', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('consultation', 'Yes', NULL, 'id="consultation" ' . set_radio('consultation', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('consultation', 'Unknown', NULL, 'id="consultation" ' . set_radio('consultation', 'Unknown'));
                                                echo '<label>Unknown</label>';
                                                ?>
                                                <span style="color: red;"><?= form_error('consultation'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Exposure Date </label>
                                                <p>Please provide date you were exposed</p>
                                                <?php echo form_input($exposure_date); ?>
                                                <span style="color: red;"><?= form_error('exposure_date'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">Clinical Signs and Symptoms</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Pain Medication</label>
                                                <p>Have you taken fever or pain reducing medicine in the last 4
                                                    hours</p>
                                                <?php
                                                echo form_radio('pain_medication', 'No', TRUE, 'id="pain_medication" ' . set_radio('pain_medication', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('pain_medication', 'Yes', NULL, 'id="pain_medication" ' . set_radio('pain_medication', 'Yes'));
                                                echo '<label>Yes</label>'; ?>
                                                <span style="color: red;"><?= form_error('pain_medication'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Symptoms</label>
                                                <p>Have you experienced any of the following symptoms today or within
                                                    the past 48 hours</p>
                                                <?php
                                                $serial = 0;
                                                if (isset($symptoms) && $symptoms) {
                                                    foreach ($symptoms as $symptom) { ?>
                                                        <input type="checkbox" name="symptoms[]"
                                                               value="<?= $symptom->id; ?>" <?= set_checkbox('symptoms[]', $symptom->id); ?>>&nbsp;
                                                        <label><?= $symptom->name; ?></label><br/>
                                                        <?php
                                                        $serial++;
                                                    }
                                                } ?>
                                                <span style="color: red;"><?= form_error('pain_medication'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">Other Symptoms</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Unexplained bleeding</label>
                                                <p>Please specify</p>
                                                <?php echo form_input($unexplained_bleeding); ?>
                                                <span style="color: red;"><?= form_error('unexplained_bleeding'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Other Hemorrhagic Symptoms</label>
                                                <p>Please specify</p>
                                                <?php echo form_input($hemorrhagic_symptoms); ?>
                                                <span style="color: red;"><?= form_error('hemorrhagic_symptoms'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Other Non Hemorrhagic Symptoms</label>
                                                <p>Please specify</p>
                                                <?php echo form_input($non_hemorrhagic_symptoms); ?>
                                                <span style="color: red;"><?= form_error('non_hemorrhagic_symptoms'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="row" style="overflow:auto;">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <!--                                            <button type="button" class="btn btn-primary btn-xs" id="prevBtn"-->
                                            <!--                                                    onclick="nextPrev(-1)">Previous-->
                                            <!--                                            </button>-->
                                            <!--                                            <button type="submit" class="btn btn-warning btn-xs" id="nextBtn">Next-->
                                            <!--                                            </button>-->

                                            <?php echo form_submit('submit', 'Submit', 'class="btn btn-primary btn-xs"'); ?>
                                        </div>
                                    </div>
                                </div>
                            </form><!--./form -->
                        </div><!--./col-lg-12-->
                    </div><!--./row -->
                </div><!--./card-body -->
            </div><!-- /basic card -->
        </div><!-- /content area -->

        <script type="text/javascript">
            //            var currentTab = 0; // Current tab is set to be the first tab (0)
            //            showTab(currentTab); // Display the current tab
            //
            //            function showTab(n) {
            //                // This function will display the specified tab of the form ...
            //                var x = document.getElementsByClassName("tab");
            //                x[n].style.display = "block";
            //                // ... and fix the Previous/Next buttons:
            //                if (n === 0) {
            //                    document.getElementById("prevBtn").style.display = "none";
            //                } else {
            //                    document.getElementById("prevBtn").style.display = "inline";
            //                }
            //                if (n === (x.length - 1)) {
            //                    document.getElementById("nextBtn").innerHTML = "Submit";
            //                } else {
            //                    document.getElementById("nextBtn").innerHTML = "Next";
            //                }
            //                // ... and run a function that displays the correct step indicator:
            //                fixStepIndicator(n)
            //            }
            //
            //            function nextPrev(n) {
            //                // This function will figure out which tab to display
            //                var x = document.getElementsByClassName("tab");
            //                // Exit the function if any field in the current tab is invalid:
            //                if (n === 1 && validateForm()) return false; //todo: return to normal state
            //                // Hide the current tab:
            //                x[currentTab].style.display = "none";
            //                // Increase or decrease the current tab by 1:
            //                currentTab = currentTab + n;
            //                // if you have reached the end of the form... :
            //                if (currentTab >= x.length) {
            //                    //...the form gets submitted:
            //                    document.getElementById("regForm").submit();
            //                    return false;
            //                }
            //                // Otherwise, display the correct tab:
            //                showTab(currentTab);
            //            }
            //
            //            function validateForm() {
            //                // This function deals with validation of the form fields
            //                var x, y, i, valid = true;
            //                x = document.getElementsByClassName("tab");
            //                y = x[currentTab].getElementsByTagName("input");
            //                // A loop that checks every input field in the current tab:
            //                for (i = 0; i < y.length; i++) {
            //                    // If a field is empty...
            //                    if (y[i].value === "") {
            //                        // add an "invalid" class to the field:
            //                        y[i].className += " invalid";
            //                        // and set the current valid status to false:
            //                        valid = false;
            //                    }
            //                }
            //                // If the valid status is true, mark the step as finished and valid:
            //                if (valid) {
            //                    document.getElementsByClassName("step")[currentTab].className += " finish";
            //                }
            //                return valid; // return the valid status
            //            }
            //
            //            function fixStepIndicator(n) {
            //                // This function removes the "active" class of all steps...
            //                var i, x = document.getElementsByClassName("step");
            //                for (i = 0; i < x.length; i++) {
            //                    x[i].className = x[i].className.replace(" active", "");
            //                }
            //                //... and adds the "active" class to the current step:
            //                x[n].className += " active";
            //            }
        </script>