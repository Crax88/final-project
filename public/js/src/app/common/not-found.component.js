import { MVCComponent } from "../../framework";

class NotFound extends MVCComponent {
    constructor(config) {
        super(config)
    }
}

export const notFound = new NotFound({
    selector: 'not-found',
    template: `
        <div style="display: flex; align-items: center; justify-content: center">
            <div>
                <h2 class="red darken-1">Page not found</h2>
                <a href="#">Return to Main page</a>
            </div>
        </div>
    `
})