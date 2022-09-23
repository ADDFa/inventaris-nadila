const el = element => document.querySelector(`${element}`)
const elAll = elements => document.querySelectorAll(`${elements}`)

const navAktif = () => el(`[href="${location.pathname}"]`).classList.add('nav-aktif')

if (el(`[href="${location.pathname}"]`)) {
    window.addEventListener('load', navAktif)
}

const popup = (pesan, icon, title) => {
    Swal.fire(
        title,
        pesan,
        icon
    )
}

const pesan = dataPesan => {
    data = dataPesan.getAttribute('data-pesan').split(',')

    if (data[0] == 0) return popup(data[1], 'warning', 'Gagal')

    return
}

const dataPesan = el('[data-pesan]')
if (dataPesan) pesan(dataPesan)