import { MVCComponent } from "../../framework";

class TabsPageComponent extends MVCComponent {
    constructor(config) {
        super(config)
    }

    events() {
        return {
            "click .collapsible": "onTabClick"
        }
    }

    onTabClick({ target}) {
        if (!target.classList.contains('collapsible-header')) return
        this.elem.querySelectorAll('.tab').forEach(el => el.classList.remove('active'))
        target.parentNode.classList.add('active');
    }
}

export const tabsPageComponent = new TabsPageComponent({
    selector: 'app-tabs-page',
    template: `
    <div class="container">
        <ul class="collapsible">
        <li class="active tab">
            <div class="collapsible-header">
                <i class="material-icons">filter_drama</i>First</div>
            <div class="collapsible-body white">
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat. </span>
            </div>
        </li>
        <li class="tab">
            <div class="collapsible-header">
                <i class="material-icons">place</i>Second</div>
            <div class="collapsible-body white">
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.</span>
            </div>
        </li>
        <li class="tab">
            <div class="collapsible-header">
                <i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body white">
                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                ex ea commodo consequat.</span>
            </div>
        </li>
    </ul>
  </container>
    `
})