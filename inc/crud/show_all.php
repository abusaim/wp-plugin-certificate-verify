<?php
global $wpdb;
// show All data
$results = $wpdb->get_results( 
    $wpdb->prepare("SELECT * FROM {$wpdb->prefix}traning_participant WHERE %d ORDER By tp_sl DESC", array( 1))
  );
  if($results){?>
    <form action="" enctype="multipart/form-data" method="post" name="upload_excel">
      <a href="<?=admin_url('tools.php?page=asjkds_csv2db&tab=add_new')?>" class="btn btn-primary">Add New</a>
    </form>
    <?php
    echo '<h2>Database Output</h2>';
    $deleteNonce = wp_create_nonce("asdscvjksaim_delete_traning_participent");
    echo '<table class="table table-hover table-bordered" id="show_all_std" data-nonce="'.$deleteNonce.'">';
    echo '<thead>';
    echo '<tr>';
    echo '<th style="width: 110px;">SL.</th>';
    echo '<th style="width: 130px;">Certificate No.</th>';
    echo '<th>Participant Name</th>';
    echo '<th>Org. Name</th>';
    echo '<th>Trining Date</th>';
    echo '<th>Traning Title</th>';
    echo '<th>Traning Vannue</th>';
    echo '<th>Remarks</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach($results as $result){
      echo '<tr>';
      echo '<td>'.$result->tp_sl.'<br><a href="'.admin_url('tools.php?page=asjkds_csv2db&tab=edit&std_id='.$result->tp_sl.'').'">Edit</a></td>';
      echo '<td>'.$result->tp_certificate_no.'</td>';
      echo '<td>'.$result->tp_name.'</td>';
      echo '<td>'.$result->tp_org_name.'</td>';
      echo '<td>'.$result->tp_date.'</td>';
      echo '<td>'.$result->tp_title.'</td>';
      echo '<td>'.$result->tp_venne.'</td>';
      echo '<td>'.$result->tp_remark.'</td>';
      echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
  }
?>