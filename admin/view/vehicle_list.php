<?php include('header.php'); ?>
<section>
<table class="display-vehicles">
    <tr>
    <tr>
        <th class="table-header">Price</th>
        <th class="table-header">Make</th>
        <th class="table-header">Model</th>
        <th class="table-header">Year</th>
        <th class="table-header">Type</th>
        <th class="table-header">Class</th>
        <th class="table-header"><b>DELETE</b></th>
    </tr>
    <?php if($vehicles) { ?>
        <?php foreach ($vehicles as $vehicle) : ?>
    <tr>
        <div>
            <div>
                <td><p><?= $vehicle['price'] ?></p></td>
                <td><p><?= $vehicle['Make'] ?></p></td>
                <td><p><?= $vehicle['model'] ?></p></td>
                <td><p><?= $vehicle['year'] ?></p></td>
                <td><p><?= $vehicle['Type'] ?></p></td>
                <td><p><?= $vehicle['Class'] ?></p></td>
            </div>
            <div><td>
                <form action="." method="post">
                    <input type='hidden' name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicle_id" value="<?=
                    $vehicle['vehicleID'] ?>">
                    <button>Delete</button>
                </form></td>
            </div>
        </div>
    </tr>
        <?php endforeach; ?>
        <?php } else { ?>
        <br>
        <?php if ($vehicle_id) { ?>
            <p>No vehicles exist yet 1.</p>
        <?php } else { ?>
            <p>No vehicles exist yet 2.</p>
        <?php } ?>
        <br>
        <?php } ?>
</table>
</section>

    <table>
    <h2 class="center">Edit Vehicle Inventory</h2>
    <tr>
        <td class="sort-menus">
    <form action="." method="post">
        <input type="hidden" name="action" value="add_vehicle">
        <div>
            <label class="label">Price</label>
                <input type="text" name="Price" placeholder="Price" required>
            <br>
            <label>Make</label>
                <input type="text" name="Make" placeholder="Make" required>
            <br>
            <label>Model</label>
                <input type="text" name="Model" placeholder="Model" required>
            <br>
            <label>Year</label>
                <input type="text" name="Year" placeholder="Year" required>
            <br>
            <label>Type</label>
                <input type="text" name="Type" placeholder="Type" required>
            <br>
            <label>Class</label>
                <input type="text" name="Class" placeholder="Class" required>
            <br>

        </div>
        <div>
            <button>Add Vehicle</button>
        </div>
    </form>
        </td>
        <td class="sort-menus">
        <p><a href="add_make.php">Add a New Make to Your List</a></p>
        <p><a href="add_type.php">Add a New Type to Your List</a></p>
        <p><a href="add_class.php">Add a New Class to Your List</a></p>
        </td>
        </tr>
    </table>
<?php include('footer.php'); ?>