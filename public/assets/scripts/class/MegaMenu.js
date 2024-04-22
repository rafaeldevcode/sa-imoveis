'use strict';

class MegaMenu {
    static init () {
        $('[data-open]').each((key, button) => {
            $(button).on('click', (event) => {
                const target = $(`[data-open-target="${$(button).attr('data-open')}"]`);
                this.hideAll(target.attr('data-open-target'));
                const icon = $(button).find('i');

                if (target.attr('data-target-open') === 'false') {
                    icon.addClass('rotate-90');
                    target.removeClass('hidden');
                    target.attr('data-target-open', true);
                } else {
                    icon.removeClass('rotate-90');
                    target.addClass('hidden');
                    target.attr('data-target-open', false);
                }
            });
        });
    }

    static hideAll (exception) {
        $('[data-open]').each((key, button) => {
            const target = $(`[data-open-target="${$(button).attr('data-open')}"]`);
            const icon = $(button).find('i');

            if (exception !== target.attr('data-open-target')) {
                icon.removeClass('rotate-90');
                target.addClass('hidden');
                target.attr('data-target-open', false);
            }
        });
    }
}
