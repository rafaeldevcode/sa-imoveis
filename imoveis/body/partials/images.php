<div data-modal="images" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="bg-white rounded w-full max-w-[1300px] max-h-[700px]" data-modal-body="popup">
        <div class="p-2 relative bg-color-main rounded-t">
            <button data-modal-close="popup" type="button" title="<?php _e('Close') ?>" class="absolute top-0 right-2 text-white hover:text-gray-800 w-[20px] opacity-50">
                <i class="bi bi-x text-2xl"></i>
            </button>

            <h2 class="font-bold text-white p-2 rounded text-center" id="modalDeleteItemLabel">Galeria de imagens</h2>
        </div>

        <div class="p-4 flex justify-between items-center gap-4">
            <button data-image="previous" class="border rounded-l border-grey-700 px-2 py-3 h-full bg-transparent rounded-bottom" type="button" title="<?php _e('Previous image') ?>">
                <i class="bi bi-arrow-left-short text-gray-800"></i>
            </button>

            <div class="w-full">
                <img class="max-w-full max-h-[500px] object-contain" id="images" width="100%" height="100%" src=""></img>
            </div>

            <button data-image="next" class="border rounded-r m-0 border-grey-700 px-2 py-3 h-full bg-transparent rounded-bottom" type="button" title="<?php _e('Next image') ?>">
                <i class="bi bi-arrow-right-short text-gray-800"></i>
            </button>
        </div>
    </div>
</div>
