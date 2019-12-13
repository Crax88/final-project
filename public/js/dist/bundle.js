!function(n){var e={};function t(o){if(e[o])return e[o].exports;var i=e[o]={i:o,l:!1,exports:{}};return n[o].call(i.exports,i,i.exports,t),i.l=!0,i.exports}t.m=n,t.c=e,t.d=function(n,e,o){t.o(n,e)||Object.defineProperty(n,e,{enumerable:!0,get:o})},t.r=function(n){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(n,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(n,"__esModule",{value:!0})},t.t=function(n,e){if(1&e&&(n=t(n)),8&e)return n;if(4&e&&"object"==typeof n&&n&&n.__esModule)return n;var o=Object.create(null);if(t.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var i in n)t.d(o,i,function(e){return n[e]}.bind(null,i));return o},t.n=function(n){var e=n&&n.__esModule?function(){return n.default}:function(){return n};return t.d(e,"a",e),e},t.o=function(n,e){return Object.prototype.hasOwnProperty.call(n,e)},t.p="",t(t.s=0)}([function(module,__webpack_exports__,__webpack_require__){"use strict";eval('__webpack_require__.r(__webpack_exports__);\n\n// CONCATENATED MODULE: ./framework/tools/util.js\nconst util = {\n    delay(ms = 1000) {\n        return new Promise((resolve, reject) => {\n            setTimeout(() => {\n                resolve()\n            }, ms)\n        })\n    },\n    isUndefined(d) {\n        return typeof d === \'undefined\'\n    }\n}\n\n\n// CONCATENATED MODULE: ./framework/core/module.js\n\n\n\nclass module_Module {\n    constructor(config) {\n        this.components = config.components\n        this.bootstrapComponent = config.bootstrap\n        this.routes = config.routes\n    }\n\n    start() {\n        this.initComponents()\n        if (this.routes) this.initRoutes()\n    }\n\n    initComponents() {\n        this.bootstrapComponent.render()\n        this.components.forEach(this.renderComponent.bind(this))\n    }\n\n    initRoutes() {\n        window.addEventListener(\'hashchange\', this.renderRoute.bind(this))\n        this.renderRoute();\n    }\n\n    renderRoute() {\n        let url = router.getUrl()\n        let route = this.routes.find(route => route.path === url)\n        if (util.isUndefined(route)) {\n            route = this.routes.find(route => route.path === \'**\')\n        }\n        document.querySelector(\'router-outlet\').innerHTML = `<${route.component.selector}></${route.component.selector}>`\n        this.renderComponent(route.component)\n    }\n    renderComponent(component) {\n        if (!util.isUndefined(component.onInit)) component.onInit()\n        component.render()\n        if (!util.isUndefined(component.afterInit)) component.afterInit()\n    }\n}\n\n// CONCATENATED MODULE: ./framework/core/component.js\n\nclass component_Component {\n    constructor(config) {\n        this.template = config.template\n        this.selector = config.selector\n        this.elem = null\n    }\n\n    render() {\n        this.elem = document.querySelector(this.selector);\n\n        if (!this.elem) {\n            throw new Error(\'Component with selector \' + this.selector + \' wasn\\\'t found\')\n        }\n\n        this.elem.innerHTML = this.template\n\n        this._initEvents()\n    }\n\n    _initEvents() {\n        if (util.isUndefined(this.events)) return\n        let events = this.events()\n        Object.keys(events).forEach(key => {\n            let listener = key.split(\' \')\n            this.elem.querySelector(listener[1]).addEventListener(listener[0], this[events[key]].bind(this))\n        })\n    }\n}\n// CONCATENATED MODULE: ./framework/core/bootstrap.js\nfunction bootstrap(module) {\n    module.start()\n}\n// CONCATENATED MODULE: ./framework/tools/router.js\nconst router = {\n    getUrl() {\n        return window.location.hash.slice(1)\n    },\n\n    navigate(hash) {\n        window.location.hash = hash\n    }\n}\n// CONCATENATED MODULE: ./framework/index.js\n\n\n\n\n\n\n\n// CONCATENATED MODULE: ./app/app.component.js\n\n\nclass app_component_AppComponent extends component_Component {\n    constructor(config) {\n        super(config)\n    }\n}\n\nconst appComponent = new app_component_AppComponent({\n    selector: \'app-root\',\n    template: `\n        <app-header></app-header>\n        <router-outlet></router-outlet>\n        <app-footer></app-footer>\n    `\n})\n// CONCATENATED MODULE: ./app/common/app.header.js\n\n\nclass app_header_AppHeader extends component_Component {\n    constructor(config) {\n        super(config)\n    }\n\n    events() {\n        return {\n            "click .sidenav-trigger": "onMenuClick"\n        }\n    }\n\n    onMenuClick({ target}) {\n        var elems = document.querySelectorAll(\'.sidenav\');\n    var instances = M.Sidenav.init(elems);\n    }\n}\n\nconst appHeader = new app_header_AppHeader({\n    selector: \'app-header\',\n    template: `\n        <nav class="blue-grey darken-3">\n        <div class="nav-wrapper container">\n        <a href="/" class="brand-logo">Poster</a>\n        <a href="#" data-target="mobile-menu" class="sidenav-trigger right"><i class="material-icons">menu</i></a>\n        <ul id="nav-mobile" class="right hide-on-med-and-down">\n            <li><a href="#">Home</a></li>\n            <li><a href="#main/about">About</a></li>\n            <li><a href="/posts">Posts</a></li>\n            <li><a href="/users/register">Sign Up</a></li>\n            <li><a href="/users/login">Sign In</a></li>\n            <li><a href="#tabs">Tabs</a></li>\n        </ul>\n        </div>\n    </nav>\n    <ul class="sidenav grey darken-2" id="mobile-menu">\n        <li><a href="/" class="white-text"><i class="material-icons white-text">home</i>Home</a></li>\n        <li><div class="divider"></div></li>\n        <li><a href="/main/about" class="white-text"><i class="material-icons white-text">info</i>About</a></li>\n        <li><div class="divider"></div></li>\n        <li><a href="/posts" class="white-text"><i class="material-icons white-text">insert_comment</i>Posts</a></li>\n        <li><div class="divider"></div></li>\n        <li><a href="/users/register" class="white-text"><i class="material-icons white-text">person_add</i>Sign Up</a></li>\n        <li><div class="divider"></div></li>\n        <li><a href="/users/login" class="white-text"><i class="material-icons white-text">person</i>Sign In</a></li>\n    </ul>\n    `\n})\n// CONCATENATED MODULE: ./app/pages/home-page.component.js\n\n\nclass home_page_component_HomePageComponent extends component_Component {\n    constructor(config) {\n        super(config)\n    }\n\n    events() {\n        return {\n            "click .js-link": "goToAbout"\n        }\n    }\n\n    onInit() {\n        console.log(\'Component Init.\')\n    }\n    afterInit() {\n        console.log("Component after init")\n    }\n    goToAbout(e) {\n        e.preventDefault()\n        router.navigate(\'main/about\')\n    }\n}\n\nconst homePageComponent = new home_page_component_HomePageComponent({\n    selector: \'app-home-page\',\n    template: `\n        <div class="container">\n            <div class="card-panel grey lighten-3">\n                <div class="container">\n                    <h1 class="center-align">Poster</h1>\n                    <p class="center-align">A simple social network built with PHP by N.Trafilkin.</p>\n                </div>\n            </div>\n            <div class="card-action">\n                <a href="#main/about" class="js-link">Go to About page</a>\n          </div>\n        </div>    \n    `\n})\n// CONCATENATED MODULE: ./app/pages/about-page.component.js\n\n\nclass about_page_component_AboutPageComponent extends component_Component {\n    constructor(config) {\n        super(config)\n    }\n}\n\nconst aboutPageComponent = new about_page_component_AboutPageComponent({\n    selector: \'app-about-page\',\n    template: \'<h1>About Page</h1>\'\n})\n// CONCATENATED MODULE: ./app/common/not-found.component.js\n\n\nclass not_found_component_NotFound extends component_Component {\n    constructor(config) {\n        super(config)\n    }\n}\n\nconst notFound = new not_found_component_NotFound({\n    selector: \'not-found\',\n    template: `\n        <div style="display: flex; align-items: center; justify-content: center">\n            <div>\n                <h2 class="red darken-1">Page not found</h2>\n                <a href="#">Return to Main page</a>\n            </div>\n        </div>\n    `\n})\n// CONCATENATED MODULE: ./app/pages/tabs-page.component.js\n\n\nclass tabs_page_component_TabsPageComponent extends component_Component {\n    constructor(config) {\n        super(config)\n    }\n\n    events() {\n        return {\n            "click .collapsible": "onTabClick"\n        }\n    }\n\n    onTabClick({ target}) {\n        if (!target.classList.contains(\'collapsible-header\')) return\n        this.elem.querySelectorAll(\'.tab\').forEach(el => el.classList.remove(\'active\'))\n        target.parentNode.classList.add(\'active\');\n    }\n}\n\nconst tabsPageComponent = new tabs_page_component_TabsPageComponent({\n    selector: \'app-tabs-page\',\n    template: `\n    <div class="container">\n        <ul class="collapsible">\n        <li class="active tab">\n            <div class="collapsible-header">\n                <i class="material-icons">filter_drama</i>First</div>\n            <div class="collapsible-body white">\n                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et\n                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\n                ex ea commodo consequat. </span>\n            </div>\n        </li>\n        <li class="tab">\n            <div class="collapsible-header">\n                <i class="material-icons">place</i>Second</div>\n            <div class="collapsible-body white">\n                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et\n                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\n                ex ea commodo consequat.</span>\n            </div>\n        </li>\n        <li class="tab">\n            <div class="collapsible-header">\n                <i class="material-icons">whatshot</i>Third</div>\n            <div class="collapsible-body white">\n                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et\n                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip\n                ex ea commodo consequat.</span>\n            </div>\n        </li>\n    </ul>\n  </container>\n    `\n})\n// CONCATENATED MODULE: ./app/app.routes.js\n\n\n\n\n\nconst appRoutes = [\n    { path: \'\', component: homePageComponent},\n    { path: \'main/about\', component: aboutPageComponent },\n    { path: \'tabs\', component: tabsPageComponent },\n    { path:  \'**\', component: notFound}\n]\n\n\n// CONCATENATED MODULE: ./app/common/app.footer.js\n\n\nclass app_footer_AppFooter extends component_Component {\n    constructor(config) {\n        super(config)\n    }\n}\n\nconst appFooter = new app_footer_AppFooter({\n    selector: \'app-footer\',\n    template: `\n        <footer class="page-footer blue-grey darken-3">\n            <div class="footer-copyright grey darken-4">\n                <div class="container center align">&copy; 2019 N.Trafilkin</div>\n            </div>\n        </footer>\n    `\n})\n// CONCATENATED MODULE: ./app/app.module.js\n\n\n\n\n\n\nclass app_module_AppModule extends module_Module {\n    constructor(config) {\n        super(config)\n    }\n}\n\nconst appModule = new app_module_AppModule({\n    components: [\n        appHeader,\n        appFooter\n    ],\n    bootstrap: appComponent,\n    routes: appRoutes\n})\n// CONCATENATED MODULE: ./index.js\n\n\n\n\ndocument,addEventListener(\'DOMContentLoaded\', () => {\n    let hashh = document.cookie.replace(/(?:(?:^|.*;\\s*)hash\\s*\\=\\s*([^;]*).*$)|^.*$/, "$1")\n    console.log(hashh)\n    window.location.hash = decodeURIComponent(hashh)\n    document.getElementsByTagName(\'body\')[0].innerHTML = \'\'\n    let root = document.createElement(\'app-root\');\n    root.innerHTML = `\n        <div id="preloader">\n            <div class="preloader-wrapper big active">\n                <div class="spinner-layer spinner-blue-only">\n                    <div class="circle-clipper left">\n                        <div class="circle"></div>\n                    </div><div class="gap-patch">\n                        <div class="circle"></div>\n                    </div><div class="circle-clipper right">\n                        <div class="circle"></div>\n                    </div>\n                </div>\n            </div>\n        </div>\n    `\n    document.getElementsByTagName(\'body\')[0].appendChild(root);\n    util.delay().then(() => {\n        bootstrap(appModule)\n    })\n\n})\n\n\n//# sourceURL=webpack:///./index.js_+_15_modules?')}]);