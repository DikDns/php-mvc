<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3>Students List</h3>
            <?php foreach($data["students"] as $student) : ?>
                <ul>
                    <li>
                        <?= $student["name"]; ?>
                    </li>
                    <li>
                        <?= $student["isn"]; ?>
                    </li>
                    <li>
                        <?= $student["email"]; ?>
                    </li>
                    <li>
                        <?= $student["department"]; ?>
                    </li>
                </ul>
            <?php endforeach; ?>
        </div>
    </div>

</div>