const { default: axios } = require('axios');

require('./bootstrap');


function updateTd(params,status) {

    if (status == 'oke') {
        $(params).parent().html('Approve')
    } else {
        $(params).parent().html('Cancel')
    }

}

$('.approveAction').on('click',function name(params) {
    let thisEl = this
    let dataRow = $(thisEl).data('row')
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
                row: `F${dataRow}`,
            })
            .then(function (response) {
                console.log(response);
                Swal.fire(
                    '',
                    '',
                    'success'
                )
                updateTd(thisEl,'oke')
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    })
})

$('.cancelAction').on('click',function name(params) {
    let thisEl = this
    let dataRow = $(thisEl).data('row')
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
                row: `F${dataRow}`,
            })
            .then(function (response) {
                console.log(response);
                Swal.fire(
                    '',
                    '',
                    'success'
                )
                updateTd(thisEl,'nok')
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    })
})