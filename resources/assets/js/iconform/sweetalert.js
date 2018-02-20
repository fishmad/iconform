function confirmDel() {
  event.preventDefault(); // prevent form submit
  var form = event.target.form; // storing the form
  swal({
    title: "Are you sure?",
    text: "You will not be able to restore this record.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#f64846",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel please!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      form.submit();          // submitting the form when user press yes
    } else {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
    }
  });
}