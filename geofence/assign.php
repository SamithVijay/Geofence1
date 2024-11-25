<input type="hidden" id="geoassign-page">
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
        <div class="col-md-7 text-right">
            <select class="select2" id="users" data-minimum-results-for-search="Infinity" style="width: 250px;">
                <option>Select Company</option>
                <?php
                    if(isset($users_list)){
                        for ($i=0; $i < count(json_decode($users_list)->data); $i++) {
                            echo "<option value='".json_decode($users_list)->data[$i]->id."'>".json_decode($users_list)->data[$i]->name."</option>";
                        }
                    }
                ?>
            </select>
            <button type="button" class="btn btn-outline-primary mr-1" id="search">
                <i class="fa fa-search pr-1"></i>
            </button>
            <button type="button" class="btn btn-outline-primary mr-1" id="geoassign-new">
                <i class="fa fa-user-plus pr-1"></i> NEW
            </button>
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
            <div class="card mb-0">
                <div class="card-body pt-0">
                    <div class="table-responsive">
                        <table id="geoassign-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S NO</th>
                                    <th>RULE NAME</th>
                                    <th>GEOFENCE ARRAY</th>
                                    <th>VEHICLE ARRAY</th>
                                    <th>TYPE</th>
                                    <th>MOBILE NO</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset(json_decode($geofenceassign_list)->data)){
                                        for ($i=0; $i < count(json_decode($geofenceassign_list)->data); $i++) { ?>
                                            <tr>
                                                <td><?php echo ($i + 1); ?></td>
                                                <td><?php echo !empty(json_decode($geofenceassign_list)->data[$i]->rule_name) ? json_decode($geofenceassign_list)->data[$i]->rule_name : 'Empty..!'; ?></td>
                                                <td><?php echo !empty(json_decode($geofenceassign_list)->data[$i]->gf_array) ? json_decode($geofenceassign_list)->data[$i]->gf_array : 'Empty..!'; ?></td>
                                                <td><?php echo !empty(json_decode($geofenceassign_list)->data[$i]->vehicle_array) ? json_decode($geofenceassign_list)->data[$i]->vehicle_array : 'Empty..!'; ?></td>
                                                <td><?php echo !empty(json_decode($geofenceassign_list)->data[$i]->method) ? json_decode($geofenceassign_list)->data[$i]->method : 'Empty..!'; ?></td>
                                                <td><?php echo !empty(json_decode($geofenceassign_list)->data[$i]->mobile_array) ? json_decode($geofenceassign_list)->data[$i]->mobile_array : 'Empty..!'; ?></td>
                                                <td>
                                                    <a href="#" class="text-success mr-2" onclick="page.geoassignGet(<?php echo(json_decode($geofenceassign_list)->data[$i]->id); ?>)"><i class="fa fa-edit"></i></a>
                                                    <a href="#" class="text-danger delete-row" onclick="page.geoassignDelete(<?php echo(json_decode($geofenceassign_list)->data[$i]->id); ?>)" id="delete-row"><i class="fa fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
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
<div id="geoassign-modal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="" id="geoassign-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Assign Geofence to vehicle</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="geoassign-id">
                    <input type="hidden" id="user-id" value="<?php echo $user_id; ?>">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="rule-name" class="control-label">Rule Name</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="rule-name" required aria-invalid="false" minlength="6" maxlength="50">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="geofence" class="control-label">Select Geofence</label>
                            <?php //print_r($geofence_list); ?>
                        </div>
                        <div class="col-md-8">
                            <select class="select2 select2-multiple" multiple="multiple" id="geofence" style="width: 100%;">
                                <?php
                                    if(!is_null($geofence_list)){
                                        for ($i=0; $i < count(json_decode($geofence_list)->data); $i++) {
                                            echo "<option value='".json_decode($geofence_list)->data[$i]->id."'>".json_decode($geofence_list)->data[$i]->name."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="alert-type" class="control-label">Alert Type</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2" id="alert-type" data-minimum-results-for-search="Infinity" style="width: 100%;">
                                <option>Select Alert Type</option>
                                <option value="in">Geofence IN</option>
                                <option value="out">Geofence OUT</option>
                                <option value="both">Geofence IN & OUT</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="vehicle" class="control-label">Select Vehicle</label>
                        </div>
                        <div class="col-md-8">
                            <select class="select2 select2-multiple" multiple="multiple" id="vehicle" style="width: 100%;">
                                <option>Select Vehicle</option>
                                <?php
                                    if(!is_null($vehicle_list)){
                                        for ($i=0; $i < count(json_decode($vehicle_list)->data); $i++) {
                                            echo "<option value='".json_decode($vehicle_list)->data[$i]->id."'>".json_decode($vehicle_list)->data[$i]->rto."</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label for="mobile" class="control-label">Alert Mobile</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control inp-num" id="mobile" required aria-invalid="false" minlength="10" maxlength="10">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger waves-effect waves-light">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>    
<!-- ============================================================== -->
<!-- Start Model -->
<!-- ============================================================== -->