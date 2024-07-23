window.$ = window.jQuery = require('jquery');
import { gsap } from 'gsap';
import { MotionPathPlugin } from "gsap/MotionPathPlugin";

gsap.registerPlugin(MotionPathPlugin);

$(function ($) {
    $(".menu-options .option-item").each(function(index,element){
        $(element).on("click",function(){
            const value_select = $(element).data("valium");
            $(element.parentNode.parentNode).find("strong.value-set").html(value_select)
        })
    })
});