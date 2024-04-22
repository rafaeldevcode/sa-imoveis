<main>
    <section class="w-full min-h-[500px] md:h-[650px] flex flex-col justify-between" style="background: url(<?php asset('assets/images/' . SETTINGS->site_bg_login) ?>) no-repeat center; background-size: cover;">
        <div class="container bg-white rounded-b-lg p-10 text-center flex flex-wrap">
            <div class="w-full md:w-6/12 lg:w-3/12 border-r-none md:border-r border-color-main">
                <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="1" title="Mais opções">
                    Apartamentos
                    <i class="bi bi-chevron-right block lg:hidden"></i>
                </button>

                <div class="hidden lg:block" data-open-target="1" data-target-open="false">
                    <a class="uppercase text-secondary text-xs" title="Ver Todos" href="<?php route('/imoveis/categoria/apartamentos') ?>">Ver Todos</a>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="01 Dormitório">
                        <input type="hidden" name="category_id" value="1">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 01 Dorm.</button>
                    </form>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="02 Dormitórios">
                        <input type="hidden" name="category_id" value="1">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 02 Dorm.</button>
                    </form>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="03 Dormitórios">
                        <input type="hidden" name="category_id" value="1">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 03 Dorm.</button>
                    </form>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="04 Dormitórios ou +">
                        <input type="hidden" name="category_id" value="1">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Apartamentos 04 Dorm. ou +</button>
                    </form>
                </div>
            </div>

            <div class="mt-4 md:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none md:border-l border-r-none lg:border-r border-color-main">
                <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="2" title="Mais opções">
                    Casas
                    <i class="bi bi-chevron-right block lg:hidden"></i>
                </button>

                <div class="hidden lg:block" data-open-target="2" data-target-open="false">
                    <a class="uppercase text-secondary text-xs" title="Ver Todos" href="<?php route('/imoveis/categoria/casas') ?>">Ver Todos</a>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="01 Dormitório">
                        <input type="hidden" name="category_id" value="2">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 01 Dorm.</button>
                    </form>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="02 Dormitórios">
                        <input type="hidden" name="category_id" value="2">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 02 Dorm.</button>
                    </form>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="03 Dormitórios">
                        <input type="hidden" name="category_id" value="2">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 03 Dorm.</button>
                    </form>

                    <form method="POST" action="<?php route('/pesquisar') ?>">
                        <input type="hidden" name="bedrooms" value="04 Dormitórios ou +">
                        <input type="hidden" name="category_id" value="2">
                        <button class="py-2 hover:text-secondary ease-in duration-300" type="submit" title="Visualizar">Casas 04 Dorm. ou +</button>
                    </form>
                </div>
            </div>

            <div class="mt-4 lg:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none lg:border-l border-r-none md:border-r border-color-main">
                <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="3" title="Mais opções">
                    Comercial
                    <i class="bi bi-chevron-right block lg:hidden"></i>
                </button>

                <div class="mt-5 hidden lg:block" data-open-target="3" data-target-open="false">
                    <a class="py-2 hover:text-secondary ease-in duration-300 block" title="Sala Comercial" href="<?php route('/imoveis/categoria/sala-comercial') ?>">Sala Comercial</a>

                    <a class="py-2 hover:text-secondary ease-in duration-300 block" title="Pavilhão" href="<?php route('/imoveis/categoria/pavilhao') ?>">Pavilhão</a>
                </div>
            </div>

            <div class="mt-4 lg:mt-0 w-full md:w-6/12 lg:w-3/12 border-l-none md:border-l border-color-main">
                <button class="text-color-main uppercase font-bold flex gap-2 justify-center w-full" data-open="4" title="Mais opções">
                    Terrenos
                    <i class="bi bi-chevron-right block lg:hidden"></i>
                </button>

                <div class="mt-5 hidden lg:block" data-open-target="4" data-target-open="false">
                    <a class="py-2 hover:text-secondary ease-in duration-300 block" title="Terrenos Comerciais" href="<?php route('/imoveis/categoria/terrenos-comerciais') ?>">Terrenos Comerciais</a>

                    <a class="py-2 hover:text-secondary ease-in duration-300 block" title="Terrenos Residenciais" href="<?php route('/imoveis/categoria/terrenos-residenciais') ?>">Terrenos Residenciais</a>

                    <a class="py-2 hover:text-secondary ease-in duration-300 block" title="Sítios" href="<?php route('/imoveis/categoria/sitio') ?>">Sítios</a>

                    <a class="py-2 hover:text-secondary ease-in duration-300 block" title="Área Rural" href="<?php route('/imoveis/categoria/area-rural') ?>">Área Rural</a>
                </div>
            </div>
        </div>
    
        <div class="relative container px-4 py-12 flex justify-center items-end">
            <form action="<?php route('/pesquisar') ?>" method="POST" class="bg-[#FFFFFF85] p-4 w-full flex flex-wrap items-center">                
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
                            <option value="">Categoria</option>

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
                        <input type="text" name="andress" placeholder="Cidade" class="py-3 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full" />  
                    </div>
                </div>

                <div class="w-full lg:w-2/12 md:w-4/12">
                    <div class="px-0 md:px-2 py-2 lg:py-0">
                        <label for="value">De <b>R$ 300,00</b> à <b>R$ <span id="result-value">50.000</span></b></label>
                        <input type="range" id="value" name="value" min="300" max="2000000" class="w-full h-2 bg-color-main rounded-lg appearance-none cursor-pointer">
                    </div>
                </div>

                <div class="w-full lg:w-2/12 md:w-4/12">
                    <div class="px-0 md:px-2 py-2 lg:py-0">
                        <input type="submit" value="Buscar" title="Buscar" class="uppercase py-3 px-2 bg-color-main text-white font-bold border border-color-main cursor-pointer ease-in duration-300 hover:bg-white hover:text-color-main text-md rounded-lg  block w-full" />  
                    </div>
                </div>
            </form>

            <?php if (! empty(SETTINGS->whatsapp)) { ?>
                <a href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->whatsapp) ?>?text=<?php echo SETTINGS->whatsapp_message ?>" class="absolute right-0 bottom-[-50px] w-[80px] h-[80px] rounded-full bg-[#00A900] text-white flex items-center justify-center">
                    <i class="bi bi-whatsapp text-5xl"></i>
                </a>
            <?php } ?>
        </div>
    </section>

    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl uppercase">Lançamentos</h2>    
                </div>

                <a href='<?php route("/lancamentos") ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
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
                        'details' => json_decode($item->details, true),
                    ]);
                } ?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl uppercase">Comprar</h2>    
                </div>

                <a href='<?php route("/comprar") ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
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
                        'details' => json_decode($item->details, true),
                    ]);
                } ?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl uppercase">Alugar</h2>    
                </div>

                <a href='<?php route("/alugar") ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
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
                        'details' => json_decode($item->details, true),
                    ]);
                } ?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-color-main">
        <div class="container flex justify-center flex-wrap">
            <div class="w-full sm:w-4/12 px-6">
                <div class="flex items-center justify-center md:flex-row flex-col py-3 md:py-0">
                    <div class="mr-0 md:mr-4">
                        <h2 class="text-secondary font-bold text-3xl">IGPM</h2>
                    </div>

                    <div class="text-white font-semibold">
                        <p>Fevereiro / 2024</p>
                        <p>Mês: 0,07%</p>
                        <p>12 meses: -3,32%</p>
                    </div>
                </div>
            </div>

            <div class="w-full sm:w-4/12 px-6">
                <div class="flex items-center justify-center md:flex-row flex-col py-3 md:py-0">
                    <div class="mr-0 md:mr-4">
                        <h2 class="text-secondary font-bold text-3xl">INCC</h2>
                    </div>

                    <div class="text-white font-semibold">
                        <p>Fevereiro / 2024</p>
                        <p>Mês: 0,07%</p>
                        <p>12 meses: -3,32%</p>
                    </div>
                </div>
            </div>

            <div class="w-full sm:w-4/12 px-6">
                <div class="flex items-center justify-center md:flex-row flex-col py-3 md:py-0">
                    <div class="mr-0 md:mr-4">
                        <h2 class="text-secondary font-bold text-3xl">IPCA</h2>
                    </div>

                    <div class="text-white font-semibold">
                        <p>Fevereiro / 2024</p>
                        <p>Mês: 0,07%</p>
                        <p>12 meses: -3,32%</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#F4F4F4]" id="sobre">
        <div class="container flex items-center flex-wrap">
            <div class="w-full md:w-6/12 pr-0 pb-3 md:pb-0 md:pr-3 flex flex-col items-start">
                <p class="text-secondary text-md">SOBRE NÓS</p>
                <h2 class="text-color-main font-bold text-2xl mb-6">SANTO ANTÔNIO IMÓVEIS</h2>

                <p><?php echo ! empty($about) ? getExcerpt($about, 400) : '' ?></p>
            
                <a href='<?php route('/sobre') ?>' title='Leia Mais' class='text-xs btn btn-color-main font-bold mx-1 text-center mt-6'>Leia Mais</a>    
            </div>

            <div class="w-full md:w-6/12 flex flex-wrap">
                <div class="w-full sm:w-6/12 px-0 sm:px-3 sm:py-0 py-3  rounded-xl h-[400px]">
                    <img class="w-full h-full rounded-xl object-cover" src="https://static.wikia.nocookie.net/disney/images/9/90/Angelina_Jolie.jpg" alt="">
                </div>

                <div class="w-full sm:w-6/12 px-0 sm:px-3 sm:py-0 py-3 rounded-xl h-[400px]">
                    <img class="w-full h-full rounded-xl object-cover" src="https://static.wikia.nocookie.net/disney/images/9/90/Angelina_Jolie.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
