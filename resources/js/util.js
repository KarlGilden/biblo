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

const handleTabChange = (button) => {
    const list  = document.getElementById("lesson-tabs").children;
    const toOpen = document.getElementById(button.dataset.to);
    console.log(list)
    for(let i=0;i<list.length;i++){
        const prevButton = list[i];
        const tab = document.getElementById(list[i].dataset.to);
        
        prevButton.classList.remove("active");
        tab.classList.remove("active");
    }

    button.classList.add("active");
    toOpen.classList.add("active");
}