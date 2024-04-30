<section class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="font-bold text-center text-4xl text-color-main font-main">QUEM SOMOS</h1>

        <article class="article mt-6">
            <h2 class="text-4xl text-color-main font-main font-bold"><?php echo SETTINGS->site_name ?></h2>

            <div class="mt-4">
                <?php echo $about  ?>
            </div>
        </article>

        <div class="w-full flex flex-wrap mt-4">
            <?php foreach ($brokers as $broker) { ?>
                <div class="w-full lg:w-3/12 md:w-4/12 sm:w-6/12 rounded-xl h-[400px] p-3">
                    <?php loadHtml(__DIR__ . '/../../resources/partials/image', [
                        'id' => $broker->thumbnail,
                        'class' => 'w-full h-full rounded-xl object-cover',
                        'alt' => $broker->name,
                    ]) ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
