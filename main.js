let sidenav = document.querySelectorAll('.sidenav');
let sidenavInst = M.Sidenav.init(sidenav);
let materialImg = document.querySelectorAll('.materialboxed');
let materialImgInst = M.Materialbox.init(materialImg);
if (window.location.pathname === '/') {
    console.log('main page')
} else {
    console.log('some page')
}
