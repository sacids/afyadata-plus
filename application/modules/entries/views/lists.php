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
                        <th width="18%">Name</th>
                        <th width="6%">Age</th>
                        <th width="8%">Sex</th>
                        <th width="12%">Passport No.</th>
                        <th width="14%">Nationality</th>
                        <th width="20%">Vessel/Flight/Vehicle Name/No</th>
                        <th width="10%">Arrival Date</th>
                        <th width="12%">Temp (&#8451;)</th>
                    </tr>
                    </thead>

                    <tbody>
                    <?php if (isset($entries) && $entries) {
                        $serial = 1;
                        foreach ($entries as $values) { ?>
                            <tr>
                                <td><?= $serial ?></td>
                                <td>
                                    <a href="<?= site_url('entries/edit_temp/' . $values->id) ?>"><?= $values->name ?></a>
                                </td>
                                <td><?= $values->age ?></td>
                                <td><?= $values->sex ?></td>
                                <td><?= $values->passport_number ?></td>
                                <td><?= $values->nationality ?></td>
                                <td><?= $values->flight ?></td>
                                <td><?= date('d M, Y', strtotime($values->created_at)) ?></td>
                                <td><?php
                                    if (!empty($values->temperature)) {
                                        echo $values->temperature;
                                    } else { ?>
                                        <form id="formElem" method="post">
                                            <input type="hidden" name="base_url" value="<?= base_url() ?>">
                                            <input type="hidden" name="entry_id" value="<?= $values->id ?>">

                                            <div class="input-group">
                                                <input type="number" name="temp" id="temp" class="form-control"/>
                                                <span class="input-group-btn">
                                                    <button type="submit" name="search" class="btn btn-primary btn-sm">
                                                    <i class="icon-arrow-right5"></i></button>
                                                </span>
                                            </div><!--./form-group -->


                                        </form>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php $serial++;
                        }
                    } ?>
                    </tbody>
                </table>
            </div><!-- /basic datatable-->
        </div><!-- /content area-->

        <script type="text/javascript">
            //on form submit
            let form = document.getElementById('formElem');
            form.onsubmit = function () {
                let formData = new FormData(form);

                //entries
                let base_url = formData.get("base_url");
                let entry_id = formData.get("entry_id");
                let temp = formData.get("temp");

                //append formData
                formData.append('entry_id', entry_id);
                formData.append('temp', temp);

                let xhr = new XMLHttpRequest();
                // Add any event handlers here...
                xhr.open('POST', base_url + '/entries/record_temp', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        let response = xhr.response;
                        console("response => " + response);
                    }
                };
                xhr.send(formData);
            }
        </script>