function show_nav(){
    if(document.body.style.overflow == "hidden"){
        scroll_unlock();
    }
    else{
        scroll_lock();
       
    }
    document.querySelector('#mobileNav').classList.toggle('show-nav');
}
