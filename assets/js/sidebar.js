window.onload = function(){
    const sidebar = document.querySelector(".sidebar");
    const closeBtn = document.querySelector("#btn");
    const searchBtn = document.querySelector(".bx-search")
    const eliasLogo = document.querySelector("#eliasLogo");

    eliasLogo.style.display = 'none';

    closeBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    searchBtn.addEventListener("click",function(){
        sidebar.classList.toggle("open")
        menuBtnChange()
    })

    function menuBtnChange(){
        if(sidebar.classList.contains("open")){
            closeBtn.classList.replace("bx-menu","bx-menu-alt-right")
            eliasLogo.style.display = 'block';
        }else{
            closeBtn.classList.replace("bx-menu-alt-right","bx-menu")
            eliasLogo.style.display = 'none';
        }
    }
}


// 



