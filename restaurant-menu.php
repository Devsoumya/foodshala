<?php
include 'include/common.php';
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
            <form>
                <tr>
                    <th scope="col"><input required type="text" placeholder="Dish Name" class="form-control"></th>
                    <th scope="col"><input required type="text" placeholder="Category"class="form-control"></th>
                    <th scope="col">
                        <select required class="form-control">
                            <option value="1">Veg.</option>
                            <option value="2">Egg</option>
                            <option value="3">Nov-Veg.</option>
                        </select>
                    </th>
                    <th scope="col">
                        <input required type="number" min="0" placeholder="Price (in Rupees)" class="form-control">
                    </th>
                    <th scope="col">
                        <button required type="submit" class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                    </th>
                </tr>
            </form>
            </thead>
            <tbody>
            <tr>
                <th scope="row">Paneer Tikka</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>$5</td>
                <td><button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
