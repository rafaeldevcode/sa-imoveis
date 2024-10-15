<section class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <div>
            <h1 class="font-bold text-center text-4xl text-color-main font-main uppercase">MEUS FAVORITOS</h1>

            <?php if ($showButtonShare && count($properties) >= 2) { ?>
                <button id="share-favorites" class='mx-auto mt-4 ease-in duration-300 flex items-center justify-center bg-white rounded-lg gap-2 border border-color-main hover:bg-color-main hover:text-white py-2 w-[150px] font-bold text-lg text-color-main' type="button" title="Compartilhar">
                    Compartilhar
                    <i class="bi bi-share-fill"></i>
                </button>
            <?php } ?>
        </div>

        <div class="flex flex-wrap w-full" data-slick="cards">
            <?php foreach ($properties as $property) {
                if ($property->status === 'available' || $property->status === 'reserved') {
                    loadHtml(__DIR__ . '/../../resources/client/partials/card-properties', [
                        'id' => $property->id,
                        'code' => $property->code,
                        'andress' => $property->andress,
                        'name' => $property->name,
                        'value' => $property->value,
                        'status' => $property->status,
                        'progress' => $property->progress,
                        'details' => json_decode($property->details, true),
                    ]);
                }
            } ?>

            <?php if (count($properties) == 0) { 
                loadHtml(__DIR__ . '/../../resources/client/partials/not-properties');
            } ?>
        </div>
    </div>

    <?php loadHtml(__DIR__ . '/partials/share-favorites') ?>
</section>
