const accordions = document.getElementsByClassName('has-submenu');

for (var i = 0; i < accordions.length; i++) {
    accordions[i].onclick = function(){
        this.classList.toggle('is-active');

        const submenu = this.nextElementSibling;
        if(submenu.style.maxHeight){
            submenu.style.maxHeight = null;
            submenu.style.marginTop = null;
            submenu.style.marginBottom = null;
        }else{
            submenu.style.maxHeight = submenu.scrollHeight + "px";
            submenu.style.marginTop = '0.75em';
            submenu.style.marginBottom = '0.75em';
        }
    }
}
