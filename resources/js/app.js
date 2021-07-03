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
    let dataID = $(thisEl).data('id')
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
                id: `${dataID}`,
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
    let dataID = $(thisEl).data('id')
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
                id: `${dataID}`,
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

$('.register').on('click',function name(params) {
    let thisEl = this
    let dataUser = $(thisEl).parent().data('user')
    let dataEmail = $(thisEl).parent().data('email')
    let dataName = $(thisEl).parent().data('name')
    let dataId = $(thisEl).parent().data('id')

    axios.post('/register_advisor/post', {
        username: dataUser,
        email : dataEmail,
        name : dataName,
        id: dataId
    })
    .then(function (response) {
        console.log(response);
        window.location.reload(true);
    })
    .catch(function (error) {
        console.log(error);
    });

})


axios.get('/getDataFellowProgress/3').then(function (response) {
    // handle success
    var data = response.data


})
.catch(function (error) {
    // handle error
    console.log(error);
})
.then(function () {
    // always executed
});





