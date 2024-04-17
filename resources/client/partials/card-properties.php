<div class="px-4 w-full md:w-6/12 lg:w-4/12 my-12">
    <div class="rounded-xl bg-white h-[500px]">
        <div class="h-[60%]">
            <div class="h-[256px] rounded-t-xl" data-slick="images">
                <?php foreach (getImages($id) as $image) { ?>
                    <a href="<?php route("/imoveis/{$id}") ?>" title="<?php echo $name ?>">
                        <img class="rounded-t-xl h-full w-full object-cover" src="<?php asset("assets/images/{$image->file}") ?>" alt="<?php echo $name ?>">
                    </a>
                <?php } ?>
            </div>

            <div class="w-full p-2 bg-color-main flex justify-between items-center">
                <p class="text-white font-bold text-xl"><?php echo $value ?></p>
                
                <button>
                    <i class="bi bi-heart text-white text-xl"></i>
                </button>
            </div>
        </div>

        <div class="h-[40%] p-4">
            <div class="flex flex-col justify-between">
                <span class="text-sm font-semibold">Cód. <?php echo $code ?></span>
                <a href="<?php route("/imoveis/{$id}") ?>" class="text-color-main font-bold text-lg"><?php echo $name ?></a>
                <p class="text-md folt-bold text-gray-600"><?php echo $andress ?></p>
            </div>

            <div class="flex px-6 py-2 justify-between">
                <?php if (isset($details['bedrooms']) && ! empty($details['bedrooms'][0])) { ?>
                    <div class="text-color-main text-center">
                        <img class="h-[20px] mx-auto" src="<?php asset('assets/images/icons/dormitorios.png') ?>" alt="Dormitórios">
                        <p><?php echo ! empty($details['bedrooms'][0]) ? $details['bedrooms'][0] : '' ?></p>
                        <p><?php echo ! empty($details['bedrooms'][1]) ? $details['bedrooms'][1] : '' ?></p>
                        <p><?php echo ! empty($details['bedrooms'][2]) ? $details['bedrooms'][2] : '' ?></p>
                    </div>
                <?php } ?>

                <?php if (isset($details['garage']) && ! empty($details['garage'])) { ?>
                    <div class="text-color-main text-center">
                        <img class="h-[20px] mx-auto" src="<?php asset('assets/images/icons/garagem.png') ?>" alt="Garagem">
                        <p><?php echo $details['garage'] ?></p>
                    </div>
                <?php } ?>

                <?php if (isset($details['total_area']) && ! empty($details['total_area'])) { ?>
                    <div class="text-color-main text-center">
                        <img class="h-[20px] mx-auto" src="<?php asset('assets/images/icons/area.png') ?>" alt="Área Total">
                        <p><?php echo $details['total_area'] ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
