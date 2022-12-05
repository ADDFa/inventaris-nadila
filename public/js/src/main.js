require('./bootstrap.bundle.min')
require('../components/form')
require('../partials/sidebar')

const { el } = require('../partials/main')

// Notification
const notif = el('.notif')

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 2000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

if (notif) {
    if (notif.dataset.status) {
        Toast.fire({
            icon: notif.dataset.status,
            title: notif.dataset.message
        })
    }
}

// Delete
document.addEventListener('click', e => {
    if (e.target.classList.contains('delete')) {
        Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan dihapus secara permanent!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(result => {
            if (result.isConfirmed) {
                const form = e.target.form || e.target.parentElement.form
                form.querySelector('[type="submit"]').click()
            }
        })
    }
})