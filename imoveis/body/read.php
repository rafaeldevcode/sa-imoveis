<section class="py-12 bg-[#F4F4F4]">
    <section class="py-12 container flex justify-between items-end w-full">
        <div class="flex flex-col">
            <h1 class="text-color-main font-bold text-2xl"><?php echo $property->name ?></h1>
            <p class="text-xl folt-bold text-gray-600"><?php echo $property->andress ?></p>
            <p class="text-lg folt-black">Inicio > Imóveis > <?php echo $category->name ?></p>
        </div>

        <span class="text-sm font-semibold">Cód. <?php echo $property->code ?></span>
    </section>

    <section class="py-12 container flex w-full flex-wrap">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <?php foreach (getImages($property->id) as $indice => $image) {
                if ($indice < 4) { ?>
                    <div data-gallery-image="<?php asset("assets/images/{$image->file}") ?>" class="rounded-lg cursor-pointer <?php echo $indice === 0 ? ' col-span-1 md:col-span-2 row-span-1 md:row-span-2' : '' ?>">
                        <img src="<?php asset("assets/images/{$image->file}") ?>" class="rounded-lg h-full object-cover" alt="<?php echo $property->name ?>">
                    </div>
                <?php } elseif ($indice === 4) { ?>
                    <div class="rounded-lg cursor-pointer relative flex items-center justify-center">
                        <div class="rounded-lg z-[1] absolute top-0 lef-0 w-full h-full bg-color-main opacity-60"></div>

                        <button data-gallery-image="<?php asset("assets/images/{$image->file}") ?>" class='z-[2] absolute text-white font-bold w-full h-full' type="button" title="FOTOS">
                            VER MAIS
                        </button>

                        <img src="<?php asset("assets/images/{$image->file}") ?>" class="rounded-lg w-full h-full object-cover" alt="<?php echo $property->name ?>">
                    </div>
                <?php } else { ?>
                    <div data-gallery-image="<?php asset("assets/images/{$image->file}") ?>" class="hidden"></div>
                <?php }
                } ?>
        </div>
    </section>

    <section class="py-12 container flex w-full flex-wrap">
        <div class="w-full lg:w-8/12 pr-3">
            <div class="border-b-2 pb-10">
                <div class="flex gap-2">
                    <button class='ease-in duration-300 flex items-center justify-center bg-color-main rounded-lg gap-2 border border-color-main hover:bg-color-main hover:text-white py-2 w-[150px] font-bold text-lg text-white' type="button" title="FOTOS">
                        FOTOS
                        <i class="bi bi-camera-fill"></i>
                    </button>
                    <?php if (is_array($videos) && !empty($videos)) { ?>
                        <button data-videos="<?php echo implode(',', json_decode($property->videos, true)) ?>" id="gallery-videos" class='ease-in duration-300 flex items-center justify-center bg-white rounded-lg gap-2 border border-color-main hover:bg-color-main hover:text-white py-2 w-[150px] font-bold text-lg text-color-main' type="button" title="VIDEOS">
                            VIDEOS
                            <i class="bi bi-play-circle-fill"></i>
                        </button>
                    <?php } ?>
                </div>

                <?php if (is_array($details)) { ?>
                    <div class="pt-10">
                        <ul class="flex flex-wrap gap-10">
                            <?php if (isset($details['bedrooms']) && !empty($details['bedrooms'][0])) { ?>
                                <li class="text-color-main flex flex-col items-center">
                                    <img class="h-[25px]" src="<?php asset('assets/images/icons/dormitorios.png') ?>" alt="Dormitórios">
                                    <span><?php echo isset($details['bedrooms'][0]) ? $details['bedrooms'][0] : '' ?></span>
                                    <span><?php echo isset($details['bedrooms'][1]) ? $details['bedrooms'][1] : '' ?></span>
                                    <span><?php echo isset($details['bedrooms'][2]) ? $details['bedrooms'][2] : '' ?></span>
                                </li>
                            <?php } ?>

                            <?php if (isset($details['garage']) && !empty($details['garage'])) { ?>
                                <li class="text-color-main flex flex-col items-center">
                                    <img class="h-[25px]" src="<?php asset('assets/images/icons/garagem.png') ?>" alt="Garagem">
                                    <span><?php echo $details['garage'] ?></span>
                                </li>
                            <?php } ?>

                            <?php if (isset($details['total_area']) && !empty($details['total_area'])) { ?>
                                <li class="text-color-main flex flex-col items-center">
                                    <img class="h-[25px]" src="<?php asset('assets/images/icons/area.png') ?>" alt="Área Total">
                                    <span><?php echo $details['total_area'] ?> m²</span>
                                    <span>Área Total</span>
                                </li>
                            <?php } ?>

                            <?php if (isset($details['private_area']) && !empty($details['private_area'])) { ?>
                                <li class="text-color-main flex flex-col items-center">
                                    <img class="h-[25px]" src="<?php asset('assets/images/icons/area-privativa.png') ?>" alt="Área Privativa">
                                    <span><?php echo $details['private_area'] ?> m²</span>
                                    <span>Área Privativa</span>
                                </li>
                            <?php } ?>

                            <?php if (isset($details['bedrooms']) && !empty($details['bathrooms'][0])) { ?>
                                <li class="text-color-main flex flex-col items-center">
                                    <img class="h-[25px]" src="<?php asset('assets/images/icons/banheiros.png') ?>" alt="Banheiros">
                                    <span><?php echo isset($details['bathrooms'][0]) ? $details['bathrooms'][0] : '' ?></span>
                                    <span><?php echo isset($details['bathrooms'][1]) ? $details['bathrooms'][1] : '' ?></span>
                                    <span><?php echo isset($details['bathrooms'][2]) ? $details['bathrooms'][2] : '' ?></span>
                                </li>
                            <?php } ?>

                            <?php if (isset($details['furnished']) && $details['furnished'] === 'on') { ?>
                                <li class="text-color-main flex flex-col items-center">
                                    <img class="h-[25px]" src="<?php asset('assets/images/icons/mobiliado.png') ?>" alt="Mobiliado">
                                    <span>Mobiliado</span>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>

            <?php if (!empty($characteristics)) { ?>
                <div class="border-b-2 py-10">
                    <h2 class="text-color-main font-bold text-2xl">Características do Imóvel</h2>

                    <ul class="mt-6 columns-1 md:columns-2">
                        <?php foreach ($characteristics as $characteristic) { ?>
                            <li class="text-xl">
                                <i class="bi bi-check2-square text-color-main text-2xl"></i>
                                <span><?php echo $characteristic ?></span>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <?php if (!empty($property->description)) {?>
                <div class="py-10">
                    <h2 class="text-color-main font-bold text-2xl">Descrição do Imóvel</h2>

                    <p><?php echo $property->description ?></p>
                </div>
            <?php } ?>
        </div>

        <div class="w-full lg:w-4/12 pl-0 lg:pl-3">
            <div class="p-4 rounded-lg shadow-lg bg-white">
                <div>
                    <div class="flex justify-between">
                        <span class="text-lg">Valor do Imóvel</span>
                        <span class="text-color-main font-bold text-2xl">R$ <?php echo isset($property->value) ? number_format($property->value, 2, ',', '.') : 'Venha nos consultar' ?></span>
                    </div>

                    <?php if (isset($property->condominium)) { ?>
                        <div class="flex justify-between">
                            <span class="text-lg">Condomínio*</span>
                            <span class="text-lg">R$ <?php echo number_format($property->condominium, 2, ',', '.') ?>/mês</span>
                        </div>
                    <?php } ?>

                    <?php if (isset($property->iptu)) { ?>
                        <div class="flex justify-between">
                            <span class="text-lg">IPTU*</span>
                            <span class="text-lg">R$ <?php echo number_format($property->iptu, 2, ',', '.') ?>/ano</span>
                        </div>
                    <?php } ?>

                    <?php if (isset($property->condominium) || isset($property->iptu)) { ?>
                        <p class="text-lg mt-4">*Valores aproximados</p>
                    <?php } ?>
                </div>

                <div class="w-full flex flex-col gap-4 mt-4">
                    <?php if (!empty(SETTINGS->whatsapp)) { ?>
                        <a href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->whatsapp) ?>?text=<?php echo SETTINGS->whatsapp_message ?>" title="Falar com um Corretor" class='ease-in duration-300 flex items-center justify-center bg-color-main rounded-lg gap-2 border border-color-main hover:bg-color-main hover:text-white py-4 w-full font-bold text-lg text-white'>
                            <i class="bi bi-whatsapp"></i>
                            Falar com um Corretor
                        </a>
                    <?php } ?>

                    <button title="Adicionar aos Favoritos" data-favorite="<?php echo $property->id ?>" data-favorite-status="<?php echo in_array($property->id, favorites()) ? 'true' : 'false' ?>" class='ease-in duration-300 flex items-center justify-center bg-white rounded-lg gap-2 border border-color-main hover:bg-color-main hover:text-white py-4 w-full font-bold text-lg text-color-main'>
                        <i class="bi <?php echo in_array($property->id, favorites()) ? 'bi-heart-fill' : 'bi-heart' ?>"></i>
                        Adicionar aos Favoritos
                    </button>

                    <a href="<?php route('/simular-financiamento') ?>" title="Simular um Financiamento" class='ease-in duration-300 flex items-center justify-center bg-white rounded-lg gap-2 border border-color-main hover:bg-color-main hover:text-white py-4 w-full font-bold text-lg text-color-main'>
                        <i class="bi bi-calculator"></i>
                        Simular um Financiamento
                    </a>
                </div>
            </div>
        </div>
    </section>

    <?php if (!empty($property->location)) {?>
        <section class="py-12 container">
            <div class="w-full h-[450px] relative">
                <div class="w-full h-full rounded-lg flex items-center justify-center">
                    <img class="absolute top-0 left-0 z-[1] rounded-lg w-full h-full object-cover" src="<?php asset('assets/images/map.png') ?>" alt="Google Maps">

                    <button data-iframe="location" class='ease-in duration-300 w-auto absolute z-[2] bg-color-main rounded-lg border border-color-main hover:bg-white hover:text-color-main py-2 px-4 font-bold text-lg text-white' type="button" title="CLIQUE PARA VER NO MAPA">
                        CLIQUE PARA VER NO MAPA
                    </button>
                </div>    

                <iframe
                    id="location"
                    data-src="<?php echo $property->location ?>" 
                    width="100%" 
                    height="100%" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="rounded-lg"
                ></iframe>  
            </div>
        </section>
    <?php } ?>

    <?php if (count($properties) > 1) { ?>
        <section class="py-12 container">
            <div>
                <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                    <div class="text-center mb-2 md:mb-0">
                        <p class="text-secondary text-md">VEJA OUTROS IMÓVEIS</p>
                        <h2 class="text-color-main font-bold text-2xl">QUE ENCONTRAMOS PARA VOCÊ</h2>    
                    </div>
                </div>

                <div class="flex flex-wrap w-full" data-slick="cards">
                    <?php foreach ($properties as $item) {
                        if ($property->id !== $item->id) {
                            loadHtml(__DIR__ . '/../../resources/client/partials/card-properties', [
                                'id' => $item->id,
                                'code' => $item->code,
                                'andress' => $item->andress,
                                'name' => $item->name,
                                'value' => $item->value,
                                'status' => $property->status,
                                'details' => json_decode($item->details, true),
                            ]);
                        }
                    } ?>
                </div>
            </div>
        </section>
    <?php } ?>

    <?php loadHtml(__DIR__ . '/partials/videos') ?>
    <?php loadHtml(__DIR__ . '/partials/images') ?>
</section>
