document.getElementById("toggleSidebar").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("collapsed");
});

const saveEmployee = document.getElementById("saveEmployee");

saveEmployee.addEventListener("click", function () {
  const form = document.getElementById("employeeForm");

  if (!form.checkValidity()) {
    form.reportValidity();
    return;
  }
  form.submit();
});
// add class active all navbar

// Example using vanilla JS:

