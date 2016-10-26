<div class="col-sm-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <section class="content-header">
        <h1>
          Release Setup
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Dashboard</a></li>
          <li><a href="#">Setup</a></li>
          <li class="active"><a href="#">Release</a></li>
        </ol>
      </section>
      <br>
    </div><!-- box-body -->
    <div ><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="container">
              <h1 style="font-size:20pt">Release Page</h1>
              <br />
              <button class="btn btn-success" onclick="borrow_asset()"><i class="glyphicon glyphicon-arrow-down"></i> Borrow</button>
              <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
              <br />
              <br />
              <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                      <tr>
                          <th>Device ID</th>
                          <th>Name</th>
                          <th>Model</th>
                          <th>Resolution</th>
                          <th>Processor</th>
                          <th>Ram</th>
                          <th>Os</th>
                          <th>Gpu</th>
                          <th>x32/x64</th>
                          <th>Sim Support</th>
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
                        <th>Name</th>
                        <th>Model</th>
                        <th>Resolution</th>
                        <th>Processor</th>
                        <th>Ram</th>
                        <th>Os</th>
                        <th>Gpu</th>
                        <th>x32/x64</th>
                        <th>Sim Support</th>
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
        "url": "<?php echo site_url('release/ajax_list')?>",
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


function borrow_asset()
{
$('#form')[0].reset(); // reset form on modals
$('.form-group').removeClass('has-error'); // clear error class
$('.help-block').empty(); // clear error string
$('#modal_form').modal('show'); // show bootstrap modal
$('.modal-title').text('Borrow Asset'); // Set Title to Bootstrap modal title
}

function reload_table()
{
table.ajax.reload(null,false); //reload datatable ajax
}

function borrower(){

}

function returner(){

}

//Select Options
  $('#emp_id').select2({
    placeholder: 'Input Employee name',
    ajax:{
      url:'<?=base_url()?>/release/select_employee',
      dataType: 'json',
      data: function (name, page) {
            return { name: name };
        },
      results: function (data,page){
        return {results: data};
      }
    }
  });

  $('#item_id').select2({
    placeholder: 'Input Item name',
    ajax:{
      url:'<?=base_url()?>/release/select_item',
      dataType: 'json',
      data: function (name, page) {
            return { name: name };
        },
      results: function (data,page){
        return {results: data};
      }
    }
  });


</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="modal-title">Borrow Form</h3>
        </div>
        <div class="modal-body form">
            <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="id"/>
                <div class="form-body">
                  <div class="form-group">
                      <label for="sel1" class="control-label col-md-3">Employee Name</label>
                      <div class="col-md-9">
                          <input type="hidden" name="emp_id" id="emp_id" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="sel1" class="control-label col-md-3">Item Name</label>
                      <div class="col-md-9">
                          <input type="hidden" name="item_id" id="item_id" class="form-control">
                    </div>
                  </div>
                  <input type="hidden" name="status_id" value="" id="status_id">
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="borrow()" class="btn btn-primary">Borrow</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
