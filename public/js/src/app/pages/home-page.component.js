import { MVCComponent, router } from "../../framework";

class HomePageComponent extends MVCComponent {
    constructor(config) {
        super(config)
    }

    events() {
        return {
            "click .js-link": "goToAbout"
        }
    }

    onInit() {
        console.log('Component Init.')
    }
    afterInit() {
        console.log("Component after init")
    }
    goToAbout(e) {
        e.preventDefault()
        router.navigate('main/about')
    }
}

export const homePageComponent = new HomePageComponent({
    selector: 'app-home-page',
    template: `
        <div class="container">
            <div class="card-panel grey lighten-3">
                <div class="container">
                    <h1 class="center-align">Poster</h1>
                    <p class="center-align">A simple social network built with PHP by N.Trafilkin.</p>
                </div>
            </div>
            <div class="card-action">
                <a href="#main/about" class="js-link">Go to About page</a>
          </div>
        </div>    
    `
})