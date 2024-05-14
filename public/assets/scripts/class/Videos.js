'use strict';

class Videos {
    constructor () {
        const videos = $('#gallery-videos');

        this.videos = videos.length > 0 ? videos.attr('data-videos').split(',') : [];
        this.iframe = $('#iframe-videos');
        this.indice = 0;

        this.previous();
        this.next();
    }

    init () {
        $('#gallery-videos').on('click', (event) => {
            this.iframe.attr('src', this.videos[this.indice]);
            Modal.open('videos');
        });
    }

    previous(){
        $('[data-iframe="previous"]').on('click', () => {
            this.indice = this.indice === 0
                ? this.videos.length-1
                : this.indice-1;

            this.iframe.attr('src', this.videos[this.indice]);
        });
    }

    next(){
        $('[data-iframe="next"]').on('click', () => {
            this.indice = this.indice === this.videos.length-1
                ? 0
                : this.indice+1;

            this.iframe.attr('src', this.videos[this.indice]);
        });
    }
}
