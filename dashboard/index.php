<?php include 'common/inc/header.php' ;
$db_host = 'localhost';
$db_user = 'laundry';
$db_pwd = 'awesomegod321';
$database = 'laundry';
$table = 'drivers';

if ( !mysql_connect( $db_host, $db_user, $db_pwd ) )
    die( "Can't connect to database" );


if ( !mysql_select_db( $database ) )
    die( "Can't select database" );
  $all = mysql_query( "SELECT *
    FROM   drivers" );
if ( !$all ) {
    die( "Query to show fields from table failed" );
}

$alldrivers = mysql_num_rows( $all );


if ( !mysql_select_db( $database ) )
    die( "Can't select database" );
  $busy = mysql_query( "SELECT *
    FROM   drivers
    WHERE  idle=0" );
if ( !$busy ) {
    die( "Query to show fields from table failed" );
}

$busydrivers = mysql_num_rows( $busy );

$idle = mysql_query( "SELECT *
    FROM   drivers
    WHERE  idle=1" );
if ( !$idle ) {
    die( "Query to show fields from table failed" );
}

$idledrivers = mysql_num_rows( $idle );

$offline = mysql_query( "SELECT *
    FROM   drivers
    WHERE  idle=2" );
if ( !$offline ) {
    die( "Query to show fields from table failed" );
}

$offlinedrivers = mysql_num_rows( $offline );

    ?>

		
	</div>
	</div>
	<!-- BEGIN SCROLL UP HOVER -->
	<!-- END SCROLL UP HOVER -->
	<!-- END MENU -->
	<!-- BEGIN SIDEBAR FOOTER WIDGET -->

	<!-- END SIDEBAR FOOTER WIDGET -->
	<!-- END SIDEBAR --> 
	<!-- BEGIN PAGE CONTAINER-->
	<div class="page-content"> 
		  
			<!-- BEGIN PAGE TITLE -->
		
			<!-- END PAGE TITLE -->
			<!-- BEGIN PlACE PAGE CONTENT HERE -->
			<div class="content">
      <div class="page-title">
        <h3>Dashboard </h3>
      </div>
      <div id="container">
        <div class="row spacing-bottom 2col">
          <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
            <div class="tiles blue added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title"> ALL DRIVERS </div>
                <div class="heading"> <span class="animate-number" data-value="<?php echo $alldrivers ?>" data-animation-duration="1200">0</span></div>
                <div class="progress transparent progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="59.8%"></div>
                </div>
                <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% higher <span class="blend">than last month</span></span></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
            <div class="tiles green added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title">IN RIDE </div>
                <div class="heading"> <span class="animate-number" data-value="<?php echo $busydrivers ?>" data-animation-duration="1000">º</span> </div>
                <div class="progress transparent progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="79%" ></div>
                </div>
                <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 2% higher <span class="blend">than last month</span></span></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 spacing-bottom">
            <div class="tiles red added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title">IDLE DRIVERS</div>
                <div class="heading">  <span class="animate-number" data-value="<?php echo $idledrivers ?>" data-animation-duration="1200">100</span> </div>
                <div class="progress transparent progress-white progress-small no-radius">
                  <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="45%" ></div>
                </div>
                <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 5% higher <span class="blend">than last month</span></span></div>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="tiles purple added-margin">
              <div class="tiles-body">
                <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title">OFFLINE DRIVERS</div>
                <div class="row-fluid">
                  <div class="heading"> <span class="animate-number" data-value="<?php echo $offlinedrivers ?>" data-animation-duration="300"></span> </div>
                  <div class="progress transparent progress-white progress-small no-radius">
                    <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="92%"></div>
                  </div>
                </div>
                <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 3% higher <span class="blend">than last month</span></span></div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
           </div>
      <!-- END PAGE -->

<?php include 'common/inc/footer.php' ?>

 