<style>
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
        background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
        display: none;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbbbbb;
        border: none;
        border-radius: 50%;
        display: inline-block;
        opacity: 0.5;
    }

    /* Mark the active step: */
    .step.active {
        opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
        background-color: #4CAF50;
    }
</style>

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
                            MINISTRY OF HEALTH, COMMUNITY DEVELOPMENT, GENDER, ELDERLY AND CHILDREN</span>
                    </h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div><!--./page-title -->

                <div class="header-elements d-none">
                    <a href="<?= site_url('auth/login') ?>" class="btn btn-labeled btn-labeled-right bg-primary">Login
                        <b><i class="icon-lock"></i></b></a>
                </div><!--./header-elements -->
            </div><!--./page-header-content -->
        </div><!-- /page header -->

        <!-- Content area -->
        <div class="content">
            <!-- Basic card -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title text-uppercase">Traveller Surveillance Form</h5>
                </div><!--./card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if ($this->session->flashdata('message') != '') {
                                echo '<div class="success_message">' . $this->session->flashdata('message') . '</div>';
                            } ?>

                            <!-- Circles which indicates the steps of the form: -->
                            <div style="text-align:center;margin-top:10px; margin-bottom: 10px;">
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                                <span class="step"></span>
                            </div>

                            <form id="regForm" action="<?= site_url('entries') ?>" method="post">
                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title font-weight-bold">Traveller Information</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Name <span style="color: red;">*</span></label>
                                                <?= form_input($name) ?>
                                                <span style="color: red;"><?= form_error('name'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Age <span style="color: red;">*</span></label>
                                                <?php echo form_input($age); ?>
                                                <span style="color: red;"><?= form_error('age'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Sex <span style="color: red;">*</span></label><br/>
                                                <?php
                                                $sex_options = ['' => 'Select Sex', 'Male' => 'Male', 'Female' => 'Female'];
                                                echo form_dropdown('sex', $sex_options, set_value('sex'), 'class="form-control"'); ?>
                                                <span style="color: red;"><?= form_error('sex'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Nationality <span style="color: red;">*</span></label>
                                                <?php echo form_input($nationality); ?>
                                                <span style="color: red;"><?= form_error('nationality'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Passport No. <span style="color: red;">*</span></label>
                                                <?php echo form_input($passport_number); ?>
                                                <span style="color: red;"><?= form_error('passport_number'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Vessel/Flight/Vehicle Name/No <span style="color: red;">*</span></label>
                                                <?php echo form_input($flight); ?>
                                                <span style="color: red;"><?= form_error('flight'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Arrival Date </label>
                                                <?php echo form_input($arrival_date); ?>
                                                <span style="color: red;"><?= form_error('arrival_date'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Point of Entry <span style="color: red;">*</span></label>
                                                <?php echo form_input($point_of_entry); ?>
                                                <span style="color: red;"><?= form_error('point_of_entry'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Seat No. <span style="color: red;">*</span></label>
                                                <?php echo form_input($seat_no); ?>
                                                <span style="color: red;"><?= form_error('seat_no'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Purpose of Visit in Tanzania:
                                                    Resident/Tourist/Transit/Business/Other (Specify) <span
                                                            style="color: red;">*</span></label>
                                                <?php echo form_input($visiting_purpose); ?>
                                                <span style="color: red;"><?= form_error('visiting_purpose'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Duration of stay in Tanzania (days) <span
                                                            style="color: red;">*</span></label>
                                                <?php echo form_input($duration_stay); ?>
                                                <span style="color: red;"><?= form_error('duration_stay'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Employment/Work <span style="color: red;">*</span></label>
                                                <?php echo form_input($employment); ?>
                                                <span style="color: red;"><?= form_error('employment'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">Contact while in Tanzania;</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Physical/Home address </label>
                                                <?php echo form_input($address); ?>
                                                <span style="color: red;"><?= form_error('address'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Hotel Name </label>
                                                <?php echo form_input($hotel); ?>
                                                <span style="color: red;"><?= form_error('hotel'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Street/Ward/District </label>
                                                <?php echo form_input($street); ?>
                                                <span style="color: red;"><?= form_error('street'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <?php echo form_input($mobile); ?>
                                                <span style="color: red;"><?= form_error('mobile'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <?php echo form_input($email); ?>
                                                <span style="color: red;"><?= form_error('email'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Country where the journey started: </label>
                                                <?php echo form_input($country_origin); ?>
                                                <span style="color: red;"><?= form_error('country_origin'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">For the past 21 days (3 weeks) which countries have you
                                                visited?</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <?php echo form_input(['id' => 'country', 'name' => 'country', 'class' => 'form-control', 'type' => 'text']); ?>
                                                <span style="color: red;"><?= form_error('country'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                            <div class="form-group">
                                                <label>Location visited/Province</label>
                                                <?php echo form_input(['id' => 'location', 'name' => 'location', 'class' => 'form-control', 'type' => 'text']); ?>
                                                <span style="color: red;"><?= form_error('location'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                            <div class="form-group">
                                                <label>Date</label>
                                                <?php echo form_input(['id' => 'date', 'name' => 'date', 'class' => 'form-control', 'type' => 'date']); ?>
                                                <span style="color: red;"><?= form_error('date'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
                                            <div class="form-group">
                                                <label>No. of days</label>
                                                <?php echo form_input(['id' => 'days', 'name' => 'days', 'class' => 'form-control', 'type' => 'number']); ?>
                                                <span style="color: red;"><?= form_error('days'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">In the last 21 days (3 weeks) have you</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Visited/Resided in an area with cases/deaths due to
                                                    Ebola?</label><br/>
                                                <?php
                                                echo form_radio('visited_area', 'Yes', NULL, 'id="visited_area" ' . set_radio('visited_area', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('visited_area', 'No', NULL, 'id="visited_area" ' . set_radio('visited_area', 'No'));
                                                echo '<label>No</label>';
                                                ?>
                                                <span style="color: red;"><?= form_error('visited_area'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Participated in taken care of the sick person?</label><br/>
                                                <?php
                                                echo form_radio('taken_care_sick_person', 'Yes', NULL, 'id="taken_care_sick_person" ' . set_radio('taken_care_sick_person', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('taken_care_sick_person', 'No', NULL, 'id="taken_care_sick_person" ' . set_radio('taken_care_sick_person', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;'; ?>
                                                <span style="color: red;"><?= form_error('taken_care_sick_person'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Participated in the burial of dead person?</label><br/>
                                                <?php
                                                echo form_radio('participated_in_burial', 'Yes', NULL, 'id="participated_in_burial" ' . set_radio('participated_in_burial', 'Yes'));
                                                echo '<label>Yes</label> &nbsp;&nbsp;&nbsp;';

                                                echo form_radio('participated_in_burial', 'No', NULL, 'id="participated_in_burial" ' . set_radio('participated_in_burial', 'No'));
                                                echo '<label>No</label> &nbsp;&nbsp;&nbsp;'; ?>
                                                <span style="color: red;"><?= form_error('participated_in_burial'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="tab">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="title">Have you experienced the following conditions during the
                                                last 21 days (3 week)?</h6>
                                        </div><!--./col-lg-6 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
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
                                                <span style="color: red;"><?= form_error('symptoms[]'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-12 -->
                                    </div><!--./row -->

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="form-group">
                                                <label>Others (specify)</label>
                                                <?php echo form_input(['id' => 'other_symptoms', 'name' => 'other_symptoms', 'class' => 'form-control', 'type' => 'text']); ?>
                                                <span style="color: red;"><?= form_error('other_symptoms'); ?></span>
                                            </div><!--./form-group -->
                                        </div><!--./col-lg-2 -->
                                    </div><!--./row -->
                                </div><!--./tab -->

                                <div class="row" style="overflow:auto;">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-xs" id="prevBtn"
                                                    onclick="nextPrev(-1)">Previous
                                            </button>
                                            <button type="button" class="btn btn-secondary btn-xs" id="nextBtn"
                                                    onclick="nextPrev(1)">Next
                                            </button>

                                            <?php //echo form_submit('submit', 'Submit', 'class="btn btn-primary btn-xs"'); ?>
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
            var currentTab = 0; // Current tab is set to be the first tab (0)
            showTab(currentTab); // Display the current tab

            function showTab(n) {
                // This function will display the specified tab of the form ...
                var x = document.getElementsByClassName("tab");
                x[n].style.display = "block";
                // ... and fix the Previous/Next buttons:
                if (n === 0) {
                    document.getElementById("prevBtn").style.display = "none";
                } else {
                    document.getElementById("prevBtn").style.display = "inline";
                }
                if (n === (x.length - 1)) {
                    document.getElementById("nextBtn").innerHTML = "Submit";
                } else {
                    document.getElementById("nextBtn").innerHTML = "Next";
                }
                // ... and run a function that displays the correct step indicator:
                fixStepIndicator(n)
            }

            function nextPrev(n) {
                // This function will figure out which tab to display
                var x = document.getElementsByClassName("tab");
                // Exit the function if any field in the current tab is invalid:
                if (n === 1 && !validateForm()) return false;
                // Hide the current tab:
                x[currentTab].style.display = "none";
                // Increase or decrease the current tab by 1:
                currentTab = currentTab + n;
                // if you have reached the end of the form... :
                if (currentTab >= x.length) {
                    //...the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                }
                // Otherwise, display the correct tab:
                showTab(currentTab);
            }

            function validateForm() {
                // This function deals with validation of the form fields
                var x, y, i, valid = true;
                x = document.getElementsByClassName("tab");
                y = x[currentTab].getElementsByTagName("input");
                // A loop that checks every input field in the current tab:
                for (i = 0; i < y.length; i++) {
                    // If a field is empty...
                    if (y[i].value === "") {
                        // add an "invalid" class to the field:
                        y[i].className += " invalid";
                        // and set the current valid status to false:
                        valid = false;
                    }
                }
                // If the valid status is true, mark the step as finished and valid:
                if (valid) {
                    document.getElementsByClassName("step")[currentTab].className += " finish";
                }
                return valid; // return the valid status
            }

            function fixStepIndicator(n) {
                // This function removes the "active" class of all steps...
                var i, x = document.getElementsByClassName("step");
                for (i = 0; i < x.length; i++) {
                    x[i].className = x[i].className.replace(" active", "");
                }
                //... and adds the "active" class to the current step:
                x[n].className += " active";
            }
        </script>