<!-- Header -->
<?php $this->load->view('header'); ?>
<!-- / Header -->
    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Leave</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin')?>">Home</a></li>
                            <li class="breadcrumb-item active">Edit Leave</li>
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
                                <form method="post" action="<?php echo base_url('admin/leave-edit');?>" id="editLeavemanagement" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                        <input type="hidden" id="exampleInputName" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" class="form-control" placeholder="Email">
                                        <input type="hidden" id="exampleInputName" name="role" value="<?php echo $_SESSION['emp_type']?>" class="form-control" placeholder="Role">
                                            <label for="exampleInputName">Name</label>
                                            <input type="hidden" name="id" value="<?php echo $leave_management['id'];?>">
                                                <?php if(($_SESSION['emp_type']) == '4'){?>
                                                <select name="name" class="form-control" id="name">
                                                    <?php foreach($employee as $emp):?>
                                                        <option <?php if($leave_management['name'] == $emp['id']){echo 'selected';}?> value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                                    <?php endforeach?>
                                                </select>
                                                <?php }
                                                 else if(($_SESSION['emp_type']) == '6' || ($_SESSION['emp_type']) == '5' || ($_SESSION['emp_type']) == '2' || ($_SESSION['emp_type']) == '3'){?>
                                                    <!--<input type="text" id="exampleInputName" name="name" value="<?php echo $leave_management['name']?>" class="form-control" readonly>-->
                                                    <select name="name" class="form-control selected_name" id="name" readonly style="-webkit-appearance: none;">
                                                        <?php foreach($employee as $emp):?>
                                                            <option <?php if($leave_management['name'] == $emp['id'] ){echo 'selected';}?> value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                                        <?php endforeach?>
                                                    </select>
                                                <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputLeaveType">Leave Type </label>
                                            <?php $type = $leave_management['leave_type'];?>
                                            <div class="form-check form-check-inline ">
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
                                            <input type="text" class="form-control" id="range_date" onchange="cal()" value="<?php echo $leave_management['from'];?> to <?php echo $leave_management['leave_to'];?>">
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
                                                <!--<option value="Replacement">Replacement</option>-->
                                                <?php foreach($vacation as $vacation):?>
                                                    <option <?php if($leave_management['replacement'] == $vacation['id']){echo 'selected';}?> value="<?=$vacation['id']?>"><?=$vacation['name']?> <?=$vacation['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 1 (Manager)</label>
                                            <select id="exampleInputApprover" name="approver" class="form-control">
                                                <!--<option value="Approver 1">Approver 1</option>-->
                                                <?php foreach($vacend as $vacend):?>
                                                    <option <?php if($leave_management['approver'] == $vacend['id']){echo 'selected';}?> value="<?=$vacend['id']?>"><?=$vacend['name']?> <?=$vacend['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 2 (HR Manager)</label>
                                            <select id="exampleInputApprover" name="manager" class="form-control">
                                                <!--<option value="HR Manager">HR Manager</option>-->
                                                <?php foreach($manager as $manager):?>
                                                    <option <?php if($leave_management['manager'] == $manager['id']){echo 'selected';}?> value="<?=$manager['id']?>"><?=$manager['name']?> <?=$manager['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 3 (Director)</label>
                                            <select id="exampleInputApprover" name="approver_two" class="form-control">
                                                <!--<option value="Approver 2">Approver 2</option>-->
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
                                        <a href="<?php echo base_url('admin/my_leave_management');?>" class="btn btn-primary">Cancel</a>
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
<?php $this->load->view('footer'); ?>
<!-- / Footer -->

<script>

$(document).ready(function(){
        $('#name').change(function(){
            var name = $('#name').val();
            if(name != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>admin/fetch_name",
                    method:"POST",
                    data:{name:name},
                    success:function(data)
                    {
                        //console.log(data);
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
    });
    function cal(){
    var fromdt = document.getElementById("datefrom").value;
    var todt = document.getElementById("dateto").value;
    
    $('#range_date').on('apply.daterangepicker', function(ev, picker) {
        var start = new Date(picker.startDate.format('YYYY-MM-DD'));
        var finish = new Date(picker.endDate.format('YYYY-MM-DD'));
        var dayMilliseconds = 1000 * 60 * 60 * 24;
        var weekendDays = 0;
        while (start <= finish) {
          var day = start.getDay()
          if (day == 0 || day == 6) {
            weekendDays++;
          }
          start = new Date(+start + dayMilliseconds);
        }
        
        var startDate = new Date(picker.startDate.format('MM/DD/YYYY'));
        var fromDate = new Date(picker.endDate.format('MM/DD/YYYY'));
        diff = fromDate- startDate;
        days = diff / (1000*60*60*24);
        days = Math.round(days);
        document.getElementById("days").value=days + 1 ;
    });
}
    
    function get_remaining_leave(){
        var user = $("select#name option:selected").val();
        $.ajax({
            type:'post',
            url:'<?php echo base_url('admin/leave_management/get_user_remaining_leave_by_ajax');?>',
            data:{'user_id':user},
        })
        .done(function(responce) {
            if(responce != ''){
                // $("#remainingLeave").text(responce);
                document.getElementById("remainingLeave").value = responce;
            }
            else{
                document.getElementById("remainingLeave").value = 0;
            }
        });
    }
</script>
<script>
    $("#addLeaveManagement").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            name: 'required',
            from: 'required',
            leave_to:'required',
            back_to:'required',
            replacement:'required',
            days: 'required',
            file: 'required',
        }
    });
    
    $(".sendMail").click(function(event){
        event.preventDefault();
        var approver1 = $("select[name='approver'] option:selected").val();
        var approver2 = $("select[name='approver_two'] option:selected").val();
        $.ajax({
            url:"<?php echo base_url(); ?>admin/leave_management/send_email",
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
                url:"<?php echo base_url('admin/leave_management/get_persent_employee');?>",
                method:"POST",
                data:{start_date:startDate,from_date:fromDate},
                success:function(response)
                {
                    response = JSON.parse(response);
                    var html = '';
                    for(var i = 0;i < response.length;i++){
                        html += "<option value='"+response[i]['id']+"'>"+response[i]['name']+" "+response[i]['surname']+"<option>";
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
    
    $("#Approver option:first").attr('selected','selected');
    
    $("#Approver option:selected").prop("selected", false);
    
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