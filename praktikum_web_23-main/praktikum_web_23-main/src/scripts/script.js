document.getElementById('burgerbar').addEventListener('click', showMenu);

function showMenu(){
    var navItems = document.getElementById('nav-items');
    var portalBtn = document.getElementById('portal-btn');
    var open = document.getElementById('show');
    var close = document.getElementById('close');

    if (navItems.style.display === "flex") {
        navItems.style.display = "none";
        portalBtn.style.display = "none";
        open.style.display = "block";
        close.style.display = "none";
    } else {
        navItems.style.display = "flex";
        portalBtn.style.display = "block";
        open.style.display = "none";
        close.style.display = "block";
    }
}

