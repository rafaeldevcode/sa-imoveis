'use strict';

class InputRange {
    static init () {
        const input = $('#value');
        const result = $('#result-value');

        result.text(this.normalize(parseInt(input.val())));

        input.on('change', (event) => {
            result.text(this.normalize(parseInt(event.target.value)));
        });
    }

    static normalize (value) {
        let valueString = value.toString();
    
        if (value > 1000) {
            const parts = [];

            while (valueString.length > 3) {
                parts.unshift(valueString.slice(-3));
                valueString = valueString.slice(0, -3);
            }

            parts.unshift(valueString);
            
            return parts.join('.');
        } else {
            return valueString;
        }
    }
}
