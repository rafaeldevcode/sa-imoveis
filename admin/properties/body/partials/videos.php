<div data-modal="videos" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="bg-white rounded w-full max-w-[500px]" data-modal-body="popup">
        <div class="p-2 relative bg-color-main rounded-t">
            <button data-modal-close="popup" type="button" title="<?php _e('Close') ?>" class="absolute top-0 right-2 text-white hover:text-gray-800 w-[20px] opacity-50">
                <i class="bi bi-x text-2xl"></i>
            </button>

            <h2 class="font-bold text-white p-2 rounded text-center" id="modalDeleteItemLabel"><?php _e('Add videos') ?></h2>
        </div>

        <div class="p-4">
            <div>
                <div class="h-[450px] overflow-x-auto" data-list="videos">
                    <?php if (is_array($videos)) {
                        foreach ($videos as $indice => $video) { ?>
                            <div class="my-3 flex w-full">
                                <label class="relative block w-full">
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <i class="bi bi-play-btn-fill absolute mr-2 my-2 ml-1 text-secondary"></i>
                                    </span>
                                    
                                    <input value="<?php echo $video ?>" class="placeholder:italic placeholder:text-secondary block bg-white w-full border border-secondary rounded-l py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-color-main focus:ring-color-main focus:ring-1 sm:text-sm" placeholder="Video <?php $indice + 1 ?>" type="text" name="videos[]" onkeyup="ChangeLocationMaps.init(event)">
                                </label>
                                <button class="bg-danger rounded-r text-white px-4 font-bold border border-danger hover:bg-white hover:text-danger ease-in duration-300" type="button" title="<?php _e('Video :indice', [':indice' => $indice + 1]) ?>" data-item="remove">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </div>
                        <?php }
                        } ?>
                </div>

                <button id="add-videos" type="button" title="<?php _e('Add') ?>" class="mx-auto btn btn-color-main font-bold mt-4">
                    <?php _e('Add') ?>
                </button>
            </div>

            <div class="flex justify-end space-x-2">
                <button data-modal-close="popup" type="button" title="<?php _e('Ok') ?>" class="btn btn-color-main font-bold">
                    <?php _e('Ok') ?>
                </button>
            </div>
        </div>
    </div>
</div>
