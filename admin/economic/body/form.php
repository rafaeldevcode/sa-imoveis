<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route($action) ?>">
        <?php if (isset($economic)) { ?>
            <input type="hidden" name="id" value="<?php echo $economic->id ?>">
        <?php } ?>

        <div class='flex flex-wrap'>
            <div class='w-full md:w-4/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                    'icon' => 'bi bi-check2-square',
                    'name' => 'type',
                    'label' => __('Type'),
                    'attributes' => ['required' => true],
                    'value' => isset($economic) ? $economic->type : null,
                    'options' => [
                        'IGPM' => 'IGPM',
                        'INCC' => 'INCC',
                        'IPCA' => 'IPCA'
                    ],
                ]) ?>
            </div>

            <div class='w-full md:w-4/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                    'icon' => 'bi bi-check2-square',
                    'name' => 'month',
                    'label' => __('Month'),
                    'attributes' => ['required' => true],
                    'value' => isset($economic) ? $economic->month : null,
                    'options' => getMonths(),
                ]) ?>
            </div>

            <div class='w-full md:w-4/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-calendar-fill',
                    'name' => 'year',
                    'label' => __('Year'),
                    'type' => 'number',
                    'value' => isset($economic) ? $economic->year : null,
                    'attributes' => 'required',
                ]) ?>
            </div>

            <div class='w-full md:w-4/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-percent',
                    'name' => 'percentage_month',
                    'label' => __('Percentage month'),
                    'type' => 'text',
                    'value' => isset($economic) ? $economic->percentage_month : null,
                    'attributes' => 'required',
                ]) ?>
            </div>

            <div class='w-full md:w-4/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-percent',
                    'name' => 'percentage_year',
                    'label' => __('Percentage year'),
                    'type' => 'text',
                    'value' => isset($economic) ? $economic->percentage_year : null,
                    'attributes' => 'required',
                ]) ?>
            </div>
        </div>

        <div class='flex justify-end px-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-button', [
                'type' => 'submit',
                'style' => 'color-main',
                'title' => __('Save'),
            ]) ?>
        </div>
    </form>
</section>
