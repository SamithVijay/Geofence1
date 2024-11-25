<input type="hidden" id="geofence-to-vehicle-page">
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $page_title; ?></h3>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card pb-0  mb-0">
                <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                      <div class="row mb-3">
                          <div class="col-md-6">
                            <select class="select2" id="geofence" style="width: 100%;">
                                <?php
                                    if(!is_null($geofence_list)){
                                        for ($i=0; $i < count(json_decode($geofence_list)->data); $i++) {
                                            echo "<option value='".json_decode($geofence_list)->data[$i]->id."'>".json_decode($geofence_list)->data[$i]->name."</option>";
                                        }
                                    }
                                ?>
                            </select>
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" id="mobile" aria-invalid="false" data-original-title="Alert Mobile Numbers (comma separated)" placeholder="+91XXXXXX,+91XXXXXX,..." data-toggle="tooltip">
                          </div>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="row mb-3">
                          <div class="col-md-12">
                            <select class="select2" id="alert-type" data-minimum-results-for-search="Infinity" style="width: 100%;">
                                <option value="in">Geofence IN</option>
                                <option value="out">Geofence OUT</option>
                                <option value="both">Geofence IN & OUT</option>
                            </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control text-center" id="vehicle-count" readonly aria-invalid="false">
                    </div>
                    <div class="col-md-2">
                      <div class="row mb-3">
                          <div class="col-md-12 pl-0">
                            <button type="button" class="btn btn-block btn-outline-success ml-2 mr-1" id="save">
                                <!-- <i class="fa fa-key pr-1"></i> -->
                                SAVE
                            </button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                      <table id="vehicle-table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S NO</th>
                                <th></th>
                                <th>RTO NO</th>
                                <th>TYPE</th>
                                <th>NAME</th>
                                <th>DRIVER NAME</th>
                                <th>CITY</th>
                                <th>SIM NO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($vehicle_list)){
                                    for ($i=0; $i < count(json_decode($vehicle_list)->data); $i++) { ?>
                                    <tr>
                                        <td><?php echo ($i + 1); ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->id) ? json_decode($vehicle_list)->data[$i]->id : ' -- '; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->rto) ? json_decode($vehicle_list)->data[$i]->rto : ' -- '; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->vehicle_type) ? json_decode($vehicle_list)->data[$i]->vehicle_type : ' -- '; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->disp_name) ? json_decode($vehicle_list)->data[$i]->disp_name : ' -- '; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->driver_name) ? json_decode($vehicle_list)->data[$i]->driver_name : ' -- '; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->city) ? json_decode($vehicle_list)->data[$i]->city : ' -- '; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->sim) ? json_decode($vehicle_list)->data[$i]->sim : ' -- '; ?></td>
                                    </tr>
                                <?php }}
                            ?>
                        </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Model -->
<!-- ============================================================== -->
<div id="rule-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" id="schedule-detail-form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Schedule List</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="rule-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S NO</th>
                                            <th>Geofence Name</th>
                                            <th>VEHICLES</th>
                                            <th>TYPE</th>
                                            <th>ALERT MOBILES</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>    
<!-- ============================================================== -->
<!-- Start Model -->
<!-- ============================================================== -->