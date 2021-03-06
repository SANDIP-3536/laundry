    <!-- <?php print_r($branch_request_status); ?> -->
    <div class="footer" style="background: #232020;color: #fff;">
        <div class="row">
            <div class="col-sm-4">
                <div class="pull-left">
                    <b>Designed & Developed By
                    <a href="http://www.autoqed.com" target="_blank"> <img src="<?=base_url()?>assets/img/autoqed_logo.png" style="height:22px;"> <span style="color:#ffffff;">AUTO</span><span style="color: #39b54a;">QED</span></a> 
                    | Copyright &copy; 2018-19
                </div>
            </div>
             <div class="pull-right">
                <i class="fa fa-phone-square" aria-hidden="true"></i><strong> +91 98507 29144</strong> | <i class="fa fa-envelope" aria-hidden="true"></i> <strong>info@autoqed.com </strong> 
            </div>
        </div>
    </div>  
        
    <!-- Mainly scripts -->
    <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/jquery-ui.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- Chartist -->
    <script src="<?=base_url();?>assets/js/plugins/chartist/chartist.min.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>
   
    <script src="<?= base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
     <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?= base_url();?>assets/js/plugins/fullcalendar/moment.min.js"></script>
    <!-- Date range picker -->
    <script src="<?= base_url();?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Data picker -->
   <script src="<?= base_url();?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>
     <!-- Clock picker -->
    <script src="<?= base_url();?>assets/js/plugins/clockpicker/clockpicker.js"></script>
     <!-- Select2 -->
    <script src="<?= base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>

    <script src="<?= base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
    <!-- Sweet alert -->
    <script src="<?= base_url();?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- d3 and c3 charts -->
    <script src="<?= base_url();?>assets/js/plugins/d3/d3.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/c3/c3.min.js"></script>
    <!-- ChartJS -->
    <script src="<?=base_url();?>assets/js/plugins/chartJs/Chart.min.js"></script>

     <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
        });
    </script>
    <script>

        
    </script>
    <script>
        $(document).ready(function(){
            <?php if(isset($flash['active']) && $flash['active'] == 1) {?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>"
                });

            <?php } ?>

            <?php if($dashboard == 'dashboard') {?>
                $('#dashboard').addClass('active');
                document.title = "8x Laundry | Dashboard"
            <?php } ?>

            $('.dataTables-example').DataTable({
                pageLength: 10,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [  ]

            });

// ---------------------------------------------------- Chart Bar -------------------------------------------------------
        var barData1 = {
            labels: ['PickUp','Approval','UnderProcess','WorkDone','Delivered','Cancelled'],
            datasets: [
                {
                    label: "Request Status",
                    backgroundColor: '#28497C',
                    pointBorderColor: "#fff",
                    data: [
                            <?php echo $branch_request_status[0]['total_pickup'] ?>,<?php echo $branch_request_status[0]['total_approval'] ?>,<?php echo $branch_request_status[0]['total_underprocess'] ?>,<?php echo $branch_request_status[0]['total_workdone'] ?>,<?php echo $branch_request_status[0]['total_delievred'] ?>,<?php echo $branch_request_status[0]['total_cancelled'] ?>,0
                    ]
                }
            ]
        };

        var barOptions = {
            responsive: true
        };


        var ctx3 = document.getElementById("barChart1").getContext("2d");
        new Chart(ctx3, {type: 'bar', data: barData1, options:barOptions});

// ------------------------------------------- Chart List -------------------------------------------------------------------------------
        var barData2 = {
            labels: [
                <?php foreach ($branch_details as $key ) { ?>
                    '<?=$key['Day']?> <?=$key['day_date']?>',
                <?php } ?>
            ],
            datasets: [
                {
                    label: "Pending Request",
                    backgroundColor: '#019DE1',
                    pointBorderColor: "#fff",
                    data: [
                        <?php foreach ($branch_details as $key ) { ?>
                            <?=$key['pending_request']?>,
                        <?php } ?>,0
                    ]
                },
                {
                    label: "Delivered Request",
                    backgroundColor: '#EF7F1A',
                    pointBorderColor: "#fff",
                    data: [
                        <?php foreach ($branch_details as $key ) { ?>
                            <?=$key['delivered_request']?>,
                        <?php } ?>,0
                    ]
                }
            ]
        };

        var barOptions = {
            responsive: true
        };


        var ctx3 = document.getElementById("barChart2").getContext("2d");
        new Chart(ctx3, {type: 'bar', data: barData2, options:barOptions});

        });
    </script>
  
</body>
</html>