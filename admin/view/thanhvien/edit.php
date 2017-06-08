<?php
	require 'view/layout/header.php';
?>
<div id="wrapper">

    <?php require 'view/layout/menu.php'; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Edit</small>
                    </h1>
                    <?php
	                    if(isset($_SESSION['error'])) { ?>
	                    <div class="alert alert-danger">
	                        <?php echo $_SESSION['error'];unset($_SESSION['error']) ?>
	                    </div>
	                <?php
	                    }
	                ?>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" name="txtUser" value="<?php echo $user['username'] ?>" disabled />
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                        </div>
                        <div class="form-group">
                            <label>RePassword</label>
                            <input type="password" class="form-control" name="repassword" placeholder="Please Enter RePassword" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="<?php echo $user['email'] ?>" name="email" placeholder="Please Enter Email" />
                        </div>
                        <div class="form-group">
                            <label>User Level</label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="1" <?php if($user['auth'] == 1){ echo "checked"; } ?> type="radio">Admin
                            </label>
                            <label class="radio-inline">
                                <input name="rdoLevel" value="2" <?php if($user['auth'] == 2){ echo "checked"; } ?> type="radio">Member
                            </label>
                        </div>
                        <button type="submit" name="suatv" class="btn btn-default">User Edit</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

<?php
	require 'view/layout/footer.php';
?>