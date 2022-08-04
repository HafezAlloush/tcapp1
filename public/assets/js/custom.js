  // toast success message function
  function toastsuccess() {
    toastr.success('تمت العملية بنجاح', '', {
        positionClass: 'toast-top-left',
        containerId: 'toast-top-left'
    });
};

// toast error messages fnnction
function toastError(err) {
    var errors = err.responseJSON.errors;

    for (const [key, value] of Object.entries(errors)) {
        console.log(`${key}: ${value}`);
        toastr.error(value, 'حدث خطا', {
            positionClass: 'toast-top-left',
            containerId: 'toast-top-left'
        });
    }
};

 // set active list
 function activeList(name) {
    $(name).addClass('active');
};