<?php
/**
* Theme Name:     Kontek
* Template Name: Projects Page
*/

get_header();

$results = $wpdb->get_results("SELECT * from wp_projects");
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
         <!--<table>
           <th>Project # </th>
            <th>Name</th>
            <th>Location</th>
            <th class='text'>Description</th>-->
            <?PHP/*
                $results = $wpdb->get_results("SELECT * from wp_projects");
                foreach($results as $row) {
                    echo "
                    <tr class='project_row' id='".$row->projectNumber."' onclick='select_project(this.id);'>
                    <!-- <td><input name='projectNumber' type='radio' value='".$row->projectNumber."'></td> -->
                    <td>".$row->projectNumber."</td>
                    <td>".$row->Facility."</td>
                    <td>".$row->Street.", ".$row->City." ".$row->State." ".$row->zip."</td>
                    <td class='text'><span>".$row->Description."</span></td>
                    </tr>
                    " ;
                }*/
                ?>
        <!--</table>-->
        <!-- NEW RESPONSIVE LAYOUT -->
        <div class='row project_head mr-1 ml-1'>
            <div class='col-2 m-0 p-0 text-left'><span>Project #</span></div>
            <div class='col-2 m-0 p-0 text-left'><span>Name</span></div>
            <div class='col m-0 p-0 text-left'><span>Location</span></div>
            <div class='col m-0 p-0 text-left' id='ProjDesc'><span>Description</span></div>
        </div>
        <?
        foreach($results as $row) {
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
