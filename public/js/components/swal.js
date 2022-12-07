// Notification
const { el } = require('../partials/main')

const notif = el('.notif')

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: toast => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

if (notif.dataset.status) {
    Toast.fire({
        icon: notif.dataset.status,
        title: notif.dataset.message
    })
}

module.exports = {
    Toast
}