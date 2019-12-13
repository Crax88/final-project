import { MVCComponent } from "../../framework";

class AppFooter extends MVCComponent {
    constructor(config) {
        super(config)
    }
}

export const appFooter = new AppFooter({
    selector: 'app-footer',
    template: `
        <footer class="page-footer blue-grey darken-3">
            <div class="footer-copyright grey darken-4">
                <div class="container center align">&copy; 2019 N.Trafilkin</div>
            </div>
        </footer>
    `
})