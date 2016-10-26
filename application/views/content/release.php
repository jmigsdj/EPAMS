<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

  <style type="text/css">
    .release-content {padding: 20px 30px;}
    .release-content h2 {font-size: 18px;}
    .release-content .form-group {width: 100%;}
    .release-content .input-group {width: 100%; overflow: hidden;}
    /*.select2-container option {opacity: 0;}*/
  </style>
</head>

<body>
  <div class="container">
    <div class="row">

      <div class="col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">
            <section class="content-header">
              <h1>Release Page</h1>
              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Dashboard</a></li>
                <li class="active"><a href="#">Release</a></li>
              </ol>
            </section>
            <br>
          </div><!-- box-body -->

          <div ><!-- /.box-header -->
            <div class="box-body">
            
              <div class="row">
                <div class="col-sm-12">
                  <div class="row release-content">

                      <h2>Please fill in the following fields:</h2>
                      <form class="form-inline" id="form-potchi">

                        <div class="col-sm-3">
                          <div class="form-group">
                            <label class="sr-only" for="select-item">Item</label>
                            <div class="input-group">
                              <div class="input-group-addon">Item</div>
                              <select class="form-control select-item select2" name="select-item">
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-3">
                          <div class="form-group">
                            <label class="sr-only" for="select-user">User</label>
                            <div class="input-group">
                              <div class="input-group-addon">User</div>
                              <select class="form-control select-user select2" name="select-user">
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-2">
                          <div class="form-group">
                            <label class="sr-only" for="release-date">Date</label>
                            <div class="input-group">
                              <div class="input-group-addon">Date</div>
                              <input type="text" name="release-date" class="form-control datepicker">
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-3">
                          <div class="form-group">
                            <label class="sr-only" for="select-status">Status</label>
                            <div class="input-group">
                              <div class="input-group-addon">Status</div>
                              <select class="form-control" name="select-status">
                                <option value="Borrowed" selected="selected">Borrow</option>
                                <option value="Returned">Return</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-1">
                          <button onclick="potchi()" class="btn btn-primary">POTCHI!!</button>
                        </div>

                      </form>
                  </div>
                </div>

                <div class="col-sm-12">
                  <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>Device ID</th>
                              <th>Device Name</th>
                              <th>Status</th>
                              <th>Potchi</th>
                          </tr>
                      </thead>
                      <tbody>
                      </tbody>
                  </table>
                </div>
              </div>



            </div><!-- box-body -->
          </div>


        </div>
      </div>
    </div>
  </div>

<script type="text/javascript">
$(document).ready(function() {
    $(".select2").select2();
    $( ".datepicker" ).datepicker({
      'format': "yyyy-mm-dd"
    });

    $.ajax({
          type: 'GET',
          url: '<?php echo site_url("release/ajax_list_asset")?>',
          dataType:'JSON',
          success: function(result) {
            result.forEach(function(result) {
              $('.select-item').append($('<option>', {value: result.device_id, text: result.device_name}));
              console.log('potchi');
            })

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert("potchi");
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);


          }
        });

    $.ajax({
          type: 'GET',
          url: '<?php echo site_url("release/ajax_list_user")?>',
          dataType:'JSON',
          success: function(result) {
            result.forEach(function(result) {
              $('.select-user').append($('<option>', {value: result.user_id, text: result.user_name}));
              console.log('potchi');
            })

          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert("potchi");
              console.log(jqXHR);
              console.log(textStatus);
              console.log(errorThrown);


          }
        });

    // table = $('#table').DataTable({

    //     "scrollX": true,
    //     "processing": true, //Feature control the processing indicator.
    //     "serverSide": true, //Feature control DataTables' server-side processing mode.
    //     "order": [], //Initial no order.

    //     // Load data for the table's content from an Ajax source
    //     "ajax": {
    //         "url": "<?php echo site_url('release/ajax_populate')?>",
    //         "type": "POST"
    //     },

    //     //Set column definition initialisation properties.
    //     "columnDefs": [
    //     {
    //         "targets": [ -1 ], //last column
    //         "orderable": false, //set not orderable
    //     },
    //     ],

    // });
});

  function potchi() {
    $.ajax({
        url: "<?php echo site_url('release/ajax_save_potchi')?>",
        type: "POST",
        data: $('#form-potchi').serializeArray(),
        dataType: "JSON",
        success: function(data)
        {
            alert('Data saved, will do tables below this one next. xD')
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log($('#form-potchi').serializeArray());
            alert('sad');
        }
    });
  }

</script>
</body>

