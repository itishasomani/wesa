<!-- Header -->
<?php $this->load->view('employee/header'); ?>
<!-- / Header -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="leave_management">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Vacation/Medical Leave</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('employee/leave_management')?>">Home</a></li>
                            <li class="breadcrumb-item active">Vacation/Medical Leave</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <?php $get_msg = $this->message->get_message() ?>
                <?php if(!empty($get_msg)):?>
                <?php echo $get_msg;?>
                <?php endif; ?>
                <div class="row justify-content-around">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <!-- form start -->
                                <form method="post" action="<?php echo base_url('employee/add-leave-management');?>" id="addLeaveManagement" enctype="multipart/form-data">
                                    <div class="card-body">
                                    <input type="hidden" id="exampleInputName" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" class="form-control" placeholder="Email">
                                    <input type="hidden" id="exampleInputName" name="role" value="employee" class="form-control" placeholder="Role">
                                        <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                            <select name="name" class="form-control" id="name" readonly style="-webkit-appearance: none;">
                                                <?php $emp = $this->employee_model->get_name();?>
                                                <?php foreach($emp as $emp):?>
                                                    <option value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                                <?php endforeach?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputLeaveType">Leave Type</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Annual" id="inlineRadio1" required="required">
                                                <label class="form-check-label" for="inlineRadio1">Annual</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="No paid" id="inlineRadio2"required="required">
                                                <label class="form-check-label" for="inlineRadio2">No paid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Occasion" id="inlineRadio3"required="required">
                                                <label class="form-check-label" for="inlineRadio3">Occasion</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Medical" id="inlineRadio4"required="required">
                                                <label class="form-check-label" for="inlineRadio4">Medical</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Business Trip" id="inlineRadio5"required="required">
                                                <label class="form-check-label" for="inlineRadio5">Business Trip</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Compasionate Leave" id="inlineRadio6"required="required">
                                                <label class="form-check-label" for="inlineRadio6">Compasionate Leave</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Maternity Leave" id="inlineRadio7"required="required">
                                                <label class="form-check-label" for="inlineRadio7">Maternity Leave</label>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label for="range_date">Leave Range</label>
                                            <input type="text" class="form-control" id="range_date" onchange="cal()">
                                            <input type="hidden" id="datefrom" name="from" >
                                            <input type="hidden" id="dateto" name="leave_to" >
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTotalDays">Total Days</label>
                                            <input type="number" id="days" name="days" class="form-control" placeholder="0 Days" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputDateBackToWork" >Remaining Leave: </label>
                                            <input name="remaining_leave" id="remainingLeave" class="form-control" readonly></input> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputDateBackToWork">Date Back To Work</label>
                                            <input type="date" id="dateBack" name="back_to" class="form-control" placeholder="Date Back To Work">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputReplacement">Replacement</label>
                                            <select id="exampleInputReplacement" name="replacement" class="form-control">
                                                <?php foreach($vacation as $vacation):?>
                                                    <option value="<?=$vacation['id']?>"><?=$vacation['name']?> <?=$vacation['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 1 (Direct Manager)</label>
                                            <select id="Approver" name="approver" class="form-control" readonly>
                                                <option>Direct Manager</option>
                                               <!--<?php foreach($vacend as $vacend):?>-->
                                               <!--     <option value="<?=$vacend['id']?>"><?=$vacend['name']?> <?=$vacend['surname']?></option>-->
                                               <!-- <?php endforeach;?>-->
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 2 (HR Manager)</label>
                                            <select id="Manager" name="manager" class="form-control" readonly>
                                                <?php foreach($manager as $manager):?>
                                                    <option value="<?=$manager['id']?>"><?=$manager['name']?> <?=$manager['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 3 (Director)</label>
                                            <select id="Director" name="approver_two" class="form-control" readonly>
                                                <?php foreach($director as $director):?>
                                                    <option value="<?=$director['id']?>"><?=$director['name']?> <?=$director['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputComment">Comment (please explain)</label>
                                            <textarea id="exampleInputComment" name="comment" cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <!--<a href="<?php echo base_url()?>" class="btn btn-primary sendMail">Send</a>-->
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </section>
    <!-- /.content-header -->
    </div>
<!-- Footer -->
<?php $this->load->view('employee/footer'); ?>
<!-- / Footer -->

<script>
// $(document).ready(function(){
    // $('#name').change(function(){
    $(window).on('load',function(){
        var name = $('#name').val();
        if(name != '')
        {
            $.ajax({
                url:"<?php echo base_url(); ?>employee/leave_management/fetch_name",
                method:"POST",
                data:{name:name},
                success:function(data)
                {
                    $('#Approver').html(data);
                }
            });
            get_remaining_leave();
        }
        else 
        {
            $('#Approver').html('<option value="">Approver 1</option>');
        }
    });
// });

   function get_remaining_leave(){
        var user = $("select#name option:selected").val();
        $.ajax({
            type:'post',
            url:'<?php echo base_url('employee/leave_management/get_user_remaining_leave_by_ajax');?>',
            data:{'user_id':user},
        })
        .done(function(responce) {
            //console.log(responce);
            if(responce != ''){
            document.getElementById("remainingLeave").value = responce;
            }
            else{
                 document.getElementById("remainingLeave").value = 0;
            }
        });
    }
$( window ).on( "load", get_remaining_leave() );
function cal(){
    var fromdt = document.getElementById("datefrom").value;
    var todt = document.getElementById("dateto").value;
    
    $('#range_date').on('apply.daterangepicker', function(ev, picker) {
        var startDate = new Date(picker.startDate.format('MM/DD/YYYY'));
        var fromDate = new Date(picker.endDate.format('MM/DD/YYYY'));
        
        days = (fromDate- startDate) / (1000 * 60 * 60 * 24);
        days = Math.round(days);
        document.getElementById("days").value=days + 1;
    });
}
$(".sendMail").click(function(event){
        event.preventDefault();
        var approver1 = $("select[name='approver'] option:selected").val();
        var approver2 = $("select[name='approver_two'] option:selected").val();
        $.ajax({
            url:"<?php echo base_url(); ?>employee/leave_management/send_email",
            method:"POST",
            data:{emp1:approver1,emp2:approver2},
            // beforeSend: function() {
            //     $('.action_loader').show();
            // },
            success:function(response)
            {
                if(response > 0){
                    $.toast({
                        heading: 'Email has been send',
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        stack: 6
                    });
                    $('.action_loader').hide();
                }
                else{
                    $.toast({
                        heading: 'Fail',
                        text: 'Email not send',
                        position: 'top-right',
                        loaderBg:'#ff6849',
                        icon: 'error',
                        hideAfter: 3500
                    });
                    $('.action_loader').hide();
                }
            }
        });
    });
</script>
<script>
    $("#addLeaveManagement").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            name: 'required',
            emp_id:'required',
            leave_date: 'required',
            replacement:'required',
            days: 'required',
            file: 'required',
        }
    });   
    $(document).ready(function() {
        var date = new Date();
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        $('#range_date').daterangepicker({
            locale: {
              format: 'DD-MM-YYYY',
            },
            minDate: new Date(y, m, d+1),
            
        });
    });
    $("#range_date").change(function(){
        $('#range_date').on('apply.daterangepicker', function(ev, picker) {
            var startDate = picker.startDate.format('DD-MM-YYYY');
            var fromDate = picker.endDate.format('DD-MM-YYYY');
             $("#datefrom").val(startDate);
            $("#dateto").val(fromDate);
            $.ajax({
                url:"<?php echo base_url('employee/leave_management/get_persent_employee');?>",
                method:"POST",
                data:{start_date:startDate,from_date:fromDate},
                success:function(response)
                {
                    response = JSON.parse(response);
                    var html = '';
                    for(var i = 0;i < response.length;i++){
                        html += "<option value='"+response[i]['id']+"'>"+response[i]['name']+"<option>";
                    }
                    $("#replaceUserField").html(html);
                }
            });
            
        });
    });
    
    $(document).ready(function(){
        $('#range_date').on('apply.daterangepicker', function(ev, picker) {
            var startDate = picker.startDate.format('DD-MM-YYYY');
            var fromDate = picker.endDate.format('DD-MM-YYYY');
           $("#datefrom").val(startDate);
            $("#dateto").val(fromDate);
            
        });
        get_remaining_leave();
    });
     $("#Manager option:first").attr('selected','selected');
    $("#Manager option:selected").prop("selected", false);
    
    $("#Director option:first").attr('selected','selected');
    $("#Director option:selected").prop("selected", false);
     $('#Name').css('pointer-events','none'); 
     
     var date = new Date();
    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
    var today = new Date(y, m, d+2).toISOString().split('T')[0];
    
    document.getElementsByName("back_to")[0].setAttribute('min', today);
</script>