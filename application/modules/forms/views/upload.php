<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline" style="margin-top: -25px;
            margin-bottom: -25px !important;">
                <div class="page-title d-flex">
                    <h4><i class="icon-home4 mr-2"></i> <span class="font-weight-semibold">Forms</span></h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div><!--./page-title -->
            </div><!--./page-header-content -->
        </div><!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <!-- Basic datatable -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">Upload Form</h5>
                </div><!--./card-header -->

                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php
                            if ($this->session->flashdata('message') != '') {
                                echo '<div class="success_message">' . $this->session->flashdata('message') . '</div>';
                            } ?>

                            <?= form_open_multipart() ?>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Form Name</label>
                                        <?php echo form_input($name); ?>
                                        <span style="color: red;"><?= form_error('name'); ?></span>
                                    </div><!--./form-group -->
                                </div><!--./col-lg-6 -->
                            </div><!--./row -->

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <?php echo form_textarea($description); ?>
                                        <span style="color: red;"><?= form_error('description'); ?></span>
                                    </div><!--./form-group -->
                                </div><!--./col-lg-6 -->
                            </div><!--./row -->

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label>JSON file <span style="color: red">*</span></label>
                                        <?php echo form_upload($attachment); ?>
                                        <span style="color: red;"><?= form_error('attachment'); ?></span>
                                    </div><!--./form-group -->
                                </div><!--./col-lg-6 -->
                            </div><!--./row -->

                            <div class="row" style="overflow:auto;">
                                <div class="col-lg-12 col-12">
                                    <div class="form-group">
                                        <?= form_submit('submit', 'Upload', 'class="btn btn-primary btn-sm"'); ?>
                                        <a class="btn btn-warning btn-sm"
                                           href="<?= site_url('forms/lists') ?>">Cancel</a>
                                    </div>
                                </div>
                            </div><!--./row -->
                            <?= form_close() ?>
                        </div><!--./col-lg-12-->
                    </div><!--./row -->
                </div><!--./card-body -->
            </div><!-- /basic datatable-->
        </div><!-- /content area-->