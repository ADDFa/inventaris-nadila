const { Toast } = require('../../components/swal')
const { el } = require('../../partials/main')
const { buttonOff, buttonOn } = require('./new')

const deleteItem = target => {
    const dataList = target.dataset

    buttonOff()

    fetch(`${origin}/item/${dataList.action}/${dataList.id}`, {
        method: 'DELETE'
    })
        .then(res => res.json())
        .then(res => {
            if (res.ok) {
                Toast.fire({
                    icon: 'success',
                    title: res.message
                })

                const parentTarget = target.parentElement
                el('.modal-body ul').removeChild(parentTarget)
            }

            if (!res.ok) {
                Toast.fire({
                    icon: 'error',
                    title: res.message
                })
            }
        })

    buttonOn()
}

module.exports = deleteItem