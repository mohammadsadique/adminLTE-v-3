<?php 
    $success[0] = '';
    if(isset($_POST['login_id'])){
       $login_id = $_POST['login_id']; 

       $er = "SELECT * FROM `login` WHERE `id` = '$login_id'";
       $op = mysqli_query($conn,$er);
       $ki = mysqli_fetch_array($op);


       $tablename = "login";       
       $whereclause = "`id` = '$login_id'";


        if($ki['status'] == 0){
            $array = array(
                'status' => 1
            );
            $up = new updateQuery();
            $up->setUpdate($tablename,$array,$whereclause);
            $value = $up->get_updateQuery();
            mysqli_query($conn,$value);
            
            $success = array( 'success', 'Activated customer successfully!');

        } else {
            $array = array(
                'status' => 0
            );
            $up = new updateQuery();
            $up->setUpdate($tablename,$array,$whereclause);
            $value = $up->get_updateQuery();
            mysqli_query($conn,$value);

            
            $success = array( 'success', 'Blocked customer successfully!');
        }

    }
?>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
            <?php
                if($success[0] == 'success')
                { 
                   echo 
                    '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        '.$success[1].'
                    </div>';
                }?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Give Permission</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    
                                    <th>Manage</th>
                                    <th>Name</th>
                                    <th>Website</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $vv1 = "SELECT * FROM `add_customer` ORDER BY id DESC";
                                $tt1 = mysqli_query($conn,$vv1);
                                $i = 1;
                                while($nn1 = mysqli_fetch_array($tt1)){
                                    $vv2 = "SELECT * FROM `login` WHERE `id` = '$nn1[login_id]'";
                                    $tt2 = mysqli_query($conn,$vv2);
                                    $nn2 = mysqli_fetch_array($tt2);
								    ?>	
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td style="text-align: center;">
                                            <div class="btn-group">
                                                <form method="post">
                                                    <input type="hidden" id="custid" value="<?php echo $nn1['login_id'] ?>">
                                                    <input type="checkbox" class="make-switch" id="price_check" name="pricing" data-on-text="Active" data-off-text="Block" data-on-color="success" data-off-color="danger" value="<?php echo $nn1['login_id'] ?>" <?php if($nn2['status'] == 1){
                                                        echo  'checked';
                                                    }?>>
                                                 </form>                                                
                                            </div>
                                        </td>
                                        <td><?php echo $nn1['name'] ?></td>
                                        <td><?php echo $nn1['website'] ?></td>
                                        <td><?php echo $nn1['mobile'] ?></td>
                                        <td><?php echo $nn1['email'] ?></td>
                                        <td><?php echo $nn2['username'] ?></td>
                                        <td><?php echo $nn2['password'] ?></td>
                                       
                                    </tr>
                                    <?php
								    $i++;
								}?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<form method="post" id="customerpermission">
	<input type="hidden" class="status" name="login_id">
</form>


<!-- jQuery -->
<script src="<?php echo url(); ?>/<?php echo $rootname; ?>plugins/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js"></script>
<script>



    $('.make-switch').bootstrapSwitch('state');
    $('.make-switch').on('switchChange.bootstrapSwitch',function () {
        var check = $('.bootstrap-switch-on');
        // $('.status').val(check.length);

        var custid = $(this).val();
        $('.status').val(custid);

        $('#customerpermission').submit();

        // if (check.length > 0) {
        //     console.log('ON')
        // } else {
        //     console.log('OFF')
        // }
    });



</script>
