<?php 
    $success[0] = '';
    $error[0] = '';
    if(isset($_POST['addcustomer'])){
        $replaceMob = secureData($_POST['mobile']);
        $mobile = str_replace( [' ', '(', ')','-'], '' , $replaceMob);
        $username = 'UID'.rand(10,1000);
        $password = rand(100,10000);
        $array2 = array(
            'role' => 'admin',
            'username' => secureData($username),
            'password' => secureData($password)
        );



        $fet2 = "SELECT * FROM `login` WHERE `username` = '$username'";
        $gal2 = mysqli_query($conn,$fet2);
        $checkUnique = mysqli_num_rows($gal2);

        if($checkUnique == 0){
            $tablename2 = "login";

            $inst = new InsertQuery();
            $inst->setInsert($tablename2,$array2);
            $logins = $inst->get_insertQuery();
            mysqli_query($conn,$logins);


            $fet = "SELECT * FROM `login` ORDER BY `id` DESC LIMIT 1";
            $gal = mysqli_query($conn,$fet);
            $logval = mysqli_fetch_assoc($gal);
            $login_id = $logval['id'];
            $array = array(
                'name' => secureData($_POST['name']),
                'email' => secureData($_POST['email']),
                'website' => secureData($_POST['website']),
                'mobile' => secureData($mobile),
                'login_id' => $login_id
            );

            $tablename = "add_customer";
            $inst2 = new InsertQuery();
            $inst2->setInsert($tablename,$array);
            $logins2 = $inst2->get_insertQuery();
            mysqli_query($conn,$logins2);

            $success = array( 'success', 'Successfully Added New Customer!');
        }
        else
        {
            $error = array( 'error' ,'* Mobile number must be unique!');
        }
    }
        
    if(isset($_POST['del'])){
        $id = $_POST['del'];
        

        $tt = "DELETE FROM `login` WHERE `id` = '$id'";
        mysqli_query($conn,$tt);

        $tt2 = "DELETE FROM `add_customer` WHERE `login_id` = '$id'";
        mysqli_query($conn,$tt2);
        
        $success = array( 'success', 'Successfully Deleted Customer!');
    }

    

    if(isset($_POST['upd'])){
        $id = $_POST['upd'];
        $tt = "SELECT * FROM `add_customer` WHERE `login_id` = '$id'";
        $ee = mysqli_query($conn,$tt);
        $qq = mysqli_fetch_array($ee);

        $tt2 = "SELECT * FROM `login` WHERE `id` = '$id'";
        $ee2 = mysqli_query($conn,$tt2);
        $qq2 = mysqli_fetch_array($ee2);
    }else{
        $id = '';
    }

    if(isset($_POST['update']))
    {
        $id = $_POST['update'];
        $replaceMob = secureData($_POST['mobile']);
        $mobile = str_replace( [' ', '(', ')','-'], '' , $replaceMob);


        $tablename = "add_customer";
        $array = array(
            'name' => secureData($_POST['name']),
            'email' => secureData($_POST['email']),
            'website' => secureData($_POST['website']),
            'mobile' => secureData($mobile)
        );
        $whereclause = "`login_id` = '$id'";

        $up = new updateQuery();
        $up->setUpdate($tablename,$array,$whereclause);
        $value = $up->get_updateQuery();
        mysqli_query($conn,$value);

        $success = array( 'success', 'Successfully Updated Customer!');
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
                }
                if($error[0] == 'error'){
                    echo 
                    '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-check"></i> Alert!</h5>
                        '.$error[1].'
                    </div>';
                }    

                ?>
            </div>
            <div class="col-md-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Add New Customer</h3>
                    </div>
                    <form role="form" method="post">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="name" value="<?php if($id != ''){ echo $qq['name']; } ?>" class="form-control" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Website Name</label>
                                        <input type="text" name="website" value="<?php if($id != ''){ echo $qq['website']; } ?>" class="form-control" placeholder="Enter ..." required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <div class="input-group">
                                            <input type="text" name="mobile" value="<?php if($id != ''){ echo $qq['mobile']; } ?>" class="form-control"
                                                data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;"
                                                data-mask="" im-insert="true" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" value="<?php if($id != ''){ echo $qq['email']; } ?>" class="form-control" placeholder="Enter ..." required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php if($id != ''){?>
                                <button type="submit" name="update" value="<?php if($id != ''){ echo $qq['login_id']; } ?>" class="btn btn-warning">Update Customer</button>
                            <?php
                            }else{?>
								<button type="submit" name="addcustomer" class="btn btn-primary">Add Customer</button>
                            <?php
                            }?> 
                            
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Auto Generated Credential</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">@</span>
                                </div>
                                <input type="text" value="<?php if($id != ''){ echo $qq2['username']; } ?>" class="form-control" placeholder="Username" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="text" value="<?php if($id != ''){ echo $qq2['password']; } ?>" class="form-control" placeholder="Password" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Name</th>
                                    <th>Name</th>
                                    <th>Website</th>
                                    <th>Number</th>
                                    <th>Email</th>
                                    <th>Email</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Manage</th>
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
                                        <td><?php echo $nn1['name'] ?></td>
                                        <td><?php echo $nn1['name'] ?></td>
                                        <td><?php echo $nn1['name'] ?></td>
                                        <td><?php echo $nn1['website'] ?></td>
                                        <td><?php echo $nn1['mobile'] ?></td>
                                        <td><?php echo $nn1['email'] ?></td> 
                                        <td><?php echo $nn1['email'] ?></td> 
                                        <td><?php echo $nn1['email'] ?></td> 
                                        <td><?php echo $nn2['username'] ?></td>
                                        <td><?php echo $nn2['password'] ?></td>
                                        <td style="text-align: center;">
                                            <div class="btn-group">
                                                <form method="post"><button type="submit" name="del" value="<?php echo $nn1['login_id']; ?>" class="btn btn-danger" onClick="return confirm('Are you sure, you want to delete?');"><i
                                                        class="fas fa-trash" ></i></button></form>
                                                <form method="post"><button type="submit" name="upd" value="<?php echo $nn1['login_id']; ?>" class="btn btn-warning"><i
                                                        class="fas fa-edit"></i></button></form>
                                            </div>
                                        </td>
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