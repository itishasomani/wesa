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
                            <h1 class="m-0">Procurement Management</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('employee/procurement')?>">Home</a></li>
                                <li class="breadcrumb-item active">Procurement Management</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
            <div class="container-fluid">
                <?php $get_msg = $this->message->get_message() ?>
                <?php if(!empty($get_msg)):?>
                <?php echo $get_msg;?>
                <?php endif; ?>
                <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="card card-primary">
                                <!-- form start -->
                                <form method="post" action="<?php echo base_url('employee/procurement_add');?>" id="Procurement" enctype="multipart/form-data">
                                    <div class="card-body">
                                       <div class="form-group">
                                          <input type="hidden" id="exampleInputName" name="role" value="employee" class="form-control" placeholder="Role">
                                          <input type="hidden" id="exampleInputName" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" class="form-control" placeholder="Email">
                                        <label for="exampleInputName">Name</label>
                                            <?php $emp = $this->employee_model->get_name();?>
                                            <?php foreach($emp as $emp):?>
                                                <select name="name" class="form-control" id="Name" readonly style="-webkit-appearance: none;">
                                                    <option value="<?php echo $emp['id']?>"><?php echo $emp['name']?> <?php echo $emp['surname']?></option>
                                                </select>
                                            <?php endforeach?>
                                            <!--<input type="text" id="exampleInputName" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?>" class="form-control" readonly>-->
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputItem">Item</label>
                                            <input type="text" id="exampleInputOther" name="item" class="form-control" placeholder="Item">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputQuantity">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control input-lg" placeholder="Quantity">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUnit">Unit</label>
                                            <select name="unit" id="unit" class="form-control input-lg">
                                                <option value="Unit" selected disabled>Unit</option>
                                                <option value="Box">Box</option>
                                                <option value="Pallet">Pallet</option>
                                                <option value="trip">trip</option>
                                                <option value="pcs">pcs</option>
                                                <option value="m">m</option>
                                                <option value="m2">m2</option>
                                                <option value="m3">m3</option>
                                                <option value="tonne">tonne</option>
                                                <option value="kg">kg</option>
                                                <option value="litre">litre</option>
                                                <option value="rolls">rolls</option>
                                                <option value="set">set</option>
                                                <option value="pair">pair</option>
                                                <option value="package">package</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTask">Task</label>
                                            <select name="task" id="task" class="form-control input-lg">
                                                <option value="Task" selected disabled>Task</option>
                                                <?php foreach($tasks as $task):?>
                                                    <option value="<?=$task['id']?>"><?=$task['task_name']?></option>
                                                <?php  endforeach?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputOther">Others</label>-->
                                        <!--    <textarea id="exampleInputother" name="other" cols="30" rows="5" class="form-control"></textarea>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputDestination">Destination Address</label>
                                            <select name="address" id="address" class="form-control input-lg">
                                                <option value="Destination Address" selected disabled>Destination Address</option>
                                                <?php foreach ($address as $add):?>
                                                    <option value="<?=$add['address_1']?>"><?php echo $add['address_1']?></option>
                                                    <option value="<?=$add['address_2']?>"><?php echo $add['address_2']?></option>
                                                    <option value="<?=$add['address_3']?>"><?php echo $add['address_3']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTask">Budget Category</label>
                                            <select name="b_category" id="b_category" class="form-control input-lg">
                                                <option value="Budget Category" selected disabled>Budget Category</option>
                                                    <?php foreach($Budget as $budget):?>
                                                        <option value="<?= $budget['category']?>"><?php echo $budget['category']?></option>
                                                    <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTask">Budget Sub Category</label>
                                            <select name="sub_category" id="sub_category" class="form-control input-lg">
                                                <option value="Budget SubCategory" selected disabled>Budget Sub Category</option>
                                                    <?php foreach($Sub_category as $sub_category):?>
                                                        <option value="<?= $sub_category['sub_category']?>"><?php echo $sub_category['sub_category']?></option>
                                                    <?php endforeach;?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputTask">Budget Item</label>-->
                                        <!--    <select name="b_item" id="b_item" class="form-control input-lg">-->
                                        <!--        <?php foreach($b_item as $b_item):?>-->
                                        <!--            <option value="<?= $b_item['free_text']?>"><?php echo $b_item['free_text']?></option>-->
                                        <!--        <?php endforeach;?>-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 1 (Please Select Your Direct Manager)</label>
                                            <select name="direct_manager" id="Direct_manager" class="form-control input-lg">
                                                <?php foreach($direct_manager as $direct_manager):?>
                                                    <option value="<?= $direct_manager['id']?>"><?php echo $direct_manager['name']?> <?php echo $direct_manager['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputApprover">Approver 2 (QMS Manager)</label>-->
                                        <!--    <select name="qms_manager" id="Advisor" class="form-control input-lg">-->
                                        <!--        <?php foreach($advisor as $advisor):?>-->
                                        <!--            <option value="<?= $advisor['id']?>"><?php echo $advisor['name']?> <?php echo $advisor['surname']?></option>-->
                                        <!--        <?php endforeach;?>-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                        <label for="exampleInputApprover">Approver 2 (Procurement Manager)</label>
                                            <select name="procurement_manager" id="Procurement_Manager" class="form-control input-lg">
                                                <!--<option value="Direct Manager">Direct Manager</option>-->
                                                <?php foreach($manager as $manager):?>
                                                    <option value="<?= $manager['id']?>"><?php echo $manager['name']?> <?php echo $manager['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputApprover">Approver 3 (Director)</label>
                                            <select name="director" id="approver_three" class="form-control input-lg">
                                                <?php foreach($director as $director):?>-->
                                                    <option value="<?= $director['id']?>"><?php echo $director['name']?> <?php echo $director['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAttachment">Attachment</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="featuredImage" class="custom-file-input" id="exampleInputAttachment"  onChange='getFileNameWithExt(event)'>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputComment">Comments</label>
                                            <textarea name="comment" id="editor1" rows="10" cols="80" placeholder="Post your answer here. Include enough information to make the answer self-contained.
                                                Answers are not for asking new questions, commenting or saying thanks (cast a vote instead).">
                                                Dispatch plan <br>
                                                Company Requests <br>
                                                Customer Spec <br>
                                                Requirements <br>
                                                Regulatory and standard <br>
                                                Cost Sheet <br>
                                                PO <br>
                                                Contract plan
                                            </textarea>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <!-- <button type="submit" class="btn btn-outline-primary ml-2">Send</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>

<!-- Footer -->
<?php $this->load->view('employee/footer'); ?>
<!-- / Footer -->
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<script>
    $("#Procurement").validate({
        errorClass: 'error',
        errorElement: 'span',
        successClass: 'success',
        rules:{            
            name: 'required',
            item: 'required',
            quantity:'required',
            unit: 'required',
            task:'required',
            address: 'required',
            b_category: 'required',
            approver:'required',
            approver_two:'required',
            approver_three:'required'
        }
    });  
// $("#approver_three").chosen({
//      no_results_text: "Oops, nothing found!"
// });

CKEDITOR.replace( 'comment');

function getFileNameWithExt(event) {
    
      if (!event || !event.target || !event.target.files || event.target.files.length === 0) {
        return;
      }
    
      const name = event.target.files[0].name;
      const lastDot = name.lastIndexOf('.');
    
      const fileName = name.substring(0, lastDot);
      const ext = name.substring(lastDot + 1);
        if(ext == 'jpg' || ext == 'png' || ext == 'jpeg' || ext == 'pdf'){
            $(".input-group").after('<p class="text-success">File added Successfully</p>');
        }
        else{
            $(".input-group").after('<p class="text-danger">Invalid Image</p>');
        }
        
    }
    $(document).ready(function(){
        $('#task').change(function(){
            var task = $('#task').val();
            if(task != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>employee/procurement/fetch_task",
                    method:"POST",
                    data:{task:task},
                    success:function(data)
                    {
                        $('#address').html(data);
                    }
                });
            }
            else
            {
                $('#address').html('<option value="">Destination Address</option>');
            }
        });
    });
    $(document).ready(function(){
        $('#task').change(function(){
            var task = $('#task').val();
            if(task != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>employee/procurement/fetch_item",
                    method:"POST",
                    data:{task:task},
                    success:function(data)
                    {
                        $('#b_item').html(data);
                    }
                });
            }
            else
            {
                $('#b_item').html('<option value="">Budget Item</option>');
            }
        });
    });
    $(document).ready(function(){
            $('#task').change(function(){
                var task = $('#task').val();
                if(task != '')
                {
                    $.ajax({
                        url:"<?php echo base_url(); ?>employee/procurement/get_procurement_sub_category",
                        method:"POST",
                        data:{task:task},
                        success:function(data)
                        {
                            // console.log(data);
                            var data = JSON.parse(data);
                            var html = '';
                            for (var i = 0; i < data.length; i++) 
                            {
                                html += '<option value="'+data[i].sub_category+'">'+data[i].sub_category+'</option>';
                            }
                            $('#sub_category').html(html);
                            if(data == ""){
                                $('#sub_category').html('<option value="">Budget Sub Category</option>');
                                alert('Unable to select there is no sub category');
                            }
                        }
                    });
                }
                else
                {
                    $('#sub_category').html('<option value="">Destination Address</option>');
                }
            });
        });
    $(document).ready(function(){
        $('#task').change(function(){
            var task = $('#task').val();
            if(task != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>employee/procurement/fetchcategory",
                    method:"POST",
                    data:{task:task},
                    success:function(data)
                    {
                        var data = JSON.parse(data);
                            var html = '';
                            for (var i = 0; i < data.length; i++) 
                            {
                                html += '<option value="'+data[i].category+'">'+data[i].category+'</option>';
                            }
                        $('#b_category').html(html);
                        if(data == ""){
                            $('#b_category').html('<option value="">Budget Category</option>');
                            alert('Unable to select there is no category');
                        }
                    }
                });
            }
            else
            {
                $('#b_category').html('<option value="">Budget Category</option>');
            }
        });
    });
$('#Name').css('pointer-events','none'); 
</script>