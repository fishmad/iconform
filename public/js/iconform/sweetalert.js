function confirmDel() {
  event.preventDefault(); // prevent form submit
  var form = event.target.form; // storing the form
    swal({
      title: 'Are you sure?',
      text: "You will not be able to restore this record.",
      type: 'warning',
      showCancelButton: true,
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        swal(
          'The record is now being deleted.',
          'success'
        ),
        form.submit();
      // } else {
      //   swal(
      //     'Canceled!',
      //     'The record was not deleted.',
      //     'error'
      //   )
      }
    })
  }