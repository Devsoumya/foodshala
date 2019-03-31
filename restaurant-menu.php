<?php
include 'include/common.php';
include 'include/connection.php';

if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $cusine = $_POST['cusine'];
    $category = $_POST['category'];
    $cost = $_POST['cost'];
    $id=$_SESSION['restaurantId'];
    $sql = "INSERT INTO menu(restaurantId,cost,name,category,type) VALUES(?,?,?,?,?)";
    $query=$pdo->prepare($sql)->execute([$id,$cost,$name,$cusine, $category]);
    if($query)
    {
        ?>
        <div class="container p-2">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong></strong> Food Item Added Successfully.
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    else
    {
      ?>
        <div class="container p-2">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong></strong> Some Error Ocurred. Please try again later.
                    </div>
                </div>
            </div>
        </div>
        <?php  
    }
}
?>

<div>
    <div class="container p-5">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Veg/Non-veg</th>
                <th scope="col" colspan="2">Price</th>
            </tr>
            <form action="" method="POST">
                <tr>
                    <th scope="col"><input required name="name" type="text" placeholder="Dish Name" class="form-control"></th>
                    <th scope="col">
                    <select required name="cusine" class="form-control">
                            <option value="North Indian">North Indian</option>
                            <option value="Chinese">Chinese</option>
                            <option value="South Indian">South Indian</option>
                            <option value="Italian">Italian</option>
                            <option value="Beverages">Beverages</option>
                        </select></th>
                    <th scope="col">
                        <select required name="category" class="form-control">
                            <option value="1">Veg.</option>
                            <option value="2">Egg</option>
                            <option value="3">Nov-Veg.</option>
                        </select>
                    </th>
                    <th scope="col">
                        <input required name="cost" type="number" min="0" placeholder="Price (in Rupees)" class="form-control">
                    </th>
                    <th scope="col">
                        <button required type="submit" name="add" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                    </th>
                </tr>
            </form>
            </thead>
            <tbody>
            

                <?php
                 $id=$_SESSION['restaurantId'];
                    $sql = "SELECT *, CASE WHEN type=1 THEN 'Veg.' WHEN type=2 THEN 'Egg' WHEN type=3 THEN 'Non Veg.' END as foodType FROM menu WHERE restaurantId = ?";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$id]);
                    $items = $stmt->fetchAll();
                    foreach ($items as $item) {
                        echo "<tr>
                        <th scope='row'>".$item['name']."</th>
                            <td>".$item['category']."</td>
                            <td>".$item['foodType']."</td>
                            <td>₹ ".$item['cost']."</td>
                            <td><button class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></button></td>
                            </tr>
                        ";
                    }
                ?>
                

            </tbody>
        </table>
    </div>
</div>
