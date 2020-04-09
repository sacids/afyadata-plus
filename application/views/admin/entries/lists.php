<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Page header -->
        <div class="page-header page-header-light">
            <div class="page-header-content header-elements-md-inline" style="margin-top: -25px;
            margin-bottom: -25px !important;">
                <div class="page-title d-flex">
                    <h4><i class="icon-home4 mr-2"></i> <span class="font-weight-semibold">PoE Entries</span></h4>
                    <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
                </div><!--./page-title -->
            </div><!--./page-header-content -->
        </div><!-- /page header -->


        <!-- Content area -->
        <div class="content">
            <!-- Basic datatable -->
            <div class="card">
                <div class="card-header header-elements-inline">
                    <h5 class="card-title">PoE Entries</h5>
                </div>

                <table class="table table-bordered datatable-basic">
                    <thead>
                    <tr>
                        <th width="3%"></th>
                        <th width="20%">Name</th>
                        <th width="8%">Age</th>
                        <th width="8%">Sex</th>
                        <th width="15%">Passport No.</th>
                        <th width="20%">Country</th>
                        <th width="10%">Temp (&#8451;)</th>
                        <th width="10%">Entry Date</th>
                        <th width="5%"></th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if (isset($entries) && $entries) {
                        $serial = 1;
                        foreach ($entries as $values) { ?>
                            <tr>
                                <td><?= $serial ?></td>
                                <td>
                                    <a href="<?= site_url('entries/edit_temp/' . $values->id) ?>"><?= $values->surname . ' ' . $values->other_names ?></a>
                                </td>
                                <td><?= $values->age ?></td>
                                <td><?= $values->sex ?></td>
                                <td><?= $values->passport_number ?></td>
                                <td><?= $values->passport_country ?></td>
                                <td><?= $values->temperature ?></td>
                                <td><?= date('d-M-Y', strtotime($values->created_at)) ?></td>
                                <td>
                                    <a href="<?= site_url('entries/edit_temp/' . $values->id) ?>"><i
                                                class="icon-folder mr-2"></i></a>
                                </td>
                            </tr>
                            <?php $serial++;
                        }
                    } ?>
                    </tbody>
                </table>
            </div><!-- /basic datatable-->
        </div><!-- /content area-->