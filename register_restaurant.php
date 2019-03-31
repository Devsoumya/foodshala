<?php
include 'include/common.php';
if (isset($_POST['signup'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];
    $preference = $_POST['preference'];
    $cost = $_POST['cost'];
    $userType = 2;
    // $image = $_FILES['imageUpload']['name'];
    // Get text
    // $image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "images/" . $_FILES['imageUpload']['name'];
    print_r($target);

    if (move_uploaded_file($_FILES['imageUpload']['tmp_name'], $target)) {
        $msg = "Image uploaded successfully";
    } else {
        $msg = "Failed to upload image";
    }

    if (isset($_POST['northIndian'])) {

        $arr[] = $_POST['northIndian'];
    }
    if (isset($_POST['Chinese'])) {

        $arr[] = $_POST['Chinese'];
    }
    if (isset($_POST['southIndian'])) {

        $arr[] = $_POST['southIndian'];
    }
    if (isset($_POST['Italian'])) {

        $arr[] = $_POST['Italian'];
    }
    if (isset($_POST['Beverages'])) {

        $arr[] = $_POST['Beverages'];
    }
    $cusine = implode(",", $arr);
    ?>
    <?php
    $sql = "INSERT INTO users(name,email,password,userType,preference,mobile) VALUES(?,?,?,?,?,?)";
    $query = $pdo->prepare($sql)->execute([$name, $email, $password, $userType, $preference, $mobile]);
    $userId = $pdo->lastInsertId();

    $sql1 = "INSERT INTO restaurants(userID,name,cusine,pureVeg,image,costForTwo) VALUES(?,?,?,?,?,?)";
    $query1 = $pdo->prepare($sql1)->execute([$userId, $name, $cusine, $preference, $target, $cost]);
    if ($query && $query1) {
        header("Location: login.php");
    } else {
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><b>Restaurant Name</b></label>
                            <input required type="text" name="name" class="form-control" placeholder="Restaurant Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Email address</b></label>
                            <input required type="email" name="email" class="form-control" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                                else.
                            </small>
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input required type="password" name="password" class="form-control" id="exampleInputPassword1"
                                   placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label><b>Mobile</b></label>
                            <input required type="text" name="mobile" class="form-control" placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <label><b>Image</b></label>
                            <input required type="file" name="imageUpload" class="form-control" placeholder="Upload">
                        </div>
                        <div class="form-group">
                            <label><b>Approximate Cost For Two Persons</b></label>
                            <input required type="text" name="cost" class="form-control"
                                   placeholder="Approximate Cost For Two Persons in rupees">
                        </div>
                        <div class="form-group">
                            <label><b>Cusine</b></label>
                            <div class="checkbox">
                                <label><input name="northIndian" type="checkbox" value="North Indian">North
                                    Indian</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="chinese" type="checkbox" value="Chinese">Chinese</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="southIndian" type="checkbox" value="South Indian">South
                                    Indian</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="Italian" type="checkbox" value="Italian">Italian</label>
                            </div>
                            <div class="checkbox">
                                <label><input name="Beverages" type="checkbox" value="Beverages">Beverages</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label><b>Restaurant Type?</b></label>
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
