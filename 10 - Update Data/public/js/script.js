//! Edit Script
let insertBtn = document.querySelector("#insertBtn");
let editBtns = document.querySelectorAll("#editBtn");
let submitBtn = document.querySelector(".modal-footer button[type=submit]");
let titleModal  = document.querySelector("#titleModal");
let form = document.querySelector(".modal-body form");

insertBtn.addEventListener("click", function(){
    titleModal.innerHTML = "Insert Data";
    submitBtn.innerHTML = "Insert Data";
});

editBtns.forEach((editBtn) => {
    editBtn.addEventListener("click", function(e){
        //! Update UI
        titleModal.innerHTML = "Edit Data";
        submitBtn.innerHTML = "Save Changes";
        //! Update FORM action
        form.action = BASEURL + "/students/edit";
        //! Select dataset id of student
        const id = e.target.dataset.id;
        //! POST THE DATA
        fetch(BASEURL + "/students/getedit",
        {
            method: "post",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
            },
            body: "id=" + id
        }
        )
            .catch(error => console.log(error))
            // Resolve the Promise into JSON
            .then(response => response.json())
            //! MAIN
            .then(student => {
                // Change the Name Input Value
                document.querySelector("#name").value = student.name;
                // Change the ISN Input Value
                document.querySelector("#isn").value = student.isn;
                // Change the EMAIL Input Value
                document.querySelector("#email").value = student.email;
                // Change the DEPARTMENT Input Value
                document.querySelector("#department").value = student.department;
                // Change the ID Input Value
                document.querySelector("#id").value = student.id;
            });
    });
});




//! swal script 
let deleteBtns = document.querySelectorAll("#deleteBtn");

deleteBtns.forEach((deleteBtn) => {
    deleteBtn.addEventListener("click", function(e){
        const student = e.target.parentElement.innerText.split("\n")[0];
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
                document.location.href = BASEURL + "/students/delete/" + (e.target.dataset.id);
            }
        });
    })
});