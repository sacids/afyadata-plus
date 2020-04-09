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
                    <h5 class="card-title">Forms</h5>
                    <a class="btn btn-primary btn-sm" href="<?= site_url('forms/upload') ?>">
                        <i class="icon-upload4"></i> Upload
                    </a>
                </div><!--./card-header -->

                <table class="table table-bordered datatable-basic">
                    <thead>
                    <tr>
                        <th width="3%"></th>
                        <th width="40%">Name</th>
                        <th width="30%">Form ID</th>
                        <th width="10%">Version</th>
                        <th width="10%">Creation Date</th>
                        <th width="5%"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if (isset($forms) && $forms) {
                        $serial = 1;
                        foreach ($forms as $values) { ?>
                            <tr>
                                <td><?= $serial ?></td>
                                <td><?= $values->name ?></td>
                                <td><?= $values->form_id ?></td>
                                <td><?= $values->version ?></td>
                                <td><?= date('d-M-Y', strtotime($values->created_at)) ?></td>
                                <td>
                                    <a href="#"><i class="icon-pencil3 mr-2"></i></a>
                                </td>
                            </tr>
                            <?php $serial++;
                        }
                    } ?>
                    </tbody>
                </table>
            </div><!-- /basic datatable-->
        </div><!-- /content area-->