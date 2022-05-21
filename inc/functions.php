<?php 
// Admin Menu Page
include 'temp-parts/admin_menu_page.php';

// CSS & JS
include 'temp-parts/assetes.php';

// Shortcode & fucntion
include 'temp-parts/shortcode.php';


function asjkds_psrp_page(){?>
  <div class="asdscvjksaim_wrap">
    <?php
    // Tab Nav
    include_once('temp-parts/nav.php');
    // Tab Content
    if(isset($_GET['tab'])){
      $active_tab = $_GET['tab'];
      if($active_tab == 'add_new'){
        // Add New Particiapnt
        include_once( 'crud/add_new.php' );
      }elseif($active_tab == 'show_all'){
        // Show All Participants and Export CSV
        include_once( 'crud/show_all.php' );
      }elseif($active_tab == 'import'){
        // Import CSV
        include 'temp-parts/csv_import.php';
      }elseif($active_tab == 'export'){
        // Export CSV
        include 'temp-parts/csv_export.php';
      }elseif($active_tab == 'edit'){
        // Edit Participant
        include_once( 'crud/edit.php' );
      }else{
        // Welcome and introduction
        include 'temp-parts/welcome.php';
      }
    }else{
      // Welcome and introduction
      include 'temp-parts/welcome.php';
    }
  echo '</div>';
}

