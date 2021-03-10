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
    let target = event.target.name;
    if (target == 'count') {
        if (count.value < 0){
            count.setAttribute('class', 'error');
            count.classList.remove('valid');
            checkAll();
        } else {
            count.classList.remove('error');
            count.classList.add('valid');
            checkAll();
        }
    }
    if (target == 'name') {
        if (name.value.length <= 6){
            name.setAttribute('class', 'error');
            name.classList.remove('valid');
            checkAll();
        } else {
            name.classList.remove('error');
            name.classList.add('valid');
            checkAll();
        }
    }
    if (target == 'price') {
        if (price.value < 1){
            price.setAttribute('class', 'error');
            price.classList.remove('valid');
            checkAll();
        } else {
            price.classList.remove('error');
            price.classList.add('valid');
            checkAll();
        }
    }
    if (target == 'url') {
        if (url.value.length < 7){
            url.setAttribute('class', 'error');
            url.classList.remove('valid');
            checkAll();
        } else {
            url.classList.remove('error');
            url.classList.add('valid');
            checkAll();
        }
    }
    if (target == 'description') {
        if (description.value.length < 3){
            description.setAttribute('class', 'error');
            description.classList.remove('valid');
            checkAll();
        } else {
            description.classList.remove('error');
            description.classList.add('valid');
            checkAll();
        }
    }
} 

function checkAll(){
    let errors = document.querySelectorAll('.error');
    let valid = document.querySelectorAll('.valid');
    if (errors.length > 0 || valid.length < 5){
        button.disabled = true;
    } else {
        button.disabled = false;
    }
}