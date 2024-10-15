<div class="px-4 w-full md:w-6/12 lg:w-4/12 my-12">
    <div class="rounded-xl bg-white h-[530px]">
        <div class="h-[55%] relative">
            <?php if ($status === 'reserved') { ?>
                <div class="-rotate-45 translate-x-[-37px] translate-y-[37px] absolute top-0 left-0 z-[2] px-10 py-1 opacity-70 bg-color-main h-auto w-auto text-white uppercase text-center font-bold">
                    <div class="absolute top-0 left-0 w-[0px] border-b-[32px] border-l-[32px] border-b-transparent border-l-[#F4F4F4]"></div>
                    Reservado
                    <div class="absolute top-0 right-0 w-[0px] border-t-[30px] border-l-[30px] border-t-[#F4F4F4] border-l-transparent"></div>
                </div>    
            <?php } ?>

            <div class="h-[246px] rounded-t-xl" data-slick="images">
                <?php foreach (getImages($id) as $image) { ?>
                    <a href="<?php route("/imoveis/{$id}") ?>" title="<?php echo $name ?>">
                        <img class="rounded-t-xl h-full w-full object-cover" src="<?php asset("assets/images/{$image->file}") ?>" alt="<?php echo $name ?>">
                    </a>
                <?php } ?>
            </div>

            <div class="w-full p-2 bg-color-main flex justify-between items-center">
                <p class="text-white font-bold text-xl">R$ <?php echo isset($value) ? number_format($value, 2, ',', '.') : 'Venha nos consultar' ?></p>

                <button data-favorite="<?php echo $id ?>" data-favorite-status="<?php echo in_array($id, favorites()) ? 'true' : 'false' ?>">
                    <i class="bi <?php echo in_array($id, favorites()) ? 'bi-heart-fill' : 'bi-heart' ?> text-white text-xl"></i>
                </button>
            </div>
        </div>

        <div class="h-[45%] p-4 flex flex-col justify-between">
            <div class="flex flex-col justify-between">
                <span class="text-sm font-semibold">Cód. <?php echo $code ?></span>
                <a href="<?php route("/imoveis/{$id}") ?>" class="text-color-main font-bold text-lg"><?php echo $name ?></a>
                <p class="text-md folt-bold text-gray-600"><?php echo $andress ?></p>
            </div>

            <div class="flex px-6 py-2 justify-between">
                <?php if (isset($details['bedrooms']) && !empty($details['bedrooms'][0])) { ?>
                    <div class="text-color-main text-center">
                        <img class="h-[20px] mx-auto" src="<?php asset('assets/images/icons/dormitorios.png') ?>" alt="Dormitórios">
                        <p><?php echo !empty($details['bedrooms'][0]) ? $details['bedrooms'][0] : '' ?></p>
                        <p><?php echo !empty($details['bedrooms'][1]) ? $details['bedrooms'][1] : '' ?></p>
                        <p><?php echo !empty($details['bedrooms'][2]) ? $details['bedrooms'][2] : '' ?></p>
                    </div>
                <?php } ?>

                <?php if (isset($details['garage']) && !empty($details['garage'])) { ?>
                    <div class="text-color-main text-center">
                        <img class="h-[20px] mx-auto" src="<?php asset('assets/images/icons/garagem.png') ?>" alt="Garagem">
                        <p><?php echo $details['garage'] ?></p>
                    </div>
                <?php } ?>

                <?php if (isset($details['private_area']) && !empty($details['private_area'])) { ?>
                    <li class="text-color-main flex flex-col items-center">
                        <img class="h-[25px]" src="<?php asset('assets/images/icons/area-privativa.png') ?>" alt="Área Privativa">
                        <span><?php echo $details['private_area'] ?>m²</span>
                        <span>Área Privativa</span>
                    </li>
                <?php } ?>
            </div>

            <?php if ($progress !== 'Outros') { ?>
                <div class="flex flex-col justify-between">
                    <p class="text-color-main font-bold text-lg">Imóvel: <?php echo $progress ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
