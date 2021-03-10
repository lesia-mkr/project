'use strict';

let addForm = document.forms['additem'];
let name = document.forms.additem.elements.name;
let url = document.forms.additem.elements.url;
let description = document.forms.additem.elements.description;
let price = document.forms.additem.elements.price;
let count = document.forms.additem.elements.count;
let button = document.forms.additem.elements.submit;

addForm.addEventListener('keyup', check);

function check(event){
    console.log(event.target.name);
    let target = event.target.name;
    console.log(price.value);
    if (target == 'count') {
        if (count.value < 0){
            count.setAttribute('class', 'error');
            checkAll();
        } else {
            count.classList.remove('error');
            checkAll();
        }
    }
    if (target == 'name') {
        if (name.value.length <= 6){
            name.setAttribute('class', 'error');
            checkAll();
        } else {
            name.classList.remove('error');
            checkAll();
        }
    }
    if (target == 'price') {
        if (price.value < 1){
            price.setAttribute('class', 'error');
            checkAll();
        } else {
            price.classList.remove('error');
            checkAll();
        }
    }
    if (target == 'url') {
        if (url.value.length < 7){
            url.setAttribute('class', 'error');
            checkAll();
        } else {
            url.classList.remove('error');
            checkAll();
        }
    }
    if (target == 'description') {
        if (description.value.length < 3){
            description.setAttribute('class', 'error');
            checkAll();
        } else {
            description.classList.remove('error');
            checkAll();
        }
    }
} 

function checkAll(){
    let errors = document.querySelectorAll('.error');
    if (errors.length > 0){
        button.disabled = true;
    } else {
        button.disabled = false;
    }
}