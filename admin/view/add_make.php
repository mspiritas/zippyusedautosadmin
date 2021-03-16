<?php include('header.php') ?>

<?php if ($vehicles) { ?>
    <section>
        <header>
            <h1>vehicle List</h1>
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
    <h2 class="center">Add Make Category</h2>
    <form action="." method="post" class="center">
        <input type="hidden" name="action" value="add_vehicle">
        <div>
            <label>Make</label>
            <input type="text" name="add_make" placeholder="Make" autofocus required>
        </div>
        <div>
            <button>Add</button>
        </div>
    </form>
</section>
<br>
<p class="center"><a href=".">View &amp; Add Items</a></p>
<?php include('footer.php') ?>