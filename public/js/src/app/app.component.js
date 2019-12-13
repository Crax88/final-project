import { MVCComponent } from "../framework";

class AppComponent extends MVCComponent {
    constructor(config) {
        super(config)
    }
}

export const appComponent = new AppComponent({
    selector: 'app-root',
    template: `
        <app-header></app-header>
        <router-outlet></router-outlet>
        <app-footer></app-footer>
    `
})