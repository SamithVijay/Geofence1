<input type="hidden" name="geo-manage-page" id="geo-manage-page">
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-4 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0"><?php echo $page_title; ?></h3>
        </div>
        <div hidden class="col-md-8 text-right hidden">
            <span>Live Vehicles</span>
            <input type="checkbox" hidden id="live-vehicles-switch" class="js-switch" data-size="small" data-toggle="tooltip" data-color="#23d64c" data-secondary-color="#f62d51" />
        </div>
    </div>
    <style>
        #map {
            min-height: 500px;
        }
    </style>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
        <div id="map"></div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->