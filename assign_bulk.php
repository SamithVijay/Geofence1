<input type="hidden" name="immobilizer-page" id="immobilizer-page">
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
                    <div class="col-md-4">
                      <div class="row mb-3">
                          <div class="col-md-12">
                            <input type="text" id="schedule-name" class="form-control" data-original-title="Schedule Name" placeholder="Schedule Name" data-toggle="tooltip" aria-invalid="false">
                          </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="row mb-3">
                          <div class="col-md-12">
                            <input type="text" class="form-control" id="date-time" data-original-title="Date & Time" placeholder="Date & Time" data-toggle="tooltip" readonly aria-invalid="false">
                          </div>
                      </div>
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control text-center" id="vehicle-count" readonly aria-invalid="false">
                    </div>
                    <div class="col-md-4">
                      <div class="row mb-3">
                          <div class="col-md-6 pl-0">
                            <button type="button" class="btn btn-block btn-outline-danger ml-2 mr-1" id="turn-off">
                                <i class="fa fa-power-off pr-1"></i>
                                Immobilize
                            </button>
                          </div>
                          <div class="col-md-6 pl-0">
                            <button type="button" class="btn btn-block btn-outline-success ml-2 mr-1" id="turn-on">
                                <i class="fa fa-key pr-1"></i>
                                Mobilize
                            </button>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                      <table id="immobilizer-table" class="table table-bordered table-striped">
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
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->id) ? json_decode($vehicle_list)->data[$i]->id : 'Empty..!'; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->rto) ? json_decode($vehicle_list)->data[$i]->rto : 'Empty..!'; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->vehicle_type) ? json_decode($vehicle_list)->data[$i]->vehicle_type : 'Empty..!'; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->disp_name) ? json_decode($vehicle_list)->data[$i]->disp_name : 'Empty..!'; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->driver_name) ? json_decode($vehicle_list)->data[$i]->driver_name : 'Empty..!'; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->city) ? json_decode($vehicle_list)->data[$i]->city : 'Empty..!'; ?></td>
                                        <td><?php echo !empty(json_decode($vehicle_list)->data[$i]->sim) ? json_decode($vehicle_list)->data[$i]->sim : 'Empty..!'; ?></td>
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
<div id="schedule-modal" class="modal fade" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                                <table id="schedule-table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S NO</th>
                                            <th>Schedule Name</th>
                                            <th>DATE & TIME</th>
                                            <th>VEHICLES</th>
                                            <th>EVENT</th>
                                            <th>STATUS</th>
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