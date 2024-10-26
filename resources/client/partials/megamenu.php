<div data-mm-target="<?php echo $type ?>" class="container absolute left-0 top-[75px] z-[2] pt-[37px]">
    <div class="w-full shadow-lg bg-white rounded-b-lg p-10 text-center flex flex-wrap">
        <div class="w-full md:w-6/12 lg:w-3/12 border-r-none md:border-r border-color-main">
            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="1" title="Mais opções">
                Apartamentos
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="hidden lg:block" data-open-target="1" data-target-open="false">
                <a class="uppercase text-secondary text-xs" title="Ver Todos" href="<?php route("/imoveis/categoria/apartamento?type={$type}") ?>">Ver Todos</a>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="01 Dormitório">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '01 Dormitório', 'category_id' => 1]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 01 Dorm.</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="02 Dormitórios">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '02 Dormitórios', 'category_id' => 1]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 02 Dorm.</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="03 Dormitórios">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '03 Dormitórios', 'category_id' => 1]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 03 Dorm.</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="04 Dormitórios ou +">
                    <input type="hidden" name="category_id" value="1">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '04 Dormitórios ou +', 'category_id' => 1]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 04 Dorm. ou +</button>
                </form>
            </div>
        </div>

        <div class="mt-4 md:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none md:border-l border-r-none lg:border-r border-color-main">
            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="2" title="Mais opções">
                Casas
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="hidden lg:block" data-open-target="2" data-target-open="false">
                <a class="uppercase text-secondary text-xs" title="Ver Todos" href="<?php route("/imoveis/categoria/casa?type={$type}") ?>">Ver Todos</a>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="01 Dormitório">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '01 Dormitório', 'category_id' => 2]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 01 Dorm.</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="02 Dormitórios">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '02 Dormitórios', 'category_id' => 2]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 02 Dorm.</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="03 Dormitórios">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '03 Dormitórios', 'category_id' => 2]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 03 Dorm.</button>
                </form>

                <form action="<?php route('/pesquisar') ?>">
                    <input type="hidden" name="bedrooms" value="04 Dormitórios ou +">
                    <input type="hidden" name="category_id" value="2">
                    <input type="hidden" name="type" value="<?php echo $type ?>">
                    <button <?php enableOrDisableLink('2', ['type' => $type, 'bedrooms' => '04 Dormitórios ou +', 'category_id' => 2]) ?> class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 04 Dorm. ou +</button>
                </form>
            </div>
        </div>

        <div class="mt-4 lg:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none lg:border-l border-r-none md:border-r border-color-main">
            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="3" title="Mais opções">
                Comercial
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="mt-5 hidden lg:block" data-open-target="3" data-target-open="false">
                <a <?php enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'sala-comercial', 'href' => getRoute("/imoveis/categoria/sala-comercial?type={$type}")]) ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Sala Comercial">Sala Comercial</a>

                <a <?php enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'pavilhao', 'href' => getRoute("/imoveis/categoria/pavilhao?type={$type}")]) ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Pavilhão">Pavilhão</a>
            </div>
        </div>

        <div class="mt-4 lg:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none md:border-l border-color-main">
            <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="4" title="Mais opções">
                Terrenos
                <i class="bi bi-chevron-right block lg:hidden"></i>
            </button>

            <div class="mt-5 hidden lg:block" data-open-target="4" data-target-open="false">
                <a <?php enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'terreno-comercial', 'href' => getRoute("/imoveis/categoria/terreno-comercial?type={$type}")]) ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Terreno Comercial">Terreno Comercial</a>

                <a <?php enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'terreno-residencial', 'href' => getRoute("/imoveis/categoria/terreno-residencial?type={$type}")]) ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Terreno Residencial">Terreno Residencial</a>

                <a <?php enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'sitio', 'href' => getRoute("/imoveis/categoria/sitio?type={$type}")]) ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Sítios">Sítios</a>

                <a <?php enableOrDisableLink('1', ['type' => $type, 'category_slug' => 'area-rural', 'href' => getRoute("/imoveis/categoria/area-rural?type={$type}")]) ?> class="py-2 hover:text-secondary ease-in duration-300 block" title="Área Rural">Área Rural</a>
            </div>
        </div>
    </div>
</div>
