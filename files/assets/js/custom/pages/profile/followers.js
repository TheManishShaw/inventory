"use strict";var KTProfileFollowers=function(){var t=document.getElementById("kt_followers_show_more_button"),e=document.getElementById("kt_followers_show_more_cards");return{init:function(){t.addEventListener("click",(function(i){t.setAttribute("data-kt-indicator","on"),t.disabled=!0,setTimeout((function(){t.removeAttribute("data-kt-indicator"),t.disabled=!1,t.classList.add("d-none"),e.classList.remove("d-none"),KTUtil.scrollTo(e,200)}),2e3)})),KTUtil.on(document.body,'[data-kt-user-follow="true"]',"click",(function(t){t.preventDefault();var e=this;e.setAttribute("data-kt-indicator","on"),e.disabled=!0,e.classList.contains("btn-primary")?setTimeout((function(){e.removeAttribute("data-kt-indicator"),e.classList.remove("btn-primary"),e.classList.add("btn-light"),e.querySelector(".svg-icon").classList.add("d-none"),e.querySelector(".indicator-label").innerHTML="Follow",e.disabled=!1}),1500):setTimeout((function(){e.removeAttribute("data-kt-indicator"),e.classList.add("btn-primary"),e.classList.remove("btn-light"),e.querySelector(".svg-icon").classList.remove("d-none"),e.querySelector(".indicator-label").innerHTML="Following",e.disabled=!1}),1e3)}))}}}();KTUtil.onDOMContentLoaded((function(){KTProfileFollowers.init()}));