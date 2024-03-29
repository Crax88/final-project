import { router } from ".."
import { util } from "../tools/util"

export class Module {
    constructor(config) {
        this.components = config.components
        this.bootstrapComponent = config.bootstrap
        this.routes = config.routes
    }

    start() {
        this.initComponents()
        if (this.routes) this.initRoutes()
    }

    initComponents() {
        this.bootstrapComponent.render()
        this.components.forEach(this.renderComponent.bind(this))
    }

    initRoutes() {
        window.addEventListener('hashchange', this.renderRoute.bind(this))
        this.renderRoute();
    }

    renderRoute() {
        let url = router.getUrl()
        let route = this.routes.find(route => route.path === url)
        if (util.isUndefined(route)) {
            route = this.routes.find(route => route.path === '**')
        }
        document.querySelector('router-outlet').innerHTML = `<${route.component.selector}></${route.component.selector}>`
        this.renderComponent(route.component)
    }
    renderComponent(component) {
        if (!util.isUndefined(component.onInit)) component.onInit()
        component.render()
        if (!util.isUndefined(component.afterInit)) component.afterInit()
    }
}
