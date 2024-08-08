window.$ = window.jQuery = require('jquery');
import 'jquery-ui/ui/widgets/tabs';
import { gsap } from 'gsap';
import { GLOBAL_VARS } from '@globals';

$(function ($) {

    $(".panel-tabs").tabs();

    $(".content-btn-mark-line").each(function (index, element) {
        $(element).on("click", function (event) {
            var row_item = $(element.parentNode)

            if($(row_item).hasClass("marked")){
                gsap.fromTo(
                    row_item,
                    {
                        backgroundColor: "#8fe8d8",
                    },
                    {
                        backgroundColor: "white",
                        duration: .5,
                        ease: "power1.out",
                        onComplete: function () {
                            $(row_item).removeClass("marked")
                        }
                    }
                );
            }else{
                gsap.fromTo(
                    row_item,
                    {
                        backgroundColor: "white",
                    },
                    {
                        backgroundColor: "#8fe8d8",
                        duration: .5,
                        ease: "power1.out",
                        onComplete: function () {
                            $(row_item).addClass("marked")
                        }
                    }
                );
            }
        })
    })

});
