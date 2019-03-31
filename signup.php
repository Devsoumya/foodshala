<?php
include 'include/common.php';
if(isset($_POST['signup'])) {
    $email = $_POST['email'];
}
?>

<div class="container p-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label><b>Name</b></label>
                            <input type="text" class="form-control"  placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1"><b>Email address</b></label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label><b>Password</b></label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label><b>Mobile</b></label>
                            <input type="text" name="mobile" class="form-control"  placeholder="Mobile">
                        </div>
                        <div class="form-group">
                            <label><b>Food Preference ?</b></label>
                            <select name="preference" class="form-control">
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
