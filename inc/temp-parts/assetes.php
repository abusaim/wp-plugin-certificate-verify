<?php 
add_action('admin_enqueue_scripts', 'asdscvjksaim_admin_enqueue_scripts');
function asdscvjksaim_admin_enqueue_scripts(){
  if ( isset( $_GET["page"] ) &&  $_GET["page"] == "asjkds_csv2db" ){
    wp_enqueue_style('asdscvjksaim_bootstrap_style', plugins_url('../../assets/css/bootstrap.min.css', __FILE__));        
    wp_enqueue_style('asdscvjksaim_admin_style', plugins_url('../../assets/css/main.css', __FILE__));        
    wp_enqueue_script('asdscvjksaim_admin_script', plugins_url('../../assets/js/main.js', __FILE__));
  }
}
?>