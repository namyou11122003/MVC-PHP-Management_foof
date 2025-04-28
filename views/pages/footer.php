<!-- Bootstrap JS with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- <script src="../../assets/js/app.js"> -->
</script>
<script src="../../assets/js/chart.js">
</script>
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


</body>

</html>