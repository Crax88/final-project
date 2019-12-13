import { bootstrap } from "./framework";
import { appModule } from "./app/app.module";
import { util } from "./framework/tools/util"

document,addEventListener('DOMContentLoaded', () => {
    document.getElementsByTagName('body')[0].innerHTML = ''
    let root = document.createElement('app-root');
    root.innerHTML = `
        <div id="preloader">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue-only">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div><div class="gap-patch">
                        <div class="circle"></div>
                    </div><div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    `
    document.getElementsByTagName('body')[0].appendChild(root);
    util.delay().then(() => {
        bootstrap(appModule)
    })

})
