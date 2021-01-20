<?php
/**
* Theme Name:     Kontek
* Template Name: Projects Page
*/

get_header();

if(get_current_user_id() == '1') {
  $results = $wpdb->get_results("SELECT * from wp_projects");
} else {
  $results = $wpdb->get_results("SELECT * from wp_projects where userID='".get_current_user_id()."'");
}
echo "<script>console.log('user id -> ".get_current_user_id()."')</script>";

?>

<main id="site-content" role="main">


<form name="choose-project" action="<? echo site_url(); ?>/order-spare-parts" method="POST">
<div class="row">
    <div class="col"></div>
    <div class="col-6">
        <h2 class="welcome-home-message text-center"><b>Welcome <? foreach ($results  as $row) {echo $row->Facility;} ?>!</b></h2>
    </div>
    <div class="col"></div>
</div>
<!-- The following code needs to be converted from tables to bootstrap cols for mobile -->
<div class="row">
    <div class="col"></div>
    <div class="col-sm-12 col-lg-10">

        <!-- NEW RESPONSIVE LAYOUT -->
        <div class='row project_head mr-1 ml-1'>
            <div class='col-2 m-0 p-0 text-left'><span>Project #</span></div>
            <div class='col-2 m-0 p-0 text-left'><span>Name</span></div>
            <div class='col m-0 p-0 text-left'><span>Location</span></div>
            <div class='col m-0 p-0 text-left' id='ProjDesc'><span>Description</span></div>
        </div>
        <?
        foreach($results as $row) {

			echo "<script>console.log('project number -> ".$row->projectNumber."')</script>";
			
            echo "
        <div class='row project_row mr-1 ml-1' id='".$row->projectNumber."' onclick='select_project(this.id);'>
            <div class='col-2 m-0 p-0 text-left'><span>".$row->projectNumber."</span></div>
            <div class='col-2 m-0 p-0 text-left'><span>".$row->Facility."</span></div>
            <div class='col m-0 p-0 text-left'><span>".$row->Street.", ".$row->City." ".$row->State." ".$row->zip."</span></div>
            <div class='col m-0 p-0 text-left'><span>".$row->Description."</span></div>
        </div>
        ";
        }?>
    </div>
    <div class="col"></div>
</div>
<div class="row">
    <div class="col text-center">

    </div>
</form>


</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php get_footer(); ?>
