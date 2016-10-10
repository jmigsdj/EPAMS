<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=base_url()?>media/comp_logo/no_image_found.png" class="img-circle-25" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p style="white-space:normal;  max-width:155px;">EPAMS</p>
            </div>
        </div>
<!-- /.search form -->
<!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"><h5>Menu</h5></li>
            <li class="treeview active"><a href="javascript:void(0);" onclick="loader('panel','dashboard');"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview"><a href="javascript:void(0);"><i class="fa fa-gears"></i> <span>Setup</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="javascript:void(0);"><i class="fa fa-hand-o-right"></i> <span>References</span><i class="fa fa-angle-left pull-right"></i></a>
                      <ul class="treeview-menu">
                          <li><a href="javascript:void(0);" onclick="loader('category','index');"><i class="fa fa-cog"></i> <span>Category Setup</span></a></li>
                          <li><a href="javascript:void(0);" onclick="loader('condition','index');"><i class="fa fa-cog"></i> <span>Condition Setup</span></a></li>
                      </ul>
                    </li>
                    <li><a href="javascript:void(0);" onclick="loader('user','index');"><i class="fa fa-hand-o-right"></i> <span>Users Setup</span></a></li>
                    <li><a href="javascript:void(0);" onclick="loader('asset','index');"><i class="fa fa-hand-o-right"></i> <span>Assets Setup</span></a></li>
                    <li><a href="javascript:void(0);" onclick="loader('employee','index');"><i class="fa fa-hand-o-right"></i> <span>Employees Setup</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="javascript:void(0);"><i class="fa fa-user-secret"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="javascript:void(0);" onclick="loader('panel','inventory');"><i class="fa fa-table"></i>Inventory Table</a></li>
                        <li><a href="javascript:void(0);" onclick="loader('panel','employee_table');"><i class="fa fa-table"></i>Employee Table</a></li>
                        <li><a href="javascript:void(0);" onclick="loader('panel','release');"><i class="fa fa-hand-o-right"></i>Release Page</a></li>
                        <li><a href="javascript:void(0);" onclick="loader('panel','history');"><i class="fa fa-hand-o-right"></i>History Page</a></li>
                        <li><a href="javascript:void(0);" onclick="loader('person','index');"><i class="fa fa-hand-o-right"></i>Person Page</a></li>
                        <li><a href="javascript:void(0);" onclick="loader('employee','index');"><i class="fa fa-hand-o-right"></i>Employee Page</a></li>
                    </ul>
            </li>
        </ul>
    </section>
<!-- /.sidebar -->
</aside>
<script type="text/javascript">
    function loader(a,b){
        $('.loader').modal('show');
        $.ajax({type:'POST',
            url: '<?=base_url()?>index.php/'+a+'/'+b,
            cache: false,
            //dataType:'json',
            success: function (data) {
            //console.log(data);
              $("#framer").html(data);
              $('.loader').modal('hide');
            },
        });
    }
</script>
