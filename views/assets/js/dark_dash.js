const sidemenu= document.querySelector("aside");
const buttonHambrger= document.querySelector("#menu-btn");
const buttonClose= document.querySelector("#close-btn");
const changeTheme= document.querySelector(".theme-toggler");

buttonHambrger.addEventListener('click', ()=>{
    sidemenu.style.display= "block";
})
buttonClose.addEventListener('click', ()=>{
    sidemenu.style.display= "none";
})

changeTheme.addEventListener('click', ()=>{
    document.body.classList.toggle("dark-theme-variable");
})
changeTheme.addEventListener('keydown', (keyCode)=>{
        document.body.classList.toggle("dark-theme-variable");
});