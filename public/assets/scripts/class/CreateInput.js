'use strict';

class CreateInput {
    constructor (selector, text) {
        this.selector = selector;
        this.listElement = $(`[data-list="${selector}"]`);
        this.indice = 1;
        this.name = `${selector}[]`;
        this.text = text;
    }

    init () {
        this.add();
        this.scrollBottom();
        
        this.listElement.find('[data-item="remove"]').each((key, item) => {
            this.increment();
            this.remove($(item));
        });
    }

    add () {
        $(`#add-${this.selector}`).on('click', (event) => {
            this.createBlock();
            this.increment();
        });
    }

    remove (button) {
        button.on('click', (event) => {
            button.parent().remove();
            this.decrement();
        });
    }

    increment () {
        this.indice++;
    }

    decrement () {
        // this.indice--;
    }

    scrollBottom () {
        document.querySelector(`[data-list="${this.selector}"]`).scrollTop = document.querySelector(`[data-list="${this.selector}"]`).scrollHeight - document.querySelector(`[data-list="${this.selector}"]`).offsetHeight;
    }

    createBlock () {
        const iconClass = this.selector === 'videos' ? 'bi bi-play-btn-fill' : 'bi bi-check2-square';
        // create a new block
        const div = $('<div />');
        div.attr('class', 'my-3 flex w-full');

        // Create label
        const label = $('<label />');
        label.attr('class', 'relative block w-full');

        // Create span 
        const span = $('<span />');
        span.attr('class', 'absolute inset-y-0 left-0 flex items-center pl-2');

        // Create icon
        const icon = $('<i />');
        icon.attr('class', `${iconClass} absolute mr-2 my-2 ml-1 text-secondary`);

        span.append(icon);

        // Create input
        const input = $('<input />');
        input.attr({
            class: 'placeholder:italic placeholder:text-secondary block bg-white w-full border border-secondary rounded-l py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1 sm:text-sm',
            placeholder: `${this.text} ${this.indice}`,
            type: 'text',
            name: this.name
        });

        if (this.selector === 'videos') {
            input.attr('onkeyup', 'ChangeLocationMaps.init(event)',);
        }

        label.append(span);
        label.append(input);

        // Create button
        const button = $('<button />');
        button.attr({
            class: 'bg-danger rounded-r text-white px-4 font-bold border border-danger hover:bg-white hover:text-danger ease-in duration-300',
            type: 'button',
            title: `${this.text} ${this.indice}`
        });
        button.attr('data-item', 'remove');

        // Create icon trash
        const iconTrash = $('<i />');
        iconTrash.attr('class', 'bi bi-trash3-fill');

        button.append(iconTrash);
        div.append(label);
        div.append(button);

        this.listElement.append(div);

        this.scrollBottom()

        this.remove(button);
    }
}
