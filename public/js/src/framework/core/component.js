import { util } from "../tools/util"
export class Component {
    constructor(config) {
        this.template = config.template
        this.selector = config.selector
        this.elem = null
    }

    render() {
        this.elem = document.querySelector(this.selector);

        if (!this.elem) {
            throw new Error('Component with selector ' + this.selector + ' wasn\'t found')
        }

        this.elem.innerHTML = this.template

        this._initEvents()
    }

    _initEvents() {
        if (util.isUndefined(this.events)) return
        let events = this.events()
        Object.keys(events).forEach(key => {
            let listener = key.split(' ')
            this.elem.querySelector(listener[1]).addEventListener(listener[0], this[events[key]].bind(this))
        })
    }
}