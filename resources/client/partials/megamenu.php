<div data-mm-target="<?php echo $type ?>" class="container absolute left-0 top-[75px] z-[2] pt-[37px]">
    <div class="w-full shadow-lg bg-white rounded-b-lg p-10 text-center flex flex-wrap">
        <div class="w-full md:w-6/12 lg:w-3/12 border-r-none md:border-r border-color-main">
            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="1" title="Mais opções">
                Apartamentos
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="hidden lg:block" data-open-target="1" data-target-open="false">
                <?php 
                    $hidden = $type === 'Alugar' ? 'hidden' : null;
                    $bedroomsOne = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '01 Dormitório', 'category_id' => 1]);
                    $bedroomsTwo = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '02 Dormitórios', 'category_id' => 1]);
                    $bedroomsThree = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '03 Dormitórios', 'category_id' => 1]);
                    $bedroomsFour = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '04 Dormitórios ou +', 'category_id' => 1]);
                ?>
                <?php if ($type === 'Vender') { ?>
                    <a class="uppercase text-secondary text-xs" title="Ver Todos" href="<?php route("/imoveis/categoria/apartamento?type={$type}") ?>">Ver Todos</a> 
                <?php } ?>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="01 Dormitório">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsOne == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 01 Dorm. (<?php echo $bedroomsOne ?>)</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="02 Dormitórios">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsTwo == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 02 Dorm. (<?php echo $bedroomsTwo ?>)</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="03 Dormitórios">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsThree == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 03 Dorm. (<?php echo $bedroomsThree ?>)</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="04 Dormitórios ou +">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsFour == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 04 Dorm. ou + (<?php echo $bedroomsFour ?>)</button>
                </form>
            </div>
        </div>

        <div class="mt-4 md:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none md:border-l border-r-none lg:border-r border-color-main">
            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="2" title="Mais opções">
                Casas
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="hidden lg:block" data-open-target="2" data-target-open="false">
                <?php 
                    $bedroomsOne = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '01 Dormitório', 'category_id' => 2]);
                    $bedroomsTwo = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '02 Dormitórios', 'category_id' => 2]);
                    $bedroomsThree = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '03 Dormitórios', 'category_id' => 2]);
                    $bedroomsFour = enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '04 Dormitórios ou +', 'category_id' => 2]);
                ?>

                <?php if ($type === 'Vender') { ?>
                    <a class="uppercase text-secondary text-xs" title="Ver Todos" href="<?php route("/imoveis/categoria/casa?type={$type}") ?>">Ver Todos</a> 
                <?php } ?>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="01 Dormitório">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsOne == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 01 Dorm. (<?php echo $bedroomsOne ?>)</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="02 Dormitórios">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsTwo == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 02 Dorm. (<?php echo $bedroomsTwo ?>)</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="03 Dormitórios">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsThree == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 03 Dorm. (<?php echo $bedroomsThree ?>)</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="04 Dormitórios ou +">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php echo $bedroomsFour == 0 ? "disabled {$hidden}" : '' ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 04 Dorm. ou + (<?php echo $bedroomsFour ?>)</button>
                </form>
            </div>
        </div>

        <div class="mt-4 lg:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none lg:border-l border-r-none md:border-r border-color-main">
            <?php 
                $hidden = $data['type'] === 'Alugar' ? 'class="hidden"' : null;
                $salaComercial = enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'sala-comercial']);
                $salaComercialHref = getRoute("/imoveis/categoria/sala-comercial?type={$type}");

                $pavilhao = enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'pavilhao']);
                $pavilhaoHref = getRoute("/imoveis/categoria/pavilhao?type={$type}");
            ?>

            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="3" title="Mais opções">
                Comercial
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="hidden lg:block" data-open-target="3" data-target-open="false">
                <a <?php $salaComercial > 0 ? "href=\"{$salaComercialHref}\"" : "disabled href='javascript:void(0)' {$hidden}" ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Sala Comercial">Sala Comercial (<?php echo $salaComercial ?>)</a>

                <a <?php $pavilhao > 0 ? "href=\"{$pavilhaoHref}\"" : "disabled href='javascript:void(0)' {$hidden}" ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Pavilhão">Pavilhão (<?php echo $pavilhao ?>)</a>
            </div>
        </div>

        <div class="mt-4 lg:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none md:border-l border-color-main">
            <?php 
                $terrenoComercial = enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'terreno-comercial']);
                $terrenoComercialHref = getRoute("/imoveis/categoria/terreno-comercial?type={$type}");

                $terrenoResidencial = enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'terreno-residencial']);
                $terrenoResidencialHref = getRoute("/imoveis/categoria/terreno-residencial?type={$type}");

                $sitio = enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'sitio']);
                $sitioHref = getRoute("/imoveis/categoria/sitio?type={$type}");

                $areaRural = enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'area-rural']);
                $areaRuralHref = getRoute("/imoveis/categoria/area-rural?type={$type}");
            ?>

            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="4" title="Mais opções">
                Terrenos
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="hidden lg:block" data-open-target="4" data-target-open="false">
                <a <?php $terrenoComercial > 0 ? "href=\"{$terrenoComercialHref}\"" : "disabled href='javascript:void(0)' {$hidden}" ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Terreno Comercial">Terreno Comercial (<?php echo $terrenoComercial ?>)</a>

                <a <?php $terrenoResidencial > 0 ? "href=\"{$terrenoResidencialHref}\"" : "disabled href='javascript:void(0)' {$hidden}" ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Terreno Residencial">Terreno Residencial (<?php echo $terrenoResidencial ?>)</a>

                <a <?php $sitio > 0 ? "href=\"{$sitioHref}\"" : "disabled href='javascript:void(0)' {$hidden}" ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Sítios">Sítios (<?php echo $sitio ?>)</a>

                <a <?php $areaRural > 0 ? "href=\"{$areaRuralHref}\"" : "disabled href='javascript:void(0)' {$hidden}" ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Área Rural">Área Rural (<?php echo $areaRural ?>)</a>
            </div>
        </div>
    </div>
</div>
