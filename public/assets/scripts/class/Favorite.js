'use strict';

class Favorite {
    static init () {
        $('[data-favorite]').each((key, button) => {
            $(button).on('click', (event)  => {
                const icon = $(button).find('i');
                const status = $(button).attr('data-favorite-status');
            
                if (status === 'true') {
                    icon.removeClass('bi bi-heart-fill')
                    icon.addClass('bi bi-heart');

                    this.remove($(button).attr('data-favorite'));

                    $(button).attr('data-favorite-status', false);
                } else {
                    icon.removeClass('bi bi-heart')
                    icon.addClass('bi bi-heart-fill');

                    this.add($(button).attr('data-favorite'));

                    $(button).attr('data-favorite-status', true);
                }
            });
        });
    }

    static add (id) {
        let favorites = Cookies.get('properties::favorites');
        favorites = favorites ? JSON.parse(favorites) : [];

        favorites.push(parseInt(id));

        Cookies.set('properties::favorites', JSON.stringify(favorites), 100000000);
    }

    static remove (id) {
        let favorites = Cookies.get('properties::favorites');
        favorites = favorites ? JSON.parse(favorites) : [];
        let indexToRemove = favorites.indexOf(parseInt(id));

        if (indexToRemove !== -1) {
            favorites.splice(indexToRemove, 1);
        }

        Cookies.set('properties::favorites', JSON.stringify(favorites), 100000000);
    }

    static share () {
        $('#share-favorites').on('click', () => {
            let favorites = Cookies.get('properties::favorites');
            favorites = favorites ? JSON.parse(favorites) : [];
             
            if (favorites.length >= 3) {
                const link = this.generateLink(favorites.join('-'));
                
                $('#link-favorites').text(link);

                Modal.open('share-favorites');
                this.copy();
            } else {
                Message.create('Adicione mais items aos favoritos para compartilhar!', 'info');
            }
        });
    }

    static copy () {
        $('#copy-link').on('click', () => {
            const linkToCopy = $('#link-favorites').text();

            const textarea = $('<textarea />');
            textarea.val(linkToCopy);
            $('body').append(textarea);
        
            const textareaElement = textarea.get(0);
            
            textareaElement.select();
            textareaElement.setSelectionRange(0, 99999);
        
            try {
                const successful = document.execCommand('copy');
                const message = successful ? 'Link copiado com sucesso!' : 'Falha ao copiar o link.';
                const type = successful ? 'success' : 'danger';
        
                Message.create(message, type);
            } catch (err) {
                console.error('Erro ao copiar o texto: ', err);
            }
        
            textarea.remove(); 
        });
    }

    static generateLink (path) {
        const href = window.location.href.replace(/\/$/, '');

        return `${href}/${path}`;
    }
}
