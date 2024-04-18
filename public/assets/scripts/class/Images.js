'use strict';

class Images {
    constructor () {
        this.images = [];
        this.image = $('#images');
        this.indice = 0;

        this.previous();
        this.next();
    }

    init () {
        $('[data-gallery-image]').each((key, item) => {
            this.images.push($(item).attr('data-gallery-image'));

            $(item).on('click', (event) => {
                this.indice = key;
                this.image.attr('src', this.images[this.indice]);
                Modal.open('images');
            });
        });
    }

    previous(){
        $('[data-image="previous"]').on('click', () => {
            this.indice = this.indice === 0
                ? this.images.length-1
                : this.indice-1;

            this.image.attr('src', this.images[this.indice]);
        });
    }

    next(){
        $('[data-image="next"]').on('click', () => {
            this.indice = this.indice === this.images.length-1
                ? 0
                : this.indice+1;

            this.image.attr('src', this.images[this.indice]);
        });
    }
}
