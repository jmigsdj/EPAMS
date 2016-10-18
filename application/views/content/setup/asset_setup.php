<div class="col-sm-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <section class="content-header">
        <h1>
          Asset Setup
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Setup</a></li>
          <li class="active"><a href="#">Asset</a></li>
        </ol>
      </section>
      <br>
    </div><!-- box-body -->
    <div ><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="container">
              <h1 style="font-size:20pt">Assets Datatable</h1>
              <br />
              <button class="btn btn-success" onclick="add_asset()"><i class="glyphicon glyphicon-plus"></i> Add Asset</button>
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
              <br />
              <br />
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Device ID</th>
                          <th>Barcode</th>
                          <th>Name</th>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Resolution</th>
                          <th>Processor</th>
                          <th>Ram</th>
                          <th>Os</th>
                          <th>Chipset</th>
                          <th>Gpu</th>
                          <th>Bit</th>
                          <th>Screen Size</th>
                          <th>Graphics</th>
                          <th>Internal Storage</th>
                          <th>Sim Support</th>
                          <th>Arrival Date</th>
                          <th>Arrival Notes</th>
                          <th>Serial</th>
                          <th>Asset Type</th>
                          <th>Sub Asset</th>
                          <th>Imei</th>
                          <th>Storage Allocation</th>
                          <th>Category</th>
                          <th>Condition</th>
                          <th>Status</th>
                          <th style="width:125px;">Action</th>
                      </tr>
                  </thead>

                  <tbody>
                  </tbody>

                  <tfoot>
                      <tr>
                          <th>Device ID</th>
                          <th>Barcode</th>
                          <th>Name</th>
                          <th>Brand</th>
                          <th>Model</th>
                          <th>Resolution</th>
                          <th>Processor</th>
                          <th>Ram</th>
                          <th>Os</th>
                          <th>Chipset</th>
                          <th>Gpu</th>
                          <th>Bit</th>
                          <th>Screen Size</th>
                          <th>Graphics</th>
                          <th>Internal Storage</th>
                          <th>Sim Support</th>
                          <th>Arrival Date</th>
                          <th>Arrival Notes</th>
                          <th>Serial</th>
                          <th>Asset Type</th>
                          <th>Sub Asset</th>
                          <th>Imei</th>
                          <th>Storage Allocation</th>
                          <th>Category</th>
                          <th>Condition</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </tfoot>
              </table>
          </div> <!-- end of container -->
        </div>
      </div><!-- box-body -->
    </div>
  </div>
</div>



<script type="text/javascript">

var save_method; //for save method string
var table;

$(document).ready(function() {

//datatables
table = $('#table').DataTable({

    "scrollX": true,
    "processing": true, //Feature control the processing indicator.
    "serverSide": true, //Feature control DataTables' server-side processing mode.
    "order": [], //Initial no order.

    // Load data for the table's content from an Ajax source
    "ajax": {
        "url": "<?php echo site_url('asset/ajax_list')?>",
        "type": "POST"
    },

    //Set column definition initialisation properties.
    "columnDefs": [
    {
        "targets": [ -1 ], //last column
        "orderable": false, //set not orderable
    },
    ],

});

//datepicker
$('.datepicker').datepicker({
    autoclose: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    orientation: "top auto",
    todayBtn: true,
    todayHighlight: true,
});

//set input/textarea/select event when change value, remove class error and remove text help block
$("input").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});
$("textarea").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});
$("select").change(function(){
    $(this).parent().parent().removeClass('has-error');
    $(this).next().empty();
});

});



function add_asset()
{
save_method = 'add';
$('#form')[0].reset(); // reset form on modals
$('.form-group').removeClass('has-error'); // clear error class
$('.help-block').empty(); // clear error string
$('#modal_form').modal('show'); // show bootstrap modal
$('.modal-title').text('Add Asset'); // Set Title to Bootstrap modal title
}

function edit_asset(id)
{
save_method = 'update';
$('#form')[0].reset(); // reset form on modals
$('.form-group').removeClass('has-error'); // clear error class
$('.help-block').empty(); // clear error string

//Ajax Load data from ajax
$.ajax({
    url : "<?php echo site_url('asset/ajax_edit/')?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {

        $('[name="id"]').val(data.id);
        $('[name="empId"]').val(data.empId);
        $('[name="firstName"]').val(data.firstName);
        $('[name="lastName"]').val(data.lastName);
        $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Edit Employee'); // Set title to Bootstrap modal title

    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error get data from ajax');
    }
});
}

