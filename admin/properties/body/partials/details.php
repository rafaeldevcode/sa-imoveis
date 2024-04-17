<div data-modal="details" class="z-[99999] fixed top-0 left-0 w-full h-full items-center justify-center hidden z-50">
    <div class="bg-white rounded w-full max-w-[500px]" data-modal-body="popup">
        <div class="p-2 relative bg-color-main rounded-t">
            <button data-modal-close="popup" type="button" title="<?php _e('Close') ?>" class="absolute top-0 right-2 text-white hover:text-gray-800 w-[20px] opacity-50">
                <i class="bi bi-x text-2xl"></i>
            </button>

            <h2 class="font-bold text-white p-2 rounded text-center" id="modalDeleteItemLabel"><?php _e('Details') ?></h2>
        </div>

        <div class="p-4">
            <div class="my-2 h-[450px] overflow-x-auto">
                <ul class="flex flex-col gap-10">
                    <li class="text-color-main border border-color-main rounded p-4">
                        <div class="flex items-center gap-2">
                            <img class="h-[25px]" src="<?php asset('assets/images/icons/dormitorios.png') ?>" alt="<?php _e('Dormitories') ?>">
                            <span><?php _e('Dormitories') ?></span>
                        </div>

                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'bedrooms[]',
                                'type' => 'text',
                                'value' => isset($details['bedrooms'][0]) ? $details['bedrooms'][0] : null,
                            ]) ?>
                        </div>
                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'bedrooms[]',
                                'type' => 'text',
                                'value' => isset($details['bedrooms'][1]) ? $details['bedrooms'][1] : null,
                            ]) ?>
                        </div>
                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'bedrooms[]',
                                'type' => 'text',
                                'value' => isset($details['bedrooms'][2]) ? $details['bedrooms'][2] : null,
                            ]) ?>
                        </div>
                    </li>

                    <li class="text-color-main border border-color-main rounded p-4">
                        <div class="flex items-center gap-2">
                            <img class="h-[25px]" src="<?php asset('assets/images/icons/garagem.png') ?>" alt="<?php _e('Garage') ?>">
                            <span><?php _e('Garage') ?></span>
                        </div>                

                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'garage',
                                'type' => 'text',
                                'value' => isset($details['garage']) ? $details['garage'] : null,
                            ]) ?>
                        </div>
                    </li>

                    <li class="text-color-main border border-color-main rounded p-4">
                        <div class="flex items-center gap-2">
                            <img class="h-[25px]" src="<?php asset('assets/images/icons/area.png') ?>" alt="<?php _e('Total area') ?>">
                            <span><?php _e('Total area') ?></span>
                        </div> 

                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'total_area',
                                'type' => 'text',
                                'value' => isset($details['total_area']) ? $details['total_area'] : null,
                            ]) ?>
                        </div>
                    </li>

                    <li class="text-color-main border border-color-main rounded p-4">
                        <div class="flex items-center gap-2">
                            <img class="h-[25px]" src="<?php asset('assets/images/icons/area-privativa.png') ?>" alt="<?php _e('Private area') ?>">
                            <span><?php _e('Private area') ?></span>
                        </div> 

                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'private_area',
                                'type' => 'text',
                                'value' => isset($details['private_area']) ? $details['private_area'] : null,
                            ]) ?>
                        </div>
                    </li>

                    <li class="text-color-main border border-color-main rounded p-4">
                        <div class="flex items-center gap-2">
                            <img class="h-[25px]" src="<?php asset('assets/images/icons/banheiros.png') ?>" alt="<?php _e('Bathrooms') ?>">
                            <span><?php _e('Bathrooms') ?></span>
                        </div> 
                        
                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'bathrooms[]',
                                'type' => 'text',
                                'value' => isset($details['bathrooms'][0]) ? $details['bathrooms'][0] : null,
                            ]) ?>
                        </div>

                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'bathrooms[]',
                                'type' => 'text',
                                'value' => isset($details['bathrooms'][1]) ? $details['bathrooms'][1] : null,
                            ]) ?>
                        </div>

                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                                'name' => 'bathrooms[]',
                                'type' => 'text',
                                'value' => isset($details['bathrooms'][2]) ? $details['bathrooms'][2] : null,
                            ]) ?>
                        </div>
                    </li>

                    <li class="text-color-main border border-color-main rounded p-4">
                        <div class="flex items-center gap-2">
                            <img class="h-[25px]" src="<?php asset('assets/images/icons/mobiliado.png') ?>" alt="<?php _e('Furniture') ?>">
                            <span><?php _e('Furniture') ?></span>
                        </div>

                        <div class='w-auto'>
                            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-checkbox-switch', [
                                'name' => 'furnished',
                                'label' => __('Furnished (No | Yes)'),
                                'value' => isset($details['furnished']) ? $details['furnished'] : null,
                            ]) ?>
                        </div>
                    </li>
                </ul>
            </div>

            <div class="flex justify-end space-x-2">
                <button data-modal-close="popup" type="button" title="<?php _e('Ok') ?>" class="btn btn-color-main font-bold">
                    <?php _e('Ok') ?>
                </button>
            </div>
        </div>
    </div>
</div>
