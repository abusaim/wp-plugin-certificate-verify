<nav class="nav-tab-wrapper woo-nav-tab-wrapper">
    <a href="<?=admin_url('tools.php?page=asjkds_csv2db')?>" class="nav-tab <?=(!(isset($_GET['tab'])))?'nav-tab-active':''?>">General</a>  
    <a href="<?=admin_url('tools.php?page=asjkds_csv2db&tab=show_all')?>" class="nav-tab <?=((isset($_GET['tab'])) && $_GET['tab'] == 'show_all')?'nav-tab-active':''?>">All Data</a>		
    <a href="<?=admin_url('tools.php?page=asjkds_csv2db&tab=add_new')?>" class="nav-tab <?=((isset($_GET['tab'])) && $_GET['tab'] == 'add_new')?'nav-tab-active':''?>">Add New</a>	
    <a href="<?=admin_url('tools.php?page=asjkds_csv2db&tab=import')?>" class="nav-tab <?=((isset($_GET['tab'])) && $_GET['tab'] == 'import')?'nav-tab-active':''?>">Import</a>
    <a href="<?=admin_url('tools.php?page=asjkds_csv2db&tab=export')?>" class="nav-tab <?=((isset($_GET['tab'])) && $_GET['tab'] == 'export')?'nav-tab-active':''?>">Export</a>	
</nav>