function reload_table()
{
table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{
$('#btnSave').text('saving...'); //change button text
$('#btnSave').attr('disabled',true); //set button disable
var url;

if(save_method == 'add') {
    url = "<?php echo site_url('asset/ajax_add')?>";
} else {
    url = "<?php echo site_url('asset/ajax_update')?>";
}

// ajax adding data to database
$.ajax({
    url : url,
    type: "POST",
    data: $('#form').serialize(),
    dataType: "JSON",
    success: function(data)
    {

        if(data.status) //if success close modal and reload ajax table
        {
            $('#modal_form').modal('hide');
            reload_table();
        }
        else
        {
            for (var i = 0; i < data.inputerror.length; i++)
            {
                $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
            }
        }
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',false); //set button enable


    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert('Error adding / update data');
        $('#btnSave').text('save'); //change button text
        $('#btnSave').attr('disabled',false); //set button enable

    }
});
}

function delete_asset(id)
{
if(confirm('Are you sure delete this data?'))
{
    // ajax delete data to database
    $.ajax({
        url : "<?php echo site_url('asset/ajax_delete')?>/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            //if success reload ajax table
            $('#modal_form').modal('hide');
            reload_table();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error deleting data');
        }
    });

}
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Asset Form</h3>
        </div>
        <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="id"/>
                <div class="form-body">
                    <div class="form-group">
                      <label class="control-label col-md-3">Device Id</label>
                      <div class="col-md-9">
                          <input name="device_id" placeholder="Device Id" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3">Barcode</label>
                      <div class="col-md-9">
                          <input name="barcode" placeholder="Barcode" class="form-control" type="text">
                          <span class="help-block"></span>
                      </div>
                    </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Name</label>
                  <div class="col-md-9">
                      <input name="name" placeholder="Name" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Brand</label>
                  <div class="col-md-9">
                      <input name="brand" placeholder="Brand" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Model</label>
                  <div class="col-md-9">
                      <input name="model" placeholder="Model" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Resolution</label>
                  <div class="col-md-9">
                      <input name="resolution" placeholder="Resolution" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Processor</label>
                  <div class="col-md-9">
                      <input name="processor" placeholder="Processor" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Ram</label>
                  <div class="col-md-9">
                      <input name="ram" placeholder="Ram" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Os</label>
                  <div class="col-md-9">
                      <input name="os" placeholder="Os" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Chipset</label>
                  <div class="col-md-9">
                      <input name="chipset" placeholder="Chipset" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Gpu</label>
                  <div class="col-md-9">
                      <input name="gpu" placeholder="Gpu" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Bit</label>
                  <div class="col-md-9">
                      <input name="bit" placeholder="Bit" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Screen Size</label>
                  <div class="col-md-9">
                      <input name="screenSize" placeholder="Screen Size" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Graphics</label>
                  <div class="col-md-9">
                      <input name="graphics" placeholder="Graphics" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Internal Storage</label>
                  <div class="col-md-9">
                      <input name="internalStorage" placeholder="Internal Storage" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Sim Support</label>
                  <div class="col-md-9">
                      <input name="simSupport" placeholder="Sim Support" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Arrival Date</label>
                  <div class="col-md-9">
                      <input name="arrivalDate" placeholder="Arrival Date" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Arrival Notes</label>
                  <div class="col-md-9">
                      <input name="arrivalNotes" placeholder="Arrival Notes" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Serial</label>
                  <div class="col-md-9">
                      <input name="serial" placeholder="Serial" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Asset Type</label>
                  <div class="col-md-9">
                      <input name="assetType" placeholder="Asset Type" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Sub Asset</label>
                  <div class="col-md-9">
                      <input name="subAsset" placeholder="Sub Asset" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Imei</label>
                  <div class="col-md-9">
                      <input name="imei" placeholder="Imei" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Storage Allocation</label>
                  <div class="col-md-9">
                      <input name="storageAllocation" placeholder="Storage Allocation" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Category</label>
                  <div class="col-md-9">
                      <input name="category_id" placeholder="Category" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Condition</label>
                  <div class="col-md-9">
                      <input name="condition_id" placeholder="Condition" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-md-3">Status</label>
                  <div class="col-md-9">
                      <input name="status_id" placeholder="Status" class="form-control" type="text">
                      <span class="help-block"></span>
                  </div>
                </div>
                <div class="form-group">
                    <label for="sel1" class="control-label col-md-3">Shift</label>
                    <div class="col-md-9">
                        <select class="form-control" id="sel1" name="shiftName">
                          <option>----</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                        </select>
                  </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
