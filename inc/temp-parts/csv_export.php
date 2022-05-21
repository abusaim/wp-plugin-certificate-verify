<?php 
global $wpdb;
$totalRow = $wpdb->get_results( 
    $wpdb->prepare("SELECT COUNT(tp_sl) FROM {$wpdb->prefix}traning_participant WHERE %d", array( 1))
);
$totalRow = $totalRow[0]->{'COUNT(tp_sl)'};
// Export data to CSV
if(isset($_POST["asds_export"])){
    global $wpdb;
    $filename = 'traning_participant_list';
    $date = date("Y-m-d");
    $output = fopen('php://output', 'w');
    $result = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}traning_participant", ARRAY_A);
    fputcsv( $output, array('Sl.', 'Certificate No.', 'Participant Name', 'Org. Name', 'Training Date', 'Traininig Title', 'Training venue', 'Remarks'));
    foreach ( $result as $key => $value ) {
        $modified_values = array(
            $value['tp_sl'],
            $value['tp_certificate_no'],
            $value['tp_name'],
            $value['tp_org_name'],
            $value['tp_date'],
            $value['tp_title'],
            $value['tp_venne'],
            $value['tp_remark']
        );
        fputcsv( $output, $modified_values );
    }
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    header('Content-Type: text/csv; charset=utf-8');
    header("Content-Disposition: attachment; filename=\"" . $filename . " " . $date . ".csv\";" );
    header("Content-Transfer-Encoding: binary");exit;   
}
if($totalRow){?>
    <form action="" enctype="multipart/form-data" method="post" name="upload_excel">
        <p>Total No of Participant are: <?=$totalRow?></p>
        <button class="btn btn-primary" type="submit" name="asds_export">Export all Data</button>
    </form>
    <?php 
}
?>