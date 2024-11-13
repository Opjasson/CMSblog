import { bootstrap, enableTooltip, enablePopover } from "./plugins/bootstrap";
import './layouts/dashboard'
try {
    enableTooltip(true);
    enablePopover(true);
    window.bootstrap = bootstrap;
} catch (exception) {
    console.error(exception);
}