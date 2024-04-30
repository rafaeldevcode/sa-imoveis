<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form method="POST" action="<?php route('/admin/announce/update') ?>" enctype="multipart/form-data">
        <div class='flex justify-between flex-col-reverse lg:flex-row'>
            <div class="w-full lg:w-9/12 mt-4">
                <textarea id="tinymce" name="content"><?php echo isset($announce) ? $announce->content : null ?></textarea>
            </div>

            <div class="w-full lg:w-3/12 px-4">
                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-alphabet',
                        'name' => 'title',
                        'label' => __('Title'),
                        'type' => 'text',
                        'attributes' => 'required',
                        'value' => isset($announce) ? $announce->title : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-alphabet',
                        'name' => 'button_text',
                        'label' => __('Button Text'),
                        'type' => 'text',
                        'attributes' => 'required',
                        'value' => isset($announce) ? $announce->button_text : null,
                    ]) ?>
                </div>

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-link-45deg',
                        'name' => 'button_link',
                        'label' => __('Button Link'),
                        'type' => 'text',
                        'attributes' => 'required',
                        'value' => isset($announce) ? $announce->button_link : null,
                    ]) ?>
                </div>

                <div class='w-full flex flex-wrap mt-6'>
                    <?php loadHtml(__DIR__ . '/../../../resources/partials/form/button-upload', [
                        'name' => 'thumbnail',
                        'label' => __('Featured image'),
                        'value' => (isset($announce) && !empty($announce->thumbnail)) ? $announce->thumbnail : null,
                        'type' => 'radio',
                        'attributes' => 'required',
                    ]) ?>
                </div>
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
