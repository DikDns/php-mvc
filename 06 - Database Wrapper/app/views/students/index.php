<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <h3>Students List</h3>
                <ul class="list-group">
                    <?php foreach($data["students"] as $student) : ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <?= $student["name"] ?>
                            <a href="<?= BASEURL; ?>/students/details/<?= $student["id"]; ?>" class="badge rounded-pill bg-info text-dark" style="text-decoration: none">
                                Details
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
        </div>
    </div>

</div>