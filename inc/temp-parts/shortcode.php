<?php 
function asdsvcjk_verify(){
    $certifiNo = $results = '';
    if(isset($_POST['certi_no'])){
        $certifiNo = $_POST['certi_no'];
        global $wpdb;
        $results = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}traning_participant WHERE tp_certificate_no = '$certifiNo'", OBJECT );
    }
    $html = '<div class="validityCheck">
        <div class="container">
            <form class="form-inline" method="post" action="">
                <div class="input-group">
                    <div class="custom-file">
                    <input type="text" class="form-control" id="certificateNo" placeholder="Certificate No." name="certi_no" value="'.$certifiNo.'">
                    </div>
                    <div class="input-group-append">
                    <button type="submit" class="btn btn-outline-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>';
            if($results){
                $tpName = $results[0] -> tp_name;
                $tpSL = $results[0] -> tp_sl;
                $tpOrg = $results[0] -> tp_org_name;
                $tpDate = $results[0] -> tp_date;
                $tpTitle = $results[0] -> tp_title;
                $tpVenne = $results[0] -> tp_venne;
                $html .= '<div class="alert alert-success" role="alert">Valid certificate.<br>
                            This is to certify that, this certificate was issued by HMS and also valid. <br>
                            Details of the mentioned certificate is as below:</div>';
                $html .= '<div class="bs-callout bs-callout-info">
                    <h3>The Traning Summary</h3>
                    <p><strong>Certificate No</strong>: '.$certifiNo.'</p>
                    <p><strong>Participant Name</strong>: '.$tpName.'</p>
                    <p><strong>Org. Name</strong>: '.$tpOrg.'</p>
                    <p><strong>Training Date</strong>: '.$tpDate.'</p>
                    <p><strong>Traininig Title</strong>: '.$tpTitle.'</p>
                    <p><strong>Training Venue</strong>: '.$tpVenne.'</p>
                </div>';
            }else if($certifiNo != ''){
                $html .= '<div class="alert alert-danger" role="alert">Sorry, no record found. For further query, please contact us</div>';
            }
        $html .= '</div>
    </div>';
	return $html;
}
add_shortcode( 'asdsvcjk', 'asdsvcjk_verify' );
?>