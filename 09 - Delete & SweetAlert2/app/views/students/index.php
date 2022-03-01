<div class="container mt-5">

    <div class="row">
        <div class="col-6">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#formModal">
            Insert Data
            </button>
            <h3 class="mb-3">Students List</h3>
            <ul class="list-group mb-3">
                <?php foreach($data["students"] as $student) : ?>
                    <li class="list-group-item">
                        <?= $student["name"] ?>

                        <a href="#" class="ms-2 badge rounded-pill bg-danger text-light float-end" style="text-decoration: none" id="deleteBtn" data-id="<?= $student["id"]; ?>">
                            Delete
                        </a>

                        <a href="<?= BASEURL; ?>/students/details/<?= $student["id"]; ?>" class="ms-2 badge rounded-pill bg-primary text-light float-end" style="text-decoration: none">
                            Details
                        </a>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="titleModal">Insert Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">

                <form action="<?= BASEURL; ?>/students/insert" method="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="mb-3">
                        <label for="isn" class="form-label">ISN</label>
                        <input type="number" class="form-control" id="isn" name="isn">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <div class="mb-3">
                        <label for="department" class="form-label">Department</label>
                        <select class="form-select" id="department" name="department">
                            <option selected value="Informatics">Informatics</option>
                            <option value="Engineering">Engineering</option>
                            <option value="Applied Science">Applied Science</option>
                            <option value="Art and Design">Art and Design</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Counseling">Counseling</option>
                        </select>
                    </div>

            </div>
                    
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Insert Data</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php Flasher::flash(); ?>

<script>
    let deleteBtns = document.querySelectorAll("#deleteBtn");

    deleteBtns.forEach((deleteBtn) => {
        deleteBtn.addEventListener("click", function(e){
            let student = e.target.parentElement.innerText.split("\n")[0];
            Swal.fire({
            icon: "warning",
            iconColor: "#f0ad4e",
            title: `Delete ${student}'s Data?`,
            showCancelButton: true,
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Delete",
            confirmButtonColor: "#dc3545"
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    document.location.href = "<?= BASEURL; ?>/students/delete/" + (e.target.dataset.id);
                }
            });
        })
    });
</script>