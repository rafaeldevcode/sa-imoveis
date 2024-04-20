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
}
