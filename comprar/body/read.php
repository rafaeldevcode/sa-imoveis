<section class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="font-bold text-center text-4xl text-color-main font-main uppercase">Comprar</h1>

        <div class="flex flex-wrap w-full" data-slick="cards">
            <?php foreach ($properties->data as $property) {
                loadHtml(__DIR__ . '/../../resources/client/partials/card-properties', [
                    'id' => $property->id,
                    'code' => $property->code,
                    'andress' => $property->andress,
                    'name' => $property->name,
                    'value' => $property->value,
                    'status' => $property->status,
                    'details' => json_decode($property->details, true),
                ]);
            } ?>

            <?php if (count($properties->data) == 0) { ?>
                <div class="p-2 w-full h-[300px] flex justify-center items-center">
                    <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="<?php _e('No data found') ?>">
                </div>
            <?php } ?>
        </div>

        <div class="p-4">
            <?php if (isset($properties->page)) {
                loadHtml(__DIR__ . '/../../resources/admin/partials/pagination', [
                    'page' => $properties->page,
                    'count' => $properties->count,
                    'next' => $properties->next,
                    'prev' => $properties->prev,
                    'search' => $properties->search,
                ]);
            } ?>
        </div>
    </div>
</section>
