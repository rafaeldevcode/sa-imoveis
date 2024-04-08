<main class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="font-bold text-center text-4xl text-color-main font-main uppercase">MEUS FAVORITOS</h1>

        <div class="flex flex-wrap w-full" data-slick="cards">
            <?php for ($i=0; $i < 12; $i++) { 
                loadHtml(__DIR__ . '/../../resources/client/partials/card-properties');
            } ?>
        </div>
    </div>
</main>
