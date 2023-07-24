window.onscroll = () => setSticky()

const header = document.getElementById('topbar')

console.log(header)

const sticky = header.offsetTop + header.offsetHeight

const setSticky = () => {
    if (window.pageYOffset >= sticky) {
        console.log('Sticky')
        header.classList.add("sticky", "navbar-onScroll")
    } else {
        console.log('Not sticky')
        header.classList.remove("sticky", "navbar-onScroll")
    }
}