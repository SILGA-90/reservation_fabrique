$(document).ready(function () {
  $("#apprenantList").DataTable({
      lengthChange: true,
      order: [],
      pageLength: 10,
  });
  $("#apprenantList").click(function () {
      $("#employeeModal").modal("show");
      $("#employeeForm")[0].reset();
      $(".modal-title").html("<i class='fa fa-plus'></i> AJOUTER DEVELOPPEUR");
      $("#action").val("addEmployee");
      $("#save").val("Add");
  });
});
