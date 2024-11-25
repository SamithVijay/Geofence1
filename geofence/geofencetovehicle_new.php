<input type="hidden" id="geofence-to-vehicle-page">
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles sm-dnone">
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
    <div class="row mt-sm-3">
        <div class="col-12">
            <div class="card pb-0  mb-0">
                <div class="card-body">
                <div class="row">
                    <div class="col-6 col-md-2 pr-0 pr-md-2">
                        <select class="select2" id="geofence" style="width: 100%;">
                            <!-- <?php
                                if(!is_null($geofence_list)){
                                    for ($i=0; $i < count(json_decode($geofence_list)->data); $i++) {
                                        echo "<option value='".json_decode($geofence_list)->data[$i]->id."'>".json_decode($geofence_list)->data[$i]->name."</option>";
                                    }
                                }
                            ?> -->
                        </select>
                    </div>
                    <div class="col-6 col-md-10">
                        <input type="text" maxlength="500" class="form-control" id="email" aria-invalid="false" data-original-title="Alert Email ID's (comma separated)" placeholder="mail@mail.com,mail@mail.com,..." data-toggle="tooltip">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6 col-md-7 pr-0 pr-md-2">
                        <input type="text" maxlength="500" class="form-control" id="mobile" aria-invalid="false" data-original-title="Alert Mobile Numbers (comma separated)" placeholder="+91XXXXXX,+91XXXXXX,..." data-toggle="tooltip">
                    </div>
                    <div class="col-6 col-md-2">
                      <div class="row mb-3">
                          <div class="col-md-12">
                            <select class="select2" id="alert-type" data-minimum-results-for-search="Infinity" style="width: 100%;">
                                <option value="in">Geofence IN</option>
                                <option value="out">Geofence OUT</option>
                                <option value="both">Geofence IN & OUT</option>
                                <option value="both">Trip Monitoring</option>
                            </select>
                          </div>
                      </div>
                    </div>
                    <div class="col-6 col-md-1">
                        <input type="text" class="form-control text-center" id="vehicle-count" readonly aria-invalid="false">
                    </div>
                    <div class="col-6 col-md-2">
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
                                <th>Assigned Geofence Details</th>
                            </tr>
                        </thead>
                        <tbody>
                           
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
<style>
    .geo-names{
        overflow: hidden;
        max-height: 40px;
        position: relative;
        display: block;
    }
    .geo-names:hover {
        max-height: max-content;
    }    
</style>
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