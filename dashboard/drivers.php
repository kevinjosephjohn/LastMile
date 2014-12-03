<?php include 'common/inc/header.php' ?>


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

              <div class="grid simple ">
            <div class="grid-title">
              <h4>Driver <span class="semi-bold">List</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">

<?php

$db_host = 'localhost';
$db_user = 'laundry';
$db_pwd = 'awesomegod321';

$database = 'laundry';
$table = 'drivers';

if ( !mysql_connect( $db_host, $db_user, $db_pwd ) )
    die( "Can't connect to database" );

if ( !mysql_select_db( $database ) )
    die( "Can't select database" );
/**
 **/
if (isset($_GET['status']) && $_GET['status'] != '') {
    // Get status
    $status = $_GET['status'];
    // Include Database handler
    // response Array
    $response = array("status" => $status, "success" => 0, "error" => 0);
    // check for status type
    if ($status == 'all') {
    
// sending query
$result = mysql_query( "SELECT * FROM {$table}" );
if ( !$result ) {
    die( "Query to show fields from table failed" );
}

$fields_num = mysql_num_fields( $result );

echo "<table class=\"table table-hover table-condensed\"><thead><tr>";
//printing table headers
for ( $i=0; $i<$fields_num; $i++ ) {
    $field = mysql_fetch_field( $result );
    echo "<th style='width:1%'>{$field->name}</th>";
}
echo "</thead>\n";
echo "<tbody>";
echo "<tr>";
// printing table rows
while ( $row = mysql_fetch_row( $result ) ) {
    echo "<tr>";
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach ( $row as $cell )
        echo "<td class='v-align-middle'>$cell</td>";

    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
mysql_free_result( $result );

    }
  else if ($status == 'busy'){
// sending query
$result = mysql_query( "SELECT * 
    FROM   drivers
    WHERE  idle=0" );
if ( !$result ) {
    die( "Query to show fields from table failed" );
}

$fields_num = mysql_num_fields( $result );

echo "<table class=\"table table-hover table-condensed\"><thead><tr>";
//printing table headers
for ( $i=0; $i<$fields_num; $i++ ) {
    $field = mysql_fetch_field( $result );
    echo "<th style='width:1%'>{$field->name}</th>";
}
echo "</thead>\n";
echo "<tbody>";
echo "<tr>";
// printing table rows
while ( $row = mysql_fetch_row( $result ) ) {
    echo "<tr>";
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach ( $row as $cell )
        echo "<td class='v-align-middle'>$cell</td>";

    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
mysql_free_result( $result );
}
else if ($status == 'idle'){
    
// sending query
$result = mysql_query( "SELECT * FROM {$table}" );
if ( !$result ) {
    die( "Query to show fields from table failed" );
}

$fields_num = mysql_num_fields( $result );

echo "<table class=\"table table-hover table-condensed\"><thead><tr>";
//printing table headers
for ( $i=0; $i<$fields_num; $i++ ) {
    $field = mysql_fetch_field( $result );
    echo "<th style='width:1%'>{$field->name}</th>";
}
echo "</thead>\n";
echo "<tbody>";
echo "<tr>";
// printing table rows
while ( $row = mysql_fetch_row( $result ) ) {
    echo "<tr>";
    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach ( $row as $cell )
        echo "<td class='v-align-middle'>$cell</td>";

    echo "</tr>";

}
echo "</tbody>";
echo "</table>";
mysql_free_result( $result );
}
else {
         $response["error"] = 3;
         $response["error_msg"] = "JSON ERROR";
        echo json_encode($response);
    }
} else {
    echo "hello";
}
?>


           
            </div>
          </div>

      </div>
           </div>
      <!-- END PAGE -->
<?php include 'common/inc/footer.php' ?>
