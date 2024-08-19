window.$ = window.jQuery = require('jquery');
import { GLOBAL_VARS } from '@globals';

$(function ($) {
    $(".form-img-user .cont-img").on("click", function () {
        const fileInput = document.querySelector("#profile_image");
        fileInput.click();
    });
});
