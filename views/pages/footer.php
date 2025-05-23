<!-- Bootstrap JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <script src="../../assets/js/app.js"> -->
<script>
    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function () {
            var img = document.getElementById("preview");
            img.src = reader.result;
            img.style.display = "block";
        };
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]); // Read file as Data URL
        }
    }

    function fun_deleteEmployeeByID(id) {
        $(".emp_id").val(id)
    }
    function fun_deleteEmployeeByID(id) {
        $(".product_id").val()
    }

    document.getElementById('imageInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('imagePreview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });



    // chang image when update 
    document.getElementById('imageInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            // Remove or hide the currently displayed image if it exists
            const currentImage = document.getElementById('currentImage');
            if (currentImage) {
                currentImage.remove();
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                let previewImg = document.getElementById('imagePreview');
                if (!previewImg) {
                    previewImg = document.createElement('img');
                    previewImg.id = 'imagePreview';
                    previewImg.style.maxWidth = '200px';
                    document.getElementById('imageInput').insertAdjacentElement('afterend', previewImg);
                }
                previewImg.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewButtons = document.querySelectorAll('.view-btn');

        viewButtons.forEach(button => {
            button.addEventListener('click', function () {
                const empId = this.getAttribute('data-id');
                // ../Employees/viewEmployees.php
                // Fetch detail via AJAX
                fetch(`../components/viewDetailEmployee.php?id=${empId}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('modalContent').innerHTML = data;
                        // Show modal
                        const modal = new bootstrap.Modal(document.getElementById('viewModal'));
                        modal.show();
                    })
                    .catch(error => {
                        console.error('Error fetching employee details:', error);
                        document.getElementById('modalContent').innerHTML = 'Error loading data.';
                    });
            });
        });


        const view_btn = document.querySelectorAll(".view_btn");
        view_btn.forEach(button => {
            button.addEventListener('click', function () {
                const empId = this.getAttribute('data-id');

                // Fetch detail via AJAX
                fetch(`../components/viewDetail.php?id=${empId}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('modalContent').innerHTML = data;
                        // Show modal
                        const modal = new bootstrap.Modal(document.getElementById('viewModal'));
                        modal.show();
                    })
                    .catch(error => {
                        console.error('Error fetching employee details:', error);
                        document.getElementById('modalContent').innerHTML = 'Error loading data.';
                    });
            });
        });
    });
</script>
<!-- eidte  -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const empId = this.getAttribute('data-id');

                // Load edit form from PHP file
                fetch(`../components/Edit.php?id=${empId}`)
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('editModalContent').innerHTML = data;

                        // Show modal
                        const modal = new bootstrap.Modal(document.getElementById('editModal'));
                        modal.show();
                    })
                    .catch(error => {
                        console.error('Error loading edit form:', error);
                        document.getElementById('editModalContent').innerHTML = 'Error loading form.';
                    });
            });
        });
    });
</script>

</body>

</html>