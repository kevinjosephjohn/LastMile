
    <?php include 'common/inc/header.php' ?>
 <script type="text/javascript">
      $(document).ready(function() {
        $('fieldset#kRoom button').click(function() {
          var buttonValue = $(this).attr('value');
          $.ajax({
              type: "POST",
              url: "/auth/index.php",
              data: "name=" + buttonValue
          }).done(function(data) {
            $('#command-output').html(data);
          });
        });
      });
    </script>

    </div>
    </div>

    <div class="page-content">

      
            <div class="content">
      <div class="page-title">
        <h3>Dashboard </h3>
      </div>

          <!-- BEGIN BASIC FORM ELEMENTS-->
        <div class="row">
            <div class="col-md-12">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Add <span class="semi-bold">Driver</span></h4>
                  <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                </div>
                <div class="grid-body no-border"> <br>
                    <fieldset id="kRoom">
                  <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                      <div class="form-group">
                        <label class="form-label">Name</label>
                        <span class="help">e.g. "Ram Kumar"</span>
                        <div class="controls">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Password</label>
                        <span class="help">minimum 6 characters</span>
                        <div class="controls">
                          <input type="password" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Email</label>
                        <span class="help">e.g. "some@example.com"</span>
                        <div class="controls">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="form-label">Phone</label>
                        <span class="help">e.g. "7708449281"</span>
                        <div class="controls">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Car Number</label>
                        <span class="help">e.g. "TN 02 E 5209"</span>
                        <div class="controls">
                          <input type="text" class="form-control">
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="form-label">Car Name</label>
                        <span class="help">e.g. "Toyota Innova"</span>
                        <div class="controls">
                          <input type="text" class="form-control">
                        </div>
                      </div>
 <button type="button" class="btn btn-primary btn-cons"><i class="fa fa-check"></i>&nbsp;Submit</button>

                    </div>
                  </div>
                </fieldset>
                </div>
              </div>
            </div>
          </div>
  <!-- END BASIC FORM ELEMENTS-->
           </div>
      <!-- END PAGE -->
<?php include 'common/inc/footer.php' ?>
