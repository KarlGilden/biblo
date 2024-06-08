const triggerButtonPressById = (id) => {
    const button = document.getElementById(id);
    button.click();
};

const openBurgerMenu = () => {
    const menu = document.getElementById("burger-menu");

    if(menu.classList.contains("menu-open")){
        menu.classList.remove("menu-open");
        menu.classList.add("menu-closed");
    }else{
        menu.classList.remove("menu-closed");
        menu.classList.add("menu-open");
    }
};