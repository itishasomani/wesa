<!-- Header -->
<?php $this->load->view('employee/header'); ?>
<!-- / Header -->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Vacation/Medical Leave</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('employee/leave_management')?>">Home</a></li>
                            <li class="breadcrumb-item active">Edit Vacation/Medical Leave</li>
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
                                <form method="post" action="<?php echo base_url('employee/leave-management-edit');?>" id="editLeavemanagement" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Name</label>
                                            <input type="hidden" name="id" value="<?php echo $leave_management['id'];?>">
                                            <input type="hidden" id="exampleInputName" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" class="form-control" placeholder="Email">
                                            <input type="hidden" id="exampleInputName" name="role" value="employee" class="form-control" placeholder="Role">
                                            <!--<input type="text" name="name" class="form-control" value="<?php echo $leave_management['name'];?>" readonly>-->
                                            <select name="name" class="form-control" id="name" readonly style="-webkit-appearance: none;">
                                                    <?php foreach($employee as $emp):?>
                                                        <option <?php if($leave_management['name'] == $emp['id']){echo 'selected';}?> value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                                    <?php endforeach?>
                                               </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputLeaveType">Leave Type</label>
                                            <?php $type = $leave_management['leave_type'];?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Annual" <?php echo ($type=='Annual')?'checked':'' ;?> id="inlineRadio1">
                                                <label class="form-check-label" for="inlineRadio1">Annual</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="No paid" <?php echo ($type=='No paid')?'checked':'' ;?> id="inlineRadio2">
                                                <label class="form-check-label" for="inlineRadio2">No paid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Occasion" <?php echo ($type=='Occasion')?'checked':'' ;?> id="inlineRadio3">
                                                <label class="form-check-label" for="inlineRadio3">Occasion</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Medical" <?php echo ($type=='Medical')?'checked':'' ;?> id="inlineRadio4">
                                                <label class="form-check-label" for="inlineRadio4">Medical</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Business Trip" <?php echo ($type=='Business Trip')?'checked':'' ;?> id="inlineRadio5">
                                                <label class="form-check-label" for="inlineRadio5">Business Trip</label>
                                            </div>
                                             <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Compasionate Leave" <?php echo ($type=='Compasionate Leave')?'checked':'' ;?> id="inlineRadio6">
                                                <label class="form-check-label" for="inlineRadio6">Compasionate Leave</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="leave_type" value="Maternity Leave" <?php echo ($type=='Maternity Leave')?'checked':'' ;?> id="inlineRadio7">
                                                <label class="form-check-label" for="inlineRadio7">Maternity Leave</label>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <label for="range_date">Leave Range</label>
                                            <input type="text" class="form-control" id="range_date" onchange="cal()">
                                            <input type="hidden" id="datefrom" name="from" value="<?php echo $leave_management['from'];?>">
                                            <input type="hidden" id="dateto" name="leave_to" value="<?php echo $leave_management['leave_to'];?>">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTotalDays">Total Days</label>
                                            <input type="number" id="days" name="days" class="form-control" value="<?php echo $leave_management['days'];?>" placeholder="0 Days" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputDateBackToWork">Remaining Leave: </label>
                                            <input name="remaining_leave" id="remainingLeave" class="form-control" value="<?php echo $leave_management['remaining_leave'];?>" readonly></input> 
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputDateBackToWork">Date Back To Work</label>
                                            <input type="date" id="dateBack" name="back_to" class="form-control" value="<?php echo $leave_management['back_to'];?>" placeholder="Date Back To Work">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputReplacement">Replacement</label>
                                            <select id="exampleInputReplacement" name="replacement" class="form-control">
                                                <option value="Replacement">Replacement</option>
                                                <?php foreach($vacation as $vacation):?>
                                                    <option <?php if($leave_management['replacement'] == $vacation['id']){echo 'selected';}?> value="<?=$vacation['id']?>"><?=$vacation['name']?> <?=$vacation['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 1 (Direct Manager)</label>
                                            <select id="exampleInputApprover" name="approver" class="form-control">
                                                <option value="Approver 1">Approver 1</option>
                                                <?php foreach($vacend as $vacend):?>
                                                    <option <?php if($leave_management['approver'] == $vacend['id']){echo 'selected';}?> value="<?=$vacend['id']?>"><?=$vacend['name']?> <?=$vacend['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 2 (HR Manager)</label>
                                            <select id="exampleInputApprover" name="manager" class="form-control">
                                                <option value="HR Manager">HR Manager</option>
                                                 <?php foreach($manager as $manager):?>
                                                    <option <?php if($leave_management['manager'] == $manager['id']){echo 'selected';}?> value="<?=$manager['id']?>"><?=$manager['name']?> <?=$manager['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 3 (Director)</label>
                                            <select id="exampleInputApprover" name="approver_two" class="form-control">
                                                <option value="Approver 2">Approver 2</option>
                                               <?php foreach($director as $director):?>
                                                    <option <?php if($leave_management['approver_two'] == $director['id']){echo 'selected';}?> value="<?=$director['id']?>"><?=$director['name']?> <?=$director['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputComment">Comment (please explain)</label>
                                            <textarea id="exampleInputComment" name="comment" cols="30" rows="5" class="form-control" required><?php echo $leave_management['comment'];?></textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="<?php echo base_url('employee/leave_management')?>" class="btn btn-primary">Cancel</a>
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
function get_remaining_leave(){
        var user = $("#name").val();
        $.ajax({
            type:'post',
            url:'<?php echo base_url('employee/leave_management/get_user_remaining_leave_by_ajax');?>',
            data:{'user_id':user},
        })
        .done(function(responce) {
            //console.log(responce);
            if(responce >= 0){
            document.getElementById("remainingLeave").value = responce;
            }
            else{
                $("#remainingLeave").text('0');
            }
        });
    }
$(document).ready(function() {
        var date = new Date();
        var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
        $('#range_date').daterangepicker({
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
    });
    $( window ).on( "load", get_remaining_leave() );
     $('#Name').css('pointer-events','none'); 
     
     var date = new Date();
    var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
    var today = new Date(y, m, d+2).toISOString().split('T')[0];
    
    document.getElementsByName("back_to")[0].setAttribute('min', today);
</script>
