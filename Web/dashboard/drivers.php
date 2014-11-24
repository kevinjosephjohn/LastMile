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

// sending query
$result = mysql_query( "SELECT * FROM {$table}" );
if ( !$result ) {
    die( "Query to show fields from table failed" );
}

$fields_num = mysql_num_fields( $result );

echo "<table class=\"table table-hover table-condensed\" id='example'><thead><tr>";
//printing table headers
for ( $i=0; $i<$fields_num; $i++ ) {
    $field = mysql_fetch_field( $result );
    echo "<th style='width:1%'>{$field->name}</th>";
}
echo "</thead>\n";
echo "<tbody>";
echo "<tr>";

// echo " <thead>";
// echo "<tr>";
// echo"  <th style='width:1%' >";

// echo "</th>";
// echo"   <th style='width:9%''>ID</th>";
// echo"   <th style='width:9%''>NAME</th>";
// echo"   <th style='width:9%''>CAR</th>";
// echo"   <th style='width:9%''>CAR NO</th>";

// echo"   <th style='width:9%''>LAT</th>";
// echo"   <th style='width:9%''>LNG</th>";
// echo"   <th style='width:9%''>STATUS</th>";

// echo "</tr>";
// echo "</thead>";


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
?>

            <!--   <table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:1%"><div class="checkbox check-default" style="margin-right:auto;margin-left:auto;">
                        <input type="checkbox" value="1" id="checkbox1">
                        <label for="checkbox1"></label>
                      </div></th>
                    <th style="width:10%">Project Name</th>
                    <th style="width:22%" data-hide="phone,tablet">Description</th>
                    <th style="width:6%">Price</th>
                    <th style="width:10%" data-hide="phone,tablet">Progress</th>
                  </tr>
                </thead>
                <tbody>
             
                  <tr>
                    <td><div class="checkbox check-default">
                        <input type="checkbox" value="3" id="checkbox4">
                        <label for="checkbox4"></label>
                      </div></td>
                    <td>PHP Login page</td>
                    <td class="v-align-middle"><span class="muted">A project in business and science is typically defined</span></td>
                    <td><span class="muted">$5,400</span></td>
                    <td><div class="progress progress-info">
                        <div data-percentage="60%"  class="progress-bar progress-bar-primary animate-progress-bar"></div>
                      </div></td>
                  </tr>
                       <tr>
                    <td><div class="checkbox check-default">
                        <input type="checkbox" value="3" id="checkbox4">
                        <label for="checkbox4"></label>
                      </div></td>
                    <td>PHP Login page</td>
                    <td class="v-align-middle"><span class="muted">A project in business and science is typically defined</span></td>
                    <td><span class="muted">$5,400</span></td>
                    <td><div class="progress progress-info">
                        <div data-percentage="60%"  class="progress-bar progress-bar-primary animate-progress-bar"></div>
                      </div></td>
                  </tr>
                       <tr>
                    <td><div class="checkbox check-default">
                        <input type="checkbox" value="3" id="checkbox4">
                        <label for="checkbox4"></label>
                      </div></td>
                    <td>PHP Login page</td>
                    <td class="v-align-middle"><span class="muted">A project in business and science is typically defined</span></td>
                    <td><span class="muted">$5,400</span></td>
                    <td><div class="progress progress-info">
                        <div data-percentage="60%"  class="progress-bar progress-bar-primary animate-progress-bar"></div>
                      </div></td>
                  </tr>
               
             
             
             
                
                </tbody>
              </table> -->
            </div>
          </div>

      </div>
           </div>
      <!-- END PAGE -->
<?php include 'common/inc/footer.php' ?>
