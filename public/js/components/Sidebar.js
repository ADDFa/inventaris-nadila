import {
    Main
} from '../main/Main.js'

export class Sidebar extends Main {
    constructor() {
        super()
        this.sidebar()
    }

    sidebar = () => {
        document.addEventListener("DOMContentLoaded", () => {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show-nav')
                        toggle.classList.toggle('bx-x')
                        bodypd.classList.toggle('body-pd')
                        headerpd.classList.toggle('body-pd')
                    })
                }
            }

            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header')

            /*===== LINK ACTIVE =====*/
            const linkColor = document.querySelectorAll('.nav_link')

            function colorLink() {
                if (linkColor) {
                    linkColor.forEach(l => l.classList.remove('active'))
                    this.classList.add('active')
                }
            }

            linkColor.forEach(l => l.addEventListener('click', colorLink))

            // TODO: Set Active Class
            const active = this.el('.active')
            if (!active) return
            active.classList.remove('active')

            const path = location.pathname
            const target = (this.el(`[href="${path}"]`)) ? path : '/' + path.split('/')[1]
            this.el(`[href="${target}"]`).classList.add('active')
        })
    }
}