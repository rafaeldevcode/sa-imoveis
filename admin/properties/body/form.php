<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route($action) ?>">
        <?php if (isset($property)) { ?>
            <input type="hidden" name="id" value="<?php echo $property->id ?>">
        <?php } ?>
        
        <div class='flex justify-between flex-col-reverse lg:flex-row'>
            <div class="w-full lg:w-9/12 mt-4">
                <textarea id="tinymce" name="description"><?php echo isset($property) ? $property->description : null ?></textarea>
            </div>

            <div class="w-full lg:w-3/12 px-4">
                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-alphabet',
                        'name' => 'name',
                        'label' => __('Name'),
                        'type' => 'text',
                        'attributes' => 'required',
                        'value' => isset($property) ? $property->name : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-123',
                        'name' => 'name',
                        'label' => __('Property code'),
                        'type' => 'text',
                        'attributes' => 'disabled',
                        'value' => isset($property) ? $property->code : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-currency-dollar',
                        'name' => 'value',
                        'label' => __('Value'),
                        'type' => 'text',
                        'value' => isset($property) ? $property->value : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-currency-dollar',
                        'name' => 'value_promotion',
                        'label' => __('Value Promotion'),
                        'type' => 'text',
                        'value' => isset($property) ? $property->value_promotion : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-currency-dollar',
                        'name' => 'condominium',
                        'label' => __('Condominium'),
                        'type' => 'text',
                        'value' => isset($property) ? $property->condominium : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-currency-dollar',
                        'name' => 'iptu',
                        'label' => __('ITPU'),
                        'type' => 'text',
                        'value' => isset($property) ? $property->iptu : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-geo-alt-fill',
                        'name' => 'andress',
                        'label' => __('Property address'),
                        'type' => 'text',
                        'attributes' => 'required',
                        'value' => isset($property) ? $property->andress : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'city',
                        'label' => __('City'),
                        'attributes' => ['required' => true],
                        'value' => isset($property) ? $property->city : null,
                        'options' => $cities,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-map-fill',
                        'name' => 'location',
                        'label' => __('Link on google map'),
                        'type' => 'text',
                        'attributes' => [
                            'onkeyup' => 'ChangeLocationMaps.init(event)',
                        ],
                        'value' => isset($property) ? $property->location : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-bookmarks-fill',
                        'name' => 'category_id',
                        'label' => __('Category'),
                        'attributes' => ['required' => true],
                        'value' => isset($property) ? $property->category_id : null,
                        'options' => $categories,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'type',
                        'label' => __('Purpose of the property'),
                        'attributes' => ['required' => true],
                        'value' => isset($property) ? $property->type : null,
                        'options' => [
                            'Alugar' => __('Alugar'),
                            'Vender' => __('Vender'),
                        ],
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'status',
                        'label' => __('Status'),
                        'attributes' => ['required' => true],
                        'value' => isset($property) ? $property->status : null,
                        'options' => [
                            'disponivel' => __('Available'),
                            'indisponivel' => __('Unavailable'),
                            'reservado' => __('Reserved'),
                            'vendido' => __('Sold'),
                        ],
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'progress',
                        'label' => __('Type'),
                        'attributes' => ['required' => true],
                        'value' => isset($property) ? $property->progress : null,
                        'options' => [
                            'Em construção' => __('Em construção'),
                            'Na planta' => __('Na planta'),
                            'Novo' => __('Novo'),
                            'Seminovo' => __('Seminovo'),
                            'Lançamento' => __('Lançamento'),
                            'Outros' => __('Outros'),
                        ],
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                        'icon' => 'bi bi-hash',
                        'name' => 'show_card',
                        'label' => __('Show in card'),
                        'attributes' => ['required' => true],
                        'value' => isset($property) ? $property->show_card : null,
                        'options' => [
                            'privative' => __('Area Privative'),
                            'total' => __('Area Total'),
                        ],
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-currency-dollar',
                        'name' => 'dimension',
                        'label' => __('Dimension'),
                        'type' => 'text',
                        'value' => isset($property) ? $property->dimension : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                        'name' => 'is_launch',
                        'label' => __('Is it a launch? (No | Yes)'),
                        'value' => isset($property) ? $property->is_launch : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                        'name' => 'is_highlighted',
                        'label' => __('Is it highlighted? (No | Yes)'),
                        'value' => isset($property) ? $property->is_highlighted : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'type' => 'number',
                        'icon' => 'bi bi-map-fill',
                        'name' => 'highlighted_order',
                        'label' => __('Highlighted Order'),
                        'type' => 'text',
                        'value' => isset($property) ? $property->highlighted_order : null,
                    ]) ?>
                </div>
            </div>
        </div>

        <div class='flex gap-4 flex-wrap'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-button', [
                'type' => 'button',
                'style' => 'color-main',
                'title' => __('Videos'),
                'attributes' => [
                    'data-toggle' => 'videos',
                ],
            ]) ?>

            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-button', [
                'type' => 'button',
                'style' => 'color-main',
                'title' => __('Characteristics'),
                'attributes' => [
                    'data-toggle' => 'characteristics',
                ],
            ]) ?>

            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-button', [
                'type' => 'button',
                'style' => 'color-main',
                'title' => __('Details'),
                'attributes' => [
                    'data-toggle' => 'details',
                ],
            ]) ?>
        </div>

        <div class='w-full flex flex-wrap my-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                'name' => 'collection',
                'label' => __('Image gallery'),
                'images' => isset($property) ? $images : null,
                'type' => 'checkbox',
            ]) ?>
        </div>

        <div class='flex justify-end mt-10 px-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-button', [
                'type' => 'submit',
                'style' => 'color-main',
                'title' => __('Save'),
            ]) ?>
        </div>

        <?php loadHtml(__DIR__ . '/partials/videos', [
            'videos' => isset($property) ? json_decode($property->videos, true) : [],
        ]) ?>
        <?php loadHtml(__DIR__ . '/partials/characteristics', [
            'characteristics' => isset($property) ? json_decode($property->characteristics, true) : [],
        ]) ?>
        <?php loadHtml(__DIR__ . '/partials/details', [
            'details' => isset($property) ? json_decode($property->details, true) : [],
        ]) ?>
    </form>
</section>
