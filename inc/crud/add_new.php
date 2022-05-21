<?php 
// Path: inc\func.php
// Compare this snippet from inc\func.php:
$msg = '';
$certificate_id = $std_name = $org_name = $traning_date = $traning_title = $vannue = $remark = '';
if(isset($_POST['asds_submit'])){
    global $wpdb;
    $certificate_id = $_POST['asds_certi'];
    $std_name = $_POST['asds_name'];
    $org_name = $_POST['asds_org'];
    $traning_date = $_POST['asds_date'];
    $traning_title = $_POST['asds_title'];
    $vannue = $_POST['asds_vannue'];
    $remark = $_POST['asds_remark'];
    $query_action = $wpdb->insert($wpdb->prefix.'traning_participant', array(
        'tp_certificate_no' => $certificate_id,
        'tp_name' => $std_name,
        'tp_org_name' => $org_name,
        'tp_date' => $traning_date,
        'tp_title' => $traning_title,
        'tp_venne' => $vannue,
        'tp_remark' => $remark,
    ));
    if($query_action){
        $msg = '<div class="alert alert-success">Successfully Added!</div>';
    }else{
        $msg = '<div class="alert alert-danger">Sory, Data Added Failed, Contact with Dev Team.</div>';
    }
    $msg .= '<a href="'.admin_url('tools.php?page=asjkds_csv2db&tab=add_new').'" class="btn btn-primary">Add New</a>';
}
?>
<div class="asds_headerTitle">
        <h1>Add New perticipent Info</h1>
        <?=$msg?>
    </div>
    <div class="asds_headerFilter">
        <form method="post" action="" class="row">
            <div class="col-12 col-md-7 col-lg-6">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input class="form-control" type="text" name="asds_name" id="asds_name" placeholder="Full Name" value="<?=$std_name?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Certificate No<sup>*</sup></label>
                    <input class="form-control" type="text" name="asds_certi" id="asds_certi" placeholder="XX-XXXX" value="<?=$certificate_id?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Organization Name</label>
                    <input class="form-control" type="text" name="asds_org" id="asds_org" value="<?=$org_name?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Traning Date</label>
                    <input class="form-control" type="text" name="asds_date" id="asds_date" value="<?=$traning_date?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Traning Title</label>
                    <input class="form-control" type="text" name="asds_title" id="asds_title" value="<?=$traning_title?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Vannue</label>
                    <input class="form-control" type="text" name="asds_vannue" id="asds_vannue" value="<?=$vannue?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Remark</label>
                    <textarea name="asds_remark" id="asds_remark" class="form-control"><?=$remark?></textarea>
                </div>
            </div>
            <div class="asds_headerFilter_right">
                <input type="submit" name="asds_submit" class="btn btn-primary" value="Add New">

                <a href="<?=admin_url('tools.php?page=asjkds_csv2db&tab=show_all')?>">view all</a>
            </div>
        </form>
    </div>
</div>
