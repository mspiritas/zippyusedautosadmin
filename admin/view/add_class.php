<?php include('header.php') ?>

<?php if ($vehicles) { ?>
    <section>
        <header>
            <h1>Vehicle List</h1>
        </header>

        <?php foreach ($vehicles as $vehicle) : ?>
        <div>
            <div>
                <p><?= $vehicle['vehicleID'] ?></p>
            </div>
            <div>
                <form action="." method="post">
                    <input type="hidden" name="action" value="delete_vehicle">
                    <input type="hidden" name="vehicle_id" value="<?= $vehicle['vehicleID'] ?>">
                    <button>Delete</button>
                </form>
            </div>
        </div>
        <?php endforeach ; ?>
    </section>
<?php } else { ?>
    <p>No vehicles exist yet.</p>
<?php } ?>
</section>

<section>
    <h2 class="center">Add Class Category</h2>
    <form action="." method="post" class="center">
        <input type="hidden" name="action" value="add_vehicle">
        <div>
            <label>Class</label>
            <input type="text" name="add_class" placeholder="Class" autofocus required>
        </div>
        <div>
            <button>Add</button>
        </div>
    </form>
</section>
<br>
<p class="center"><a href="vehicle_list.php">View &amp; Add Items</a></p>
<?php include('footer.php') ?>