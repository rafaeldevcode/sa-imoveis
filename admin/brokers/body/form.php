<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route($action) ?>">
        <?php if (isset($broker)) { ?>
            <input type="hidden" name="id" value="<?php echo $broker->id ?>">
        <?php } ?>

        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-person-fill',
                    'name' => 'name',
                    'label' => __('Name'),
                    'type' => 'text',
                    'value' => isset($broker) ? $broker->name : null,
                    'attributes' => 'required',
                ]) ?>
            </div>
        </div>

        <div class='w-full md:w-6/12 px-4'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-checkbox-switch', [
                'name' => 'show_in_home',
                'label' => __('Display on home page (No | Yes)'),
                'value' => isset($broker) ? $broker->show_in_home : null,
            ]) ?>
        </div>

        <div class='w-full flex flex-wrap mt-6'>
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                'name' => 'thumbnail',
                'label' => __('Featured image'),
                'value' => (isset($broker) && !empty($broker->thumbnail)) ? $broker->thumbnail : null,
                'type' => 'radio',
                'attributes' => 'required',
            ]) ?>
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
