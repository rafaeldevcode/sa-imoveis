<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route($action) ?>">
        <?php if (isset($category)) { ?>
            <input type="hidden" name="id" value="<?php echo $category->id ?>">
        <?php } ?>

        <div class='flex justify-between flex-wrap'>
            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-alphabet',
                    'name' => 'name',
                    'label' => __('Name'),
                    'type' => 'text',
                    'value' => isset($category) ? $category->name : null,
                    'attributes' => 'required',
                ]) ?>
            </div>

            <div class='w-full md:w-6/12 px-4'>
                <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                    'icon' => 'bi bi-link-45deg',
                    'name' => 'slug',
                    'label' => __('Slug'),
                    'type' => 'text',
                    'value' => isset($category) ? $category->slug : null,
                    'attributes' => 'required',
                ]) ?>
            </div>
        </div>

        <div class='flex justify-end px-4'>
            <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-button', [
                'type' => 'submit',
                'style' => 'color-main',
                'title' => __('Save'),
            ]) ?>
        </div>
    </form>
</section>
