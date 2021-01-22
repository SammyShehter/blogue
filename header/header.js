 'use strict'

 const mobileMenuCall = document.querySelector('.mobile-menu-call')
 const menu = document.querySelector('.menu')
 const submenuCall = document.querySelector('.menu-active')
 const submenu = document.querySelector('.submenu')

 window.addEventListener("resize", () => {
     if (document.body.clientWidth < 1024) {
         menu.classList.add('hide')
     } else {
         menu.classList.remove('hide')
         menu.classList.remove('show')
         submenu.classList.remove('show')
     }
 })

 mobileMenuCall.addEventListener('click', () => {
     menu.classList.toggle('show')
 })


 submenuCall.addEventListener('click', () => {
     if (document.body.clientWidth <= 1024) {
         submenu.classList.toggle('show')
     }
 })