<?php
add_action('admin_menu', 'asdscvjksaim_admin_menu');
function asdscvjksaim_admin_menu(){
  add_submenu_page('tools.php', 'Verify Certificate', 'Verify Certificate', 'manage_options', 'asjkds_csv2db', 'asjkds_psrp_page');
}
?>
