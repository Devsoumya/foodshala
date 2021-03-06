<?php
include 'include/common.php';
if(isset($_SESSION['userId'])) {
    header('Location: index.php');
}
if(isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $preference = $_POST['preference']; 
    $userType = 1;
    ?>
<?php
    $sql = "INSERT INTO users(name,email,password,userType,preference,mobile) VALUES(?,?,?,?,?,?)";
$query=$pdo->prepare($sql)->execute([$name,$email, $password, $userType, $preference, $mobile]);
if($query)
{
    header("Location: login.php");
}
else
{
    ?>
<div class="container p-2">
<div class="row">
<div class="col-md-6 offset-md-3">
<div class="alert alert-danger alert-dismissible">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<strong>Sorry!</strong> Some Error Ocurred! Sign Up again.
</div>
</div>
</div>
</div>
    <?php
}
}
?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input required type="text" name="name" class="form-control"  placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Email address</b></label>
                            <input required type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input required type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label><b>Mobile</b></label>
                            <input required type="text" name="mobile" class="form-control"  placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <label><b>Food Preference ?</b></label>
                            <select required name="preference" class="form-control">
                                <option value="1">Veg.</option>
                                <option value="2">Non-Veg.</option>
                            </select>
                        </div>
                        <button name="signup" type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
