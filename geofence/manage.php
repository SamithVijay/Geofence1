<input type="hidden" name="geo-manage-page" id="geo-manage-page">
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles sm-dnone">
        <div class="col-md-4 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $page_title; ?></h3>
        </div>
        <div class="col-md-8 text-right">
            <button type="button" class="btn btn-sm btn-primary" id="btn-show-all-geo">Show All Geofence</button>
            <span hidden>Live Vehicles</span>
            <!-- <input type="checkbox" hidden id="live-vehicles-switch" class="js-switch" data-size="small" data-toggle="tooltip" data-color="#23d64c" data-secondary-color="#f62d51" /> -->
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
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 pr-0 pr-sm-3">
                                    <select class="select2" id="geo-list" style="width: calc(100% - 100px);">
                                        <option value="selectgeo">Select Geofence</option>
                                        <?php
                                            if($geofence_list){
                                                for ($i=0; $i < count(json_decode($geofence_list)->data); $i++) { ?>
                                                    <option value="<?php echo !empty(json_decode($geofence_list)->data[$i]->id) ? json_decode($geofence_list)->data[$i]->id : '0'; ?>">
                                                        <?php echo !empty(json_decode($geofence_list)->data[$i]->name) ? "(".json_decode($geofence_list)->data[$i]->type.") - ".json_decode($geofence_list)->data[$i]->name : 'Empty..!'; ?>
                                                    </option>
                                            <?php }}
                                        ?>
                                    </select>
                                    <button class="btn btn-danger right" id="delete-geofence"><i class="fa fa-trash"></i></button>
                                    <!-- <button class="btn btn-success right mr-2" id="showall-geofence"><i class="fa fa-eye"></i></button> -->
                                    <button class="btn btn-primary right ml-1 mr-2" id="new-geofence"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="col-md-5 col-6 pl-sm-3 mt-sm-3">
                                    <input type="hidden" name="company" id="company" value="<?php echo $company_id; ?>">
                                    <!-- <input type="hidden" name="shape" id="shape"> -->
                                    <input type="hidden" id="geofence-id">
                                    <input type="text" class="form-control" id="location" placeholder="Location Name" aria-invalid="false" autocomplete="off">
                                </div>
                                <div class="col-md-2 col-6 pl-0 mt-sm-3">
                                    <select class="form-control" id="type" style="width: 100%;">
                                        <option value="area">AREA</option>
                                        <option value="city">CITY</option>
                                        <option value="state">STATE</option>
                                        <option value="office_geofence">My Office</option>
                                    </select>
                                </div>
                                <div class="col-md-1 pl-0 pl-sm-3 mt-sm-3">
                                    <button type="button" id="save-btn" disabled class="btn btn-primary waves-effect waves-light  w-100">
                                        <i class="fa fa-user-plus pr-1"></i> SAVE
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="cus-map-controls">
                                <button type="button" class="btn btn-danger btn-xs" id="delete-shape"><i class="fa fa-trash"></i></button>
                            </div>
                            <style>
                                #geomapCanvas{
                                    width: 100% !important;
                                    height: 600px !important;
                                }
                                .controls {
                                    border: 1px solid transparent;
                                    border-radius: 2px 0 0 2px;
                                    box-sizing: border-box;
                                    -moz-box-sizing: border-box;
                                    outline: none;
                                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                                }

                                #pac-input {
                                    background-color: #fff;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 300;
                                    margin-left: 12px;
                                    padding: 0 11px 0 13px;
                                    text-overflow: ellipsis;
                                    width: 400px;
                                    height: 40px;
                                    position: absolute;
                                    z-index: 10;
                                    left: 190px;
                                    top: 9px;
                                }

                                #pac-input:focus {
                                    border-color: #4d90fe;
                                }
                                #lat-input {
                                    background-color: #fff;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 300;
                                    margin-left: 12px;
                                    padding: 0 11px 0 13px;
                                    text-overflow: ellipsis;
                                    width: 300px;
                                    height: 40px;
                                    position: absolute;
                                    z-index: 10;
                                    left: 600px;
                                    top: 9px;
                                }

                                #lat-input:focus {
                                    border-color: #4d90fe;
                                }

                                .pac-container {
                                    font-family: Roboto;
                                    position: absolute !important;
                                    z-index: 9999;
                                }

                                #type-selector {
                                    color: #fff;
                                    background-color: #4d90fe;
                                    padding: 5px 11px 0px 11px;
                                }

                                #type-selector label {
                                    font-family: Roboto;
                                    font-size: 13px;
                                    font-weight: 300;
                                }
                                .cus-map-controls{
                                    position: absolute;
                                    top: 3px;
                                    right: 118px;
                                    z-index: 10;
                                    z-index: 10;
                                }
                                #shape{
                                    background-color: #fff;
                                    font-family: Roboto;
                                    font-size: 15px;
                                    font-weight: 300;
                                    margin-left: 12px;
                                    padding: 0 11px 0 13px;
                                    text-overflow: ellipsis;
                                    /* width: 300px; */
                                    height: 40px;
                                    position: absolute;
                                    z-index: 10;
                                    left: 910px;
                                    top: 9px;
                                }
                            </style>
                            
                            <div class="map-box">
                                <input id="pac-input" class="controls" type="text" placeholder="Search Box">
                                <select class="controls" name="shape" id="shape">
                                    <option value="circle">Circle</option>
                                    <option value="poly">Poly</option>
                                </select>
                                <input id="lat-input" class="controls" type="text" placeholder="Lattitude and Longitude">
                                <div id="geomapCanvas"></div>
                            </div>

                            <!-- <div id="geomapCanvas" style="width: 100%; height: 550px;">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->