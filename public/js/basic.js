'use strict';
window.addEventListener("scroll", fixedMenu);
let fixedBlock = document.getElementById("header");
let fixedBlockOffsetTop = fixedBlock.getBoundingClientRect().top;

function fixedMenu() {
    if (window.pageYOffset > fixedBlockOffsetTop) {
        fixedBlock.classList.add("fixed");
    } else {
        fixedBlock.classList.remove("fixed");
    }
}


