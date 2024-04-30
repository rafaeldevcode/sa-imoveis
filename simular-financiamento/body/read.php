<section class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="font-bold text-center text-4xl text-color-main font-main uppercase">Simular Financiamento</h1>

        <?php if (isset($announce)) { ?>
            <h2 class="my-8 text-3xl font-bold"><?php echo $announce->title ?></h2>

            <article class="article flex flex-wrap">
                <div class="w-full md:w-6/12">
                    <?php loadHtml(__DIR__ . '/../../resources/partials/image', [
                        'id' => $announce->thumbnail,
                        'class' => 'w-full md:w-8/12',
                        'alt' => $announce->title,
                    ]) ?>
                </div>

                <div class="w-full md:w-6/12">
                    <?php echo $announce->content ?>

                    <div class='flex justify-center item-center px-4 mt-6'>
                        <a href="<?php echo $announce->button_link ?>" title="<?php echo $announce->button_text ?>" class='ease-in duration-300 bg-color-main rounded-lg gap-2 border border-color-main hover:bg-white hover:!text-color-main py-2 px-4 font-bold text-lg !text-white'>
                            <?php echo $announce->button_text ?>
                        </a>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>
