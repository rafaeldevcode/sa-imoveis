<div data-modal="share-favorites" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="bg-white rounded w-full max-w-[500px]" data-modal-body="popup">
        <div class="p-2 relative bg-color-main rounded-t">
            <button data-modal-close="popup" type="button" title="<?php _e('Close') ?>" class="absolute top-0 right-2 text-white hover:text-gray-800 w-[20px] opacity-50">
                <i class="bi bi-x text-2xl"></i>
            </button>

            <h2 class="font-bold text-white p-2 rounded text-center" id="modalDeleteItemLabel">Compartilhar favoritos</h2>
        </div>

        <div class="p-4 gap-2 flex justify-center items-end">
            <p class="inline font-bold text-color-main" id="link-favorites"></p>

            <button id="copy-link" type='button' title='Copiar' class='p-2 text-xs rounded btn-info text-light fw-bold'>
                <i class="bi bi-copy"></i>
            </button>
        </div>

        <div class="p-4 flex justify-end items-center gap-4">
            <button data-modal-close="popup" type="button" title="<?php _e('Ok') ?>" class="btn btn-color-main font-bold">
                <?php _e('Ok') ?>
            </button>
        </div>
    </div>
</div>
