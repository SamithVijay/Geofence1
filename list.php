<input type="hidden" name="geofence-page" id="geofence-page">
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles sm-dnone">
        <div class="col-md-5 align-self-center">
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
            <div class="card mb-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="geofence-table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S NO</th>
                                    <th>TYPE</th>
                                    <th>GEOFENCE NAME</th>
                                    <th>SHAPE</th>
                                    <th>COORDINATES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset(json_decode($geofence_list)->data)){
                                        for ($i=0; $i < count(json_decode($geofence_list)->data); $i++) { ?>
                                        <tr>
                                            <td><?php echo ($i + 1); ?></td>
                                            <td><?php echo !empty(json_decode($geofence_list)->data[$i]->type) ? json_decode($geofence_list)->data[$i]->type : 'Empty..!'; ?></td>
                                            <td><?php echo !empty(json_decode($geofence_list)->data[$i]->name) ? json_decode($geofence_list)->data[$i]->name : 'Empty..!'; ?></td>
                                            <td><?php echo !empty(json_decode($geofence_list)->data[$i]->shape) ? json_decode($geofence_list)->data[$i]->shape : 'Empty..!'; ?></td>
                                            <td><?php echo !empty(json_decode($geofence_list)->data[$i]->coordinates) ? json_decode($geofence_list)->data[$i]->coordinates : 'Empty..!'; ?></td>
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