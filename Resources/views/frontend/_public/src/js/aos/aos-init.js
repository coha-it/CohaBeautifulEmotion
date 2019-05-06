function aos_init() {
    AOS.init({
        //offset: 200,
        duration: 600,
        //easing: 'ease-in-sine',
        //delay: 100,
    });
}

jQuery( document ).ready(function(){
    aos_init();
});

$( document ).ajaxComplete(function() {
    aos_init();
});