'use strict';

class Menu{
    static admin(element){
        element.click((event) => {
            const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
    
            const menu = $('#menu');
            const aside = $('aside');
            const items = document.querySelectorAll('[data-item-active]');
            const divBtn = $('#div-closed');
        
            if(width <= 720){
        
                if(event.target.checked){
                    menu.addClass('menu-mobile-open');
        
                    aside.attr('data-expanded', 'mobile-active');
                    divBtn.addClass('div-closed');
                    divBtn.attr('data-divbtn-closed', 'active');
                }else{
                    menu.removeClass('menu-mobile-open');
                    divBtn.attr('data-divbtn-closed', 'desactive');
        
                    document.getElementById('checkbox-menu').checked = false;
        
                    setTimeout(()=>{
                        aside.attr('data-expanded', 'mobile-desactive');
                        divBtn.removeClass('div-closed');
                    }, 200);
                }
            }else{
                if(event.target.checked){
                    aside.attr('data-expanded', 'active');
        
                    items.forEach((item)=>{
                        $(item).parent().find('i').removeClass('w-full');
        
                        $(item).removeClass('hidden');
                        $(item).attr('data-item-active', 'true');
                    });

                    Cookies.set('open_menu', true, 500000);
                }else{
                    aside.attr('data-expanded', 'desactive');
        
                    items.forEach((item)=>{
                        $(item).attr('data-item-active', 'false');
        
                        setTimeout(()=>{
                            $(item).parent().find('i').addClass('w-full');
        
                            $(item).addClass('hidden');
                        }, 600);
                    });

                    Cookies.forget('open_menu');
                }
            }
        });
    }

    static client(){
        $('#checkbox-menu').click((event) => {
            const nav = $(event.target).parent().parent().parent().find('nav');
            const ul = nav.find('ul');
    
            if(event.target.checked){
                nav.css('display', 'block');
                nav.attr('data-navclient-active', 'true');
                ul.attr('data-expanded-client', 'ative');
                $(event.target).parent().parent().addClass('fixed-close-menu');
            }else{
        
                nav.attr('data-navclient-active', 'false');
                ul.attr('data-expanded-client', 'inative');
                $(event.target).parent().parent().removeClass('fixed-close-menu');
                    
                setTimeout(() => {
                    nav.css('display', 'none');
                }, 200);
            }
        });
    }

    static checkIsOpen(){
        const width = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        const buttonMenu = $('#checkbox-menu');
        const aside = $('aside');
        const items = document.querySelectorAll('[data-item-active]');
        const isOpen = Cookies.get('open_menu');
    
        if(width > 750){
            if(isOpen){
                buttonMenu.click();

                aside.attr('data-expanded', 'active');
            
                items.forEach((item)=>{
                    $(item).parent().find('i').removeClass('w-full');
    
                    $(item).removeClass('hidden');
                    $(item).attr('data-item-active', 'true');
                });
            }
        }
    }
}
