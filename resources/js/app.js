const { default: axios } = require('axios');

require('./bootstrap');


$('#approveAction').on('click',function name(params) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {

            axios.post('/approveAppointment/post', {
                status: 1,
            })
            .then(function (response) {
                console.log(response);
                Swal.fire(
                    '',
                    '',
                    'success'
                )
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    })
})

$('#cancelAction').on('click',function name(params) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes'
    }).then((result) => {
        if (result.isConfirmed) {

            axios.post('/cancelAppointment/post', {
                status: 2,
            })
            .then(function (response) {
                console.log(response);
                Swal.fire(
                    '',
                    '',
                    'success'
                )
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    })
})