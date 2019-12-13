import { MVCComponent } from "../../framework";

class AppHeader extends MVCComponent {
    constructor(config) {
        super(config)
    }

    events() {
        return {
            "click .sidenav-trigger": "onMenuClick"
        }
    }

    onMenuClick({ target}) {
        var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
    }
}

export const appHeader = new AppHeader({
    selector: 'app-header',
    template: `
        <nav class="blue-grey darken-3">
        <div class="nav-wrapper container">
        <a href="/" class="brand-logo">Poster</a>
        <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="#">Home</a></li>
            <li><a href="#main/about">About</a></li>
            <li><a href="/posts">Posts</a></li>
            <li><a href="/users/register">Sign Up</a></li>
            <li><a href="/users/login">Sign In</a></li>
            <li><a href="#tabs">Tabs</a></li>
        </ul>
        </div>
    </nav>
    <ul class="sidenav grey darken-2" id="mobile-menu">
        <li><a href="/" class="white-text"><i class="material-icons white-text">home</i>Home</a></li>
        <li><div class="divider"></div></li>
        <li><a href="/main/about" class="white-text"><i class="material-icons white-text">info</i>About</a></li>
        <li><div class="divider"></div></li>
        <li><a href="/posts" class="white-text"><i class="material-icons white-text">insert_comment</i>Posts</a></li>
        <li><div class="divider"></div></li>
        <li><a href="/users/register" class="white-text"><i class="material-icons white-text">person_add</i>Sign Up</a></li>
        <li><div class="divider"></div></li>
        <li><a href="/users/login" class="white-text"><i class="material-icons white-text">person</i>Sign In</a></li>
    </ul>
    `
})