<section class="w-full min-h-[500px] md:h-[650px] flex flex-col justify-end relative">
    <div data-banner="mobile" class="absolute z-[1] top-0 left-0 w-full h-full">
        <?php loadHtml(__DIR__ . '/../resources/partials/image', [
            'id' => SETTINGS->home_featured_mob,
            'class' => 'w-full h-full object-cover',
            'attributes' => [
                'autoplay' => true,
                'muted' => true,
                'loop' => true,
            ],
        ]) ?>
    </div>

    <div data-banner="desktop" class="absolute z-[1] top-0 left-0 w-full h-full">
        <?php loadHtml(__DIR__ . '/../resources/partials/image', [
            'id' => SETTINGS->home_featured_desk,
            'class' => 'w-full h-full object-cover',
            'attributes' => [
                'autoplay' => true,
                'muted' => true,
                'loop' => true,
            ],
        ]) ?>
    </div>

    <div class="z-[2] relative container px-4 py-12 flex justify-center items-end">
        <form action="<?php route('/pesquisar') ?>" class="shadow-lg bg-[#FFFFFF85] p-4 w-full flex flex-wrap items-center">                
            <div class="w-full lg:w-2/12 md:w-4/12">
                    <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="type" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Interesse</option>
                        <option value="Vender">Comprar</option>
                        <option value="Alugar">Alugar</option>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="category_id" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Tipo do imóvel</option>

                        <?php foreach ($categories as $indice => $category) { ?>
                            <option value="<?php echo $indice ?>"><?php echo $category ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="bedrooms" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Dormitórios</option>
                        <option value="01 Dormitório">01 Dormitório</option>
                        <option value="02 Dormitórios">02 Dormitórios</option>
                        <option value="03 Dormitórios">03 Dormitórios</option>
                        <option value="04 Dormitórios ou +">04 Dormitórios ou +</option>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <select name="andress" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full">
                        <option value="">Cidade</option>
                        <?php foreach ($cities as $city) { ?>
                            <option value="<?php echo $city ?>"><?php echo $city ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <label for="value">De <b>R$ 300,00</b> à <b>R$ <span id="result-value">3.000.000</span></b></label>
                    <input type="range" id="value" value="3000000" name="value" min="300" max="3000000" class="w-full h-2 bg-color-main rounded-lg appearance-none cursor-pointer">
                </div>
            </div>

            <div class="w-full lg:w-2/12 md:w-4/12">
                <div class="px-0 md:px-2 py-2 lg:py-0">
                    <input type="submit" value="Buscar" title="Buscar" class="uppercase py-3 px-2 bg-color-main text-white font-bold border border-color-main cursor-pointer ease-in duration-300 hover:bg-white hover:text-color-main text-md rounded-lg  block w-full" />  
                </div>
            </div>
        </form>
    </div>
</section>

<?php if (!empty($releases)) { ?>
    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl uppercase">Lançamentos</h2>    
                </div>

                <a href='<?php route('/lancamentos') ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
            </div>

            <div class="flex flex-wrap w-full" data-slick="cards">
                <?php foreach ($releases as $item) {
                    loadHtml(__DIR__ . '/../resources/client/partials/card-properties', [
                        'id' => $item->id,
                        'code' => $item->code,
                        'andress' => $item->andress,
                        'name' => $item->name,
                        'value' => $item->value,
                        'status' => $item->status,
                        'dimension' => $item->dimension,
                        'progress' => $item->progress,
                        'show_card' => $item->show_card,
                        'details' => json_decode($item->details, true),
                    ]);
                } ?>

                <?php if (count($releases) <= 3) {
                    for ($i = 0; $i < 4 - count($releases); $i++) { ?>
                        <div class="px-4 w-full md:w-6/12 lg:w-4/12 my-12"></div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($sell)) { ?>
    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl uppercase">Comprar</h2>    
                </div>

                <a href='<?php route('/comprar') ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
            </div>

            <div class="flex flex-wrap w-full" data-slick="cards">
                <?php foreach ($sell as $item) {
                    loadHtml(__DIR__ . '/../resources/client/partials/card-properties', [
                        'id' => $item->id,
                        'code' => $item->code,
                        'andress' => $item->andress,
                        'name' => $item->name,
                        'value' => $item->value,
                        'status' => $item->status,
                        'dimension' => $item->dimension,
                        'progress' => $item->progress,
                        'show_card' => $item->show_card,
                        'details' => json_decode($item->details, true),
                    ]);
                } ?>

                <?php if (count($sell) <= 3) {
                    for ($i = 0; $i < 4 - count($sell); $i++) { ?>
                        <div class="px-4 w-full md:w-6/12 lg:w-4/12 my-12"></div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
<?php } ?>

<?php if (!empty($toHire)) { ?>
    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl uppercase">Alugar</h2>    
                </div>

                <a href='<?php route('/alugar') ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
            </div>

            <div class="flex flex-wrap w-full" data-slick="cards">
                <?php foreach ($toHire as $item) {
                    loadHtml(__DIR__ . '/../resources/client/partials/card-properties', [
                        'id' => $item->id,
                        'code' => $item->code,
                        'andress' => $item->andress,
                        'name' => $item->name,
                        'value' => $item->value,
                        'status' => $item->status,
                        'dimension' => $item->dimension,
                        'progress' => $item->progress,
                        'show_card' => $item->show_card,
                        'details' => json_decode($item->details, true),
                    ]);
                } ?>

                <?php if (count($toHire) <= 3) {
                    for ($i = 0; $i < 4 - count($toHire); $i++) { ?>
                        <div class="px-4 w-full md:w-6/12 lg:w-4/12 my-12"></div>
                    <?php }
                } ?>
            </div>
        </div>
    </section>
<?php } ?>

<section class="py-12 bg-color-main">
    <div class="container flex justify-center flex-wrap">
        <?php foreach ($economic as $item) { ?>
            <div class="w-full sm:w-4/12 px-6">
                <div class="flex items-center justify-center md:flex-row flex-col py-3 md:py-0">
                    <div class="mr-0 md:mr-4">
                        <h2 class="text-secondary font-bold text-3xl"><?php echo $item->type ?></h2>
                    </div>

                    <div class="text-white font-semibold">
                        <p><?php echo getMonths($item->month) ?> / <?php echo $item->year ?></p>
                        <p>Mês: <?php echo $item->percentage_month ?>%</p>
                        <p>Acumulado últimos 12 meses: <?php echo $item->percentage_year ?>%</p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="py-12 bg-[#F4F4F4]" id="sobre">
    <div class="container flex items-center flex-wrap">
        <div class="w-full md:w-6/12 pr-0 pb-3 md:pb-0 md:pr-3 flex flex-col items-start">
            <p class="text-secondary text-md">SOBRE NÓS</p>
            <h2 class="text-color-main font-bold text-2xl mb-6">SANTO ANTÔNIO IMÓVEIS</h2>

            <p><?php echo !empty($about) ? getExcerpt($about, 400) : '' ?></p>
        
            <a href='<?php route('/sobre') ?>' title='Leia Mais' class='text-xs btn btn-color-main font-bold mx-1 text-center mt-6'>Leia Mais</a>    
        </div>

        <div class="w-full md:w-6/12 flex flex-wrap">
            <?php if ($brokers) {
                    foreach ($brokers as $broker) { ?>
                        <div class="w-full sm:w-6/12 p-3 rounded-xl h-[400px]">
                            <?php loadHtml(__DIR__ . '/../resources/partials/image', [
                                'id' => $broker->thumbnail,
                                'class' => 'w-full h-[340px] rounded-xl object-cover',
                                'alt' => $broker->name,
                            ]) ?>

                            <?php if (!empty($broker->whatsapp)) { ?>
                                <a class="btn bg-[#00A900] text-white text-center mt-2" href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', $broker->whatsapp) ?>" title="<?php echo $broker->name ?>" target="_blank" rel="noopener">
                                    <?php echo $broker->name ?>
                                    <i class="ml-2 bi bi-whatsapp"></i>
                                </a>
                            <?php } ?>
                        </div>
                    <?php }
                } 
            ?>
        </div>
    </div>
</section>
