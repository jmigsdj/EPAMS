<div class="col-sm-12">
  <div class="box box-success">
    <div class="box-header with-border">
      <section class="content-header">
        <h1>
          Category Setup
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">References</a></li>
          <li class="active">Category Setup</li>
        </ol>
      </section>
      <br>
      <div class="pull-right">
        <button onclick="adder();" class="btn btn-primary"><li class="fa fa-plus"></li> Add New Category</button>
        <button onclick="editer();" class="btn btn-primary"><li class="fa fa-edit"></li></button>
        <button onclick="deleter();" class="btn btn-primary"><li class="fa fa-trash"></li></button>
      </div>

    </div id='categTable'><!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Category Table</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body no-padding">
                <table class="table table-striped">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Category Name</th>
                    <th></th>
                  </tr>
                  <?php foreach ($category as $categ_item): ?>
                          <tr>
                              <td><?php echo $categ_item['id']; ?></td>
                              <td><?php echo $categ_item['name']; ?></td>
                              <td>
                                <div class="pull-right">
                                  <button onclick="editer();" class="btn btn-primary"><li class="fa fa-edit"></li></button>
                                  <button onclick="deleter();" class="btn btn-primary"><li class="fa fa-trash"></li></button>
                                </div>
                              </td>
                          </tr>
                  <?php endforeach; ?>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
        </div>
      </div><!-- box-body -->
  </div>
</div>


<div class="modal fade" tabindex="-1" id="categModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="titles"></h4>
      </div>
      <div class="modal-body">
        <form id="categForm" name="categForm">
          <fieldset>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <i class="fa fa-codepen"></i>
                    </span>
                    <input type="text" placeholder="Enter Category" name="name" id="name" class="form-control">
                  </div>
                </div>
            </div>
          </div>
          <fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button onclick="sender();" type="button" class="btn btn-primary" id="buttonName"></button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
  function adder() {
    $('#titles').html("Create Category");
    $('#buttonName').html("Create Category");
    $('#categModal').modal('show');
  }
  function editer() {
    $('#buttonName').html("Save Changes");
    $('#titles').html("Edit Category");
    document.getElementById("name").value = "<?=$categ_item['id'] ?>";

    $('#categModal').modal('show');
  }
  function sender() {
    //ajax for sending info to controller
    $.ajax({type:'POST',
    url: '<?=base_url()?>index.php/panel/create_category',
    data:$('#categForm').serialize(),
      success: function(response) {
        if(response==1){
          $.notify({
            icon:'fa fa-check',
            message: 'Successfuly Created Category!'
          },{
            type: 'success'
          });
          $('#categModal').modal('hide');

        }
        else{
          $.notify({
            icon:'fa fa-exclamation-triangle',
            message: 'Unable to create category.'
          },{
            type: 'danger'
          });
        }
      }
    });
    //purpose: to prevent page reload
    return false;
  }

</script>
