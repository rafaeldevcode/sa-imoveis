<section class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="uppercase font-bold text-center text-4xl text-color-main font-main">
            Resultados encontrados para <?php echo isset($search) ? "'{$search}'" : 'os filtros aplicados' ?>
        </h1>

        <form action="<?php route('/pesquisar') ?>" method="POST" class="mt-4 shadow-lg bg-[#FFFFFF85] p-4 w-full flex flex-wrap items-center">                
            <div class="w-full lg:w-2/12 md:w-4/12">
                    <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="type" class="border border-color-main py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Interesse</option>
                        <option <?php echo $requests->type == 'Vender' ? 'selected' : ''  ?> value="Vender">Comprar</option>
                        <option <?php echo $requests->type == 'Alugar' ? 'selected' : ''  ?> value="Alugar">Alugar</option>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="category_id" class="border border-color-main py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Tipo do imóvel</option>

                        <?php foreach ($categories as $indice => $category) { ?>
                            <option <?php echo $requests->category_id == $indice ? 'selected' : ''  ?> value="<?php echo $indice ?>"><?php echo $category ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="bedrooms" class="border border-color-main py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Dormitórios</option>
                        <option <?php echo $requests->bedrooms == '01 Dormitório' ? 'selected' : ''  ?> value="01 Dormitório">01 Dormitório</option>
                        <option <?php echo $requests->bedrooms == '02 Dormitórios' ? 'selected' : ''  ?> value="02 Dormitórios">02 Dormitórios</option>
                        <option <?php echo $requests->bedrooms == '03 Dormitórios' ? 'selected' : ''  ?> value="03 Dormitórios">03 Dormitórios</option>
                        <option <?php echo $requests->bedrooms == '04 Dormitórios ou +' ? 'selected' : ''  ?> value="04 Dormitórios ou +">04 Dormitórios ou +</option>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="andress" class="border border-color-main py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Cidade</option>
                        <?php foreach ($cities as $city) { ?>
                            <option <?php echo isset($requests->andress) && $requests->andress == $city ? 'selected' : ''  ?> value="<?php echo $city ?>"><?php echo $city ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <label for="value">De <b>R$ 300,00</b> à <b>R$ <span id="result-value">3.000.000</span></b></label>
                    <input type="range" id="value" value="3000000" name="value" value="<?php echo $requests->value ?>" min="300" max="3000000" class="w-full h-2 bg-color-main rounded-lg appearance-none cursor-pointer">
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <input type="submit" value="Buscar" title="Buscar" class="uppercase py-3 px-2 bg-color-main text-white font-bold border border-color-main cursor-pointer ease-in duration-300 hover:bg-white hover:text-color-main text-md rounded-lg  block w-full" />  
                </div>
            </div>
        </form>

        <div class="flex flex-wrap w-full" data-slick="cards">
            <?php foreach ($properties->data as $property) {
                loadHtml(__DIR__ . '/../../resources/client/partials/card-properties', [
                    'id' => $property->id,
                    'code' => $property->code,
                    'andress' => $property->andress,
                    'name' => $property->name,
                    'value' => $property->value,
                    'value_promotion' => $property->value_promotion,
                    'status' => $property->status,
                    'dimension' => $property->dimension,
                    'progress' => $property->progress,
                    'show_card' => $property->show_card,
                    'details' => json_decode($property->details, true),
                ]);
            } ?>

            <?php if (count($properties->data) == 0) { 
                loadHtml(__DIR__ . '/../../resources/client/partials/not-properties');
            } ?>
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
