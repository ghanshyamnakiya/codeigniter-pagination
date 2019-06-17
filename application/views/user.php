<section class="content-header">
<h1>
User</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">User</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
 <!-- left column -->
   <!-- general form elements -->
   <div class="box box-primary">
     <div class="box-header with-border">
       <h3 class="box-title">User</h3>
       <?php if($action=='ADD'|| $action=='edit'){?>
          <a href="<?php echo base_url()?>index.php/user" class="btn btn-info pull-right">Back</a>
    <?php }else{?>
      <a href="<?php echo base_url()?>index.php/user?action=ADD" class="btn btn-info pull-right">Add New</a>
      <?php }?>
     </div>
     <!-- /.box-header -->
     <!-- form start -->
     <div>
    <div class="box-body">
      <?php if(!empty($msg)){ ?>
      <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?=$msg?>
              </div>
      <?php } ?>
      <?php if($action=='ADD'){?>
      <form action="<?php echo base_url()?>index.php/user/Insertdata" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">
              <input type="textbox" class="form-control"name="name"  id="name" placeholder="Name" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
            <div class="col-sm-4">
              <input type="textbox" class="form-control"name="user_name"  id="user_name" placeholder="Username" required>
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
              <input type="password" class="form-control"name="pass_word"  id="pass_word" placeholder="Password" required>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">User Type</label>
              <div class="col-sm-4">
                      <select name="u_type" class="form-control select2 select2-hidden-accessible" data-placeholder="Select a Type" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option value="1">Admin</option>
                        <option value="2">Shop Owner</option>
                        <option value="3">Customer</option>
                        <option value="4">Subscriber</option>
                      </select>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-6">
              <label>
                <input type="radio" name="status" id="status" value="0" checked="">Yes
              </label>
              <label>
                <input type="radio" name="status" id="status" value="1">No
              </label>
            </div>
          </div>
          <div class="box-footer">
              <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </div>
        </form>
        <?php }else{ ?>
          <table class="table table-bordered table-striped">
                <tbody><tr>
                  <th style="width: 5%">No.</th>
                  <th>Name</th>
                  <th style="width: 15%">User Name</th>
                  <th style="width: 15%">User Type</th>
                  <th style="width: 10%">Status</th>
                </tr>
        <?php if(!empty($resultArr)){
        $count=1;
                foreach ($resultArr as $key => $value) {  //result
                  if($value['u_type']=='1'){
                    $utype="Admin";
                  }elseif ($value['u_type']=='2') {
                    $utype="Shop Owner";
                  }elseif ($value['u_type']=='3') {
                    $utype="Customer";
                  }elseif ($value['u_type']=='4') {
                    $utype="Subscriber";
                  }
                   ?>
                <tr>
                  <td class="text-center"><?=$count++?></td>
                  <td><?=ucfirst($value['name'])?></td>
                  <td><?=$value['user_name']?></td>
                  <td><?=$utype?></td>
                  <td class="text-center"><?=$value['status']=='0'?'Yes':'No'?></td>
                </tr>
                <?php } ?>
                <tr><td colspan="5">
                  <?php     echo $links; ?>
                </td>
          <?php  } else{  ?>
            <td colspan="5" class="text-center">No Record Found.</td>
              <tr>
              </tr>
          <?php } ?>
        </tbody></table>



        <?php } ?>
    </div>
              <!-- /.box-footer -->

   </div>
</div>
<!-- /.row -->
</section>
