<?php 
// Import CSV
if (isset($_POST['asds_import'])){
    asdscvjksaim_import_csv();
}
function asdscvjksaim_import_csv(){
    global $wpdb;
    if (is_uploaded_file($_FILES['asfilename']['tmp_name'])){
        $file = $_FILES['asfilename']['tmp_name'];
        $file_data = $_FILES['asfilename']['tmp_name'];
        $handle = fopen($file_data, "r");
        $c = 0;
        $products_query = "INSERT INTO ".$wpdb->prefix."traning_participant (tp_certificate_no, tp_name, tp_org_name, tp_date, tp_title, tp_venne, tp_remark) VALUES ";
        $data = array();
        $i = 0;
        while(($filesop = fgetcsv($handle, 1000, ",")) !== false){
            if($i > 0){
                $certi = $filesop[1];
                $std_name = $filesop[2];
                $org_name = $filesop[3];
                $trn_date = $filesop[4];
                $trn_title = $filesop[5];
                $vennue = $filesop[6];
                $remarks = $filesop[7];
                $products_query .= $wpdb->prepare(
                "(%s, %s, %s, %s, %s, %s, %s),", $certi, $std_name, $org_name, $trn_date, $trn_title, $vennue, $remarks
                );
            }
            $i++;
        }
        $products_query = rtrim( $products_query, ',' ) . ';';
        if($wpdb->query( $products_query )){?>
            <div class="alert alert-success"><?=$i-1?> Rows uploaded successfully.</div>
        <?php
        }else{?>
            <div class="alert alert-danger">Error: <?=$_FILES['asfilename']['error']?></div>
        <?php
        }
    }else{?>
        <div class="alert alert-danger">Error: <?=$_FILES['asfilename']['error']?></div>
    <?php
    }    
}
?>
<h4>This plugin will import a CSV file into the database.</h4>
<p>Upload new <strong>csv</strong> by browsing to file and clicking on Upload<br>
<form enctype='multipart/form-data' action='' method='post'>
    <strong>File name to import:</strong><br />
    <input size='50' type='file' name='asfilename'><br />
    <input type='submit' name='asds_import' value='Upload'></form>
</p>