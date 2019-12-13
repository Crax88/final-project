import { MVCComponent } from "../../framework";

class AboutPageComponent extends MVCComponent {
    constructor(config) {
        super(config)
    }
}

export const aboutPageComponent = new AboutPageComponent({
    selector: 'app-about-page',
    template: '<h1>About Page</h1>'
})