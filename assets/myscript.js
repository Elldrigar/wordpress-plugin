!function(e){var t={};function n(o){if(t[o])return t[o].exports;var r=t[o]={i:o,l:!1,exports:{}};return e[o].call(r.exports,r,r.exports,n),r.l=!0,r.exports}n.m=e,n.c=t,n.d=function(e,t,o){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(n.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)n.d(o,r,function(t){return e[t]}.bind(null,r));return o},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";n.r(t);n(1);window.addEventListener("load",(function(){const e=document.querySelector(".form__input"),t=document.querySelector(".form__button"),n=document.querySelector(".todo-container__list");t.addEventListener("click",(function(t){if(""===e.value);else{t.preventDefault();const o=document.createElement("div");o.classList.add("todo");const r=document.createElement("li");r.innerText=e.value,r.classList.add("todo__item"),o.appendChild(r);const c=document.createElement("button");c.innerHTML='<i class="fas fa-check"></i>',c.classList.add("todo__completeBtn"),o.appendChild(c);const i=document.createElement("button");i.innerHTML='<i class="fas fa-trash"></i>',i.classList.add("todo__trashBtn"),o.appendChild(i),n.appendChild(o),e.value=""}})),n.addEventListener("click",deleteTodo)}))},function(e,t,n){}]);