'use strict';

class ChangeLocationMaps{
    static init(event){
        const value = event.target.value;
        const regex = /src="([^"]+)"/;
        const match = value.match(regex);

        if (match) {
            const srcValue = match[1];
            
            $(event.target).val(srcValue);
          } else {
            $(event.target).val(value);
          }
    }
}
