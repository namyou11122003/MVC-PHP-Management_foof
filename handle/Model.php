<?php
function MOdalDelete()
{
    ?>
    <!-- Modal -->
    <div class="modal fade" id="Modal_delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="exampleModalLabel">Delete </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post">
                <div class="modal-body">
                    <input type="text" value=""  name="Emp_ID" id="" class="emp_id">
                    <h4>Do you wanna Delete this Employee</h4>
                </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="yes_employee">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
}


?>