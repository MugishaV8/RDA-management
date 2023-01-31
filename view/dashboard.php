<?php 
 include('header.php');
 $dataPoints = array( 
    array("y" => $database->count_all('patient WHERE diabetic_type ="TYPE 1"'), "label" => "TYPE 1" ),
    array("y" => $database->count_all('patient WHERE diabetic_type ="TYPE 2"'), "label" => "TYPE 2" ),
    array("y" => $database->count_all('patient WHERE diabetic_type ="TYPE 3"'), "label" => "TYPE 3" )
);
?>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2",
    title:{
        text: "Statistics of Patients"
    },
    axisY: {
        title: "Number of Patients"
    },
    data: [{
        type: "column",
        yValueFormatString: "#,##0.## patients",
        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();
 
}
</script>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-1">
                            <div class="card-body">
                                <h3 class="card-title text-white">Patient</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php 
                                    if($_SESSION["category"] == "Administrator"){
                                        echo $database->count_all('patient');
                                      } else {
                                        echo $database->count_all('patient');
                                    }
                                    ?></h2>
                                    <p class="text-white mb-0">total number of patients</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Type 1</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $database->count_all('patient WHERE diabetic_type ="TYPE 1"');?></h2>
                                    <p class="text-white mb-0">Diabet category 1</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Type 2</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $database->count_all('patient WHERE diabetic_type ="TYPE 2"');?></h2>
                                    <p class="text-white mb-0">Diabet category 2</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Type 3</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?php echo $database->count_all('patient WHERE diabetic_type ="TYPE 3"');?></h2>
                                    <p class="text-white mb-0">Diabet category 1</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-lg-9 col-md-12">
                            <div class="card">
                                <div class="card-body">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                        </div>
                            </div>
                            
                        </div>    
                        <div class="col-lg-3 col-md-4">
                            <div class="card card-widget">
                                <div class="card-body">
                                    <h5 class="text-muted">Patient Class Overview </h5>
                                    <div class="mt-4">
                                        <h4><?php echo $database->count_all('patient WHERE dob < "1997-10-27"');?></h4>
                                        <h6>under 25 year <span class="pull-right"><?php echo $database->count_all('patient WHERE dob < "1997-10-27"');?></span></h6>
                                        <div class="progress mb-3" style="height: 7px">
                                            <div class="progress-bar bg-primary" style="width: <?php echo $database->count_all('patient WHERE dob < "1997-10-27"');?>%;" role="progressbar"><span class="sr-only">30% Order</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="m-t-10 text-muted">Class A<span class="pull-right"><?php echo $database->count_all('patient WHERE category ="Class 1"');?></span></h6>
                                        <div class="progress mb-3" style="height: 7px">
                                            <div class="progress-bar bg-success" style="width: <?php echo $database->count_all('patient WHERE category ="Class 1"');?>%;" role="progressbar"><span class="sr-only">50% Order</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="m-t-10 text-muted">Class B <span class="pull-right"><?php echo $database->count_all('patient WHERE category ="Class 2"');?></span></h6>
                                        <div class="progress mb-3" style="height: 7px">
                                            <div class="progress-bar bg-warning" style="width: <?php echo $database->count_all('patient WHERE category ="Class 2"');?>%;" role="progressbar"><span class="sr-only">20% Order</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h6>Class C <span class="pull-right"><?php echo $database->count_all('patient WHERE category ="Class 3"');?></span></h6>
                                        <div class="progress mb-3" style="height: 7px">
                                            <div class="progress-bar bg-primary" style="width: <?php echo $database->count_all('patient WHERE category ="Class 3"');?>%;" role="progressbar"><span class="sr-only">30% Order</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h6 class="m-t-10 text-muted">Class D<span class="pull-right"><?php echo $database->count_all('patient WHERE category ="Class 4"');?></span></h6>
                                        <div class="progress mb-3" style="height: 7px">
                                            <div class="progress-bar bg-success" style="width: <?php echo $database->count_all('patient WHERE category ="Class 4"');?>%;" role="progressbar"><span class="sr-only">50% Order</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
    Content body end
***********************************-->
<?php include('footer.php'); ?>