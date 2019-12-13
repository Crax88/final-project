import { homePageComponent } from "./pages/home-page.component";
import { aboutPageComponent } from "./pages/about-page.component";
import { notFound } from "./common/not-found.component";
import { tabsPageComponent } from "./pages/tabs-page.component";

export const appRoutes = [
    { path: '', component: homePageComponent},
    { path: 'main/about', component: aboutPageComponent },
    { path: 'tabs', component: tabsPageComponent },
    { path:  '**', component: notFound}
]

