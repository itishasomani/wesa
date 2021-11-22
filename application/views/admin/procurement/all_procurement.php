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
                            <h1 class="m-0">Procurement Management</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/view-all-request')?>">Home</a></li>
                                <li class="breadcrumb-item active">Edit Request</li>
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
                                <form method="post" action="<?php echo base_url('admin/procurement_manage');?>" id="editProcurement" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputName">Name</label>
                                            <?php if(($_SESSION['emp_type']) == '4'){?>
                                                <select name="name" class="form-control" id="name">
                                                    <?php foreach($employee as $emp):?>
                                                     <option <?php if($procurement['name'] == $emp['id']){echo 'selected';}?> value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                                <?php endforeach?>
                                                </select>
                                                <?php }
                                                 else if(($_SESSION['emp_type']) == '6' || ($_SESSION['emp_type']) == '5' || ($_SESSION['emp_type']) == '2' || ($_SESSION['emp_type']) == '3'){?>
                                                    <!--<input type="text" id="exampleInputName" name="name" value="<?php echo $leave_management['name']?>" class="form-control" readonly>-->
                                                    <select name="name" class="form-control" id="Name" readonly style="-webkit-appearance: none;" >
                                                        <?php foreach($employee as $emp):?>
                                                     <option <?php if($procurement['name'] == $emp['id']){echo 'selected';}?> value="<?=$emp['id']?>"><?=$emp['name']?> <?=$emp['surname']?></option>
                                                <?php endforeach?>
                                                    </select>
                                                <?php }?>
                                            <input type="hidden" name="id" value="<?php echo $procurement['id'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputItem">Item</label>
                                            <input type="text" id="exampleInputOther" name="item" value="<?php echo $procurement['item']?>" class="form-control" placeholder="Item">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputQuantity">Quantity</label>
                                            <input type="number" name="quantity" id="quantity" class="form-control input-lg" placeholder="Quantity" value="<?php echo $procurement['quantity'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUnit">Unit</label>
                                            <select name="unit" id="unit" class="form-control input-lg">
                                                <option <?php if($procurement['unit'] == 'Box'){echo 'selected';}?> value="Box">Box</option>
                                                <option <?php if($procurement['unit'] == 'Pallet'){echo 'selected';}?> value="Pallet">Pallet</option>
                                                <option <?php if($procurement['unit'] == 'trip'){echo 'selected';}?> value="trip">trip</option>
                                                <option <?php if($procurement['unit'] == 'pcs'){echo 'selected';}?> value="pcs">pcs</option>
                                                <option <?php if($procurement['unit'] == 'm'){echo 'selected';}?> value="m">m</option>
                                                <option <?php if($procurement['unit'] == 'm2'){echo 'selected';}?> value="m2">m2</option>
                                                <option <?php if($procurement['unit'] == 'm3'){echo 'selected';}?> value="m3">m3</option>
                                                <option <?php if($procurement['unit'] == 'tonne'){echo 'selected';}?> value="tonne">tonne</option>
                                                <option <?php if($procurement['unit'] == 'kg'){echo 'selected';}?> value="kg">kg</option>
                                                <option <?php if($procurement['unit'] == 'litre'){echo 'selected';}?> value="litre">litre</option>
                                                <option <?php if($procurement['unit'] == 'rolls'){echo 'selected';}?> value="rolls">rolls</option>
                                                <option <?php if($procurement['unit'] == 'set'){echo 'selected';}?> value="set">set</option>
                                                <option <?php if($procurement['unit'] == 'pair'){echo 'selected';}?> value="pair">pair</option>
                                                <option <?php if($procurement['unit'] == 'package'){echo 'selected';}?> value="package">package</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTask">Task</label>
                                            <select name="task" id="task" class="form-control input-lg">
                                                <?php foreach($tasks as $task):?>
                                                    <option <?php if($procurement['task'] == $task['task_name']){echo 'selected';}?> value="<?=$task['id']?>"><?=$task['task_name']?></option>
                                                <?php  endforeach?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputOther">Others</label>-->
                                        <!--    <textarea id="exampleInputother" name="other" cols="30" rows="5" class="form-control" value="<?php echo $procurement['other']?>"><?php echo $procurement['other']?></textarea>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputDestination">Destination Address</label>
                                            <select name="address" id="address" class="form-control input-lg">
                                                <?php foreach ($address as $add):?>
                                                    <option <?php if($procurement['address'] == $add['address_1']){echo 'selected';}?> value="<?=$add['address_1']?>"><?=$add['address_1']?></option>
                                                    <option <?php if($procurement['address'] == $add['address_2']){echo 'selected';}?> value="<?=$add['address_2']?>"><?php echo $add['address_2']?></option>
                                                    <option <?php if($procurement['address'] == $add['address_3']){echo 'selected';}?> value="<?=$add['address_3']?>"><?php echo $add['address_3']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTask">Budget Category</label>
                                            <select name="b_category" id="b_category" class="form-control input-lg">
                                                <?php foreach($Budget as $budget):?>
                                                    <option <?php if($procurement['b_category'] == $budget['category']){echo 'selected';}?> value="<?=$budget['category']?>"><?=$budget['category']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputTask">Budget Sub-Category</label>
                                            <select name="sub_category" id="sub_category" class="form-control input-lg">
                                                <?php foreach($Sub_category as $sub_category):?>
                                                    <option <?php if($procurement['sub_category'] == $sub_category['sub_category']){echo 'selected';}?> value="<?=$sub_category['sub_category']?>"><?=$sub_category['sub_category']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputTask">Budget Item</label>-->
                                        <!--    <select name="b_item" id="b_item" class="form-control input-lg">-->
                                        <!--        <?php foreach($b_item as $b_item):?>-->
                                        <!--            <option <?php if($procurement['b_item'] == $b_item['free_text']){echo 'selected';}?> value="<?=$b_item['free_text']?>"><?=$b_item['free_text']?></option>-->
                                        <!--        <?php endforeach;?>-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Approver 1 (Please Select Your Direct Manager)</label>
                                            <select name="direct_manager" id="direct_manager" class="form-control input-lg">
                                                <!--<option value="QMS Advisor">QMS Advisor</option>-->
                                                <?php foreach($direct_manager as $direct_manager):?>
                                                    <option <?php if($procurement['direct_manager'] == $direct_manager['id']){echo 'selected';}?> value="<?=$direct_manager['id']?>"><?=$direct_manager['name']?> <?=$direct_manager['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputApprover">Approver 2 (QMS Manager)</label>-->
                                        <!--    <select name="qms_manager" id="approver" class="form-control input-lg">-->
                                                <!--<option value="QMS Advisor">QMS Advisor</option>-->
                                        <!--        <?php foreach($advisor as $advisor):?>-->
                                        <!--            <option <?php if($procurement['qms_manager'] == $advisor['id']){echo 'selected';}?> value="<?=$advisor['id']?>"><?=$advisor['name']?> <?=$advisor['surname']?></option>-->
                                        <!--        <?php endforeach;?>-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                        <div class="form-group">
                                        <label for="exampleInputApprover">Approver 2 (Procurement Manager)</label>
                                            <select name="procurement_manager" id="approver_two" class="form-control input-lg">
                                                <!--<option value="Direct Manager">Direct Manager</option>-->
                                                <?php foreach($manager as $manager):?>
                                                    <option <?php if($procurement['procurement_manager'] == $manager['id']){echo 'selected';}?> value="<?=$manager['id']?>"><?=$manager['name']?> <?=$manager['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="exampleInputApprover">Approver 3 (Director)</label>
                                            <select name="director" id="approver_three" class="form-control input-lg" >
                                                <?php foreach($director as $director):?>
                                                    <option <?php if($procurement['director'] == $director['id']){echo 'selected';}?> value="<?=$director['id']?>"><?=$director['name']?> <?=$director['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputAttachment">Attachment</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <!--<img src="<?php echo base_url('assets/backend/dist/img/')?><?php echo $procurement['featuredImage']?>" alt="Image" class="media-object img-rounded thumb48" >-->
                                                    <input type="file" name="featuredImage" class="custom-file-input" id="exampleInputAttachment" value="<?php echo $procurement['featuredImage']?>">
                                                    <label class="custom-file-label" for="exampleInputFile" style="width: 100%;"><?php echo $procurement['featuredImage']?></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputComment">Comments</label>
                                            
                                            <textarea name="comment" id="editor1" rows="10" cols="80">
                                                <?php echo $procurement['comment']?>
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputComment">Price</label>
                                            <input type="number" name="price"  class="form-control" value="<?php echo $procurement['price']?>" id="exampleInputprice" placeholder="Price">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputComment">Supplier</label>
                                            <select name="supplier[]" id="supplier" class="form-control " multiple>
                                                <?php foreach ($vendor as $vendor):?>
                                                    <option <?php if($vendor['v_name'] == $procurement['supplier']){echo 'selected';}?> value="<?=$vendor['v_name']?>"><?=$vendor['v_name']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                            <label for="exampleInputComment">Quotation(please add link to server location where files are uploaded)</label>
                                            <input type="text" name="qutation" class="form-control"  value="<?php echo $procurement['qutation']?>" id="exampleInputprice" placeholder="Quotation">
                                        </div>
                                        <!-- <div class="form-group">-->
                                        <!--    <label for="exampleInputComment">Add approver</label>-->
                                        <!--    <input type="text" name="add_approver" class="form-control" value="<?php echo $procurement['add_approver']?>" id="exampleInputprice" placeholder="Add approver">-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label for="exampleInputApprover">Add approver</label>
                                            <select name="add_approver" id="add_approver" class="form-control input-lg">
                                                <!--<option ></option>-->
                                                <?php foreach($add_approver as $add_approver):?>
                                                    <option <?php if($procurement['add_approver'] == $add_approver['id']){echo 'selected';}?> value="<?=$add_approver['id']?>"><?=$add_approver['name']?> <?=$add_approver['surname']?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label for="exampleInputComment">Approver / Rejection </label>-->
                                        <!--    <select name="final_approver" id="status" class="form-control input-lg">-->
                                        <!--        <option <?php if($procurement['final_approver'] == ''){echo 'selected';}?> value="" disabled>Approver / Rejection </option>-->
                                        <!--        <option <?php if($procurement['final_approver'] == 'Approved'){echo 'selected';}?> value="Approved">Approve</option>-->
                                        <!--        <option <?php if($procurement['final_approver'] == 'Rejected'){echo 'selected';}?> value="Rejected">Reject</option>-->
                                        <!--    </select>-->
                                        <!--</div>-->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a href="<?php echo base_url('admin/all_request');?>" class="btn btn-primary">Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </div>

<!-- Footer -->
<?php $this->load->view('footer'); ?>
<!-- / Footer -->
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script src="https://cdn.ckeditor.com/4.16.1/standard-all/ckeditor.js"></script>
<script>
    $("#supplier").chosen({
        no_results_text: "Oops, nothing found!"
    });
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
            sub_category: 'required',
            approver:'required',
            approver_two:'required',
            approver_three:'required',
        }
    }); 
    CKEDITOR.replace( 'comment'); 
    $(document).ready(function(){
        $('#task').change(function(){
            var task = $('#task').val();
            if(task != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>admin/procurement/fetch_task",
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
                    url:"<?php echo base_url(); ?>admin/procurement/fetch_item",
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
    // $(document).ready(function(){
    //         $('#b_category').change(function(){
    //             var b_category = $('#b_category').val();
    //             if(b_category != '')
    //             {
    //                 $.ajax({
    //                     url:"<?php echo base_url(); ?>admin/procurement/fetch_category",
    //                     method:"POST",
    //                     data:{b_category:b_category},
    //                     success:function(data)
    //                     {
    //                         $('#sub_category').html(data);
    //                     }
    //                 });
    //             }
    //             else
    //             {
    //                 $('#sub_category').html('<option value="">Destination Address</option>');
    //             }
    //         });
    //     });
    $(document).ready(function(){
        $('#task').change(function(){
            var task = $('#task').val();
            if(task != '')
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>admin/procurement/fetchcategory",
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
    $(document).ready(function(){
            $('#b_category').change(function(){
                var b_category = $('#b_category').val();
                if(b_category != '')
                {
                    $.ajax({
                        url:"<?php echo base_url(); ?>admin/procurement/get_procurement_sub_category",
                        method:"POST",
                        data:{b_category:b_category},
                        success:function(data)
                        {
                            console.log(data);
                            var data = JSON.parse(data);
                            var html = '';
                            for (var i = 0; i < data.length; i++) 
                            {
                                html += '<option value="'+data[i].sub_category+'">'+data[i].sub_category+'</option>';
                            }
                            $('#sub_category').html(html);
                            if(data == ""){
                                $('#sub_category').html('<option value="">Budget Sub Category</option>');
                                // alert('Unable to select there is no sub category');
                            }
                        }
                    });
                }
                else
                {
                    $('#sub_category').html('<option value="">Budget Sub Category</option>');
                }
            });
        });
     $('#Name').css('pointer-events','none'); 
     $(document).ready(function(){
     $('#add_approver').click(function(){
         var direct_manager = $('#direct_manager option:selected').val();
         var approver_two = $('#approver_two option:selected').val();
         var approver_three = $('#approver_three option:selected').val();
         
         if(b_category != '' && approver_two !='' && approver_three!= ''){
             $.ajax({
                 url:"<?php echo base_url();?>admin/procurement/add_approver",
                 method:"POST",
                 data:{direct_manager:direct_manager,approver_two:approver_two,approver_three:approver_three},
                 dataType : 'json',
                 success:function(data){
                     var html='';
                     var html1 = '';
                     var value = '';
                        var i;
                        for(i=0; i<data.length; i++){
                            var id = data[i].id;
                            html = '<option ></option>';
                            html1 += '<option  value="'+data[i].id+'" >'+data[i].name+' '+data[i].surname+'</option>';
                            value = html + '<br>' + html1;
                        }
                     $('#add_approver').html(html1);
                 }
             });
         }
         else
            {
                $('#add_approver').html('<option value="">Add Approver</option>');
            }
         
     })
 });
</script>