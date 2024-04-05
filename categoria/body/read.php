<main class="py-12 px-4 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="font-bold text-center text-4xl text-color-main font-main">CATEGORIA VENDAS</h1>

        <div class="flex flex-wrap w-full" data-slick="cards">
            <?php for ($i=0; $i < 12; $i++) { 
                loadHtml(__DIR__ . '/../../resources/client/partials/card-properties');
            } ?>
        </div>

        <div class="p-4">
            <?php // if (isset($actuations->page)) {
                loadHtml(__DIR__.'/../../resources/admin/partials/pagination', [
                    'page'   => 1,
                    'count'  => 1,
                    'next'   => null,
                    'prev'   => null,
                    'search' => null
                ]);
            // } ?>
        </div>
    </div>
</main>
