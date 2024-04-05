<main>
    <section class="w-full h-[500px] md:h-[650px]" style="background: url(<?php asset('assets/images/' . SETTINGS->site_bg_login) ?>) no-repeat center; background-size: cover;">
        <div class="relative container h-full px-4 py-12 flex justify-center items-end">
            <div class="bg-[#FFFFFF85] p-4 w-full flex flex-wrap">
                <div class="w-full sm:w-2/12">
                        <div clapx-0 sm:ss=" py-2 sm:py-0px-2">
                        <select id="" name="" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-2">
                            <option value="">Interesse</option>
                        </select>
                    </div>
                </div>

                <div class="w-full sm:w-2/12">
                    <div class="px-0 sm:px-2 py-2 sm:py-0">
                        <select id="" name="" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-2">
                            <option value="">Tipo do Imóvel</option>
                        </select>
                    </div>
                </div>

                <div class="w-full sm:w-2/12">
                    <div class="px-0 sm:px-2 py-2 sm:py-0">
                        <select id="" name="" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-2">
                            <option value="">Dormitórios</option>
                        </select>
                    </div>
                </div>

                <div class="w-full sm:w-2/12">
                    <div class="px-0 sm:px-2 py-2 sm:py-0">
                        <select id="" name="" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-2">
                            <option value="">Cidade</option>
                        </select>
                    </div>
                </div>

                <div class="w-full sm:w-2/12">
                    <div class="px-0 sm:px-2 py-2 sm:py-0">
                        <select id="" name="" class="py-4 px-2 bg-white focus:outline-none text-md rounded-lg focus:ring-color-main focus:ring-1 focus:border-color-main block w-full py-2">
                            <option value="">Bairro</option>
                        </select>
                    </div>
                </div>

                <div class="w-full sm:w-2/12">
                    <div class="px-0 sm:px-2 py-2 sm:py-0">
        
                    </div>
                </div>

                <div class="w-full sm:w-2/12">
                    <div class="px-0 sm:px-2 py-2 sm:py-0">

                    </div>
                </div>
            </div>

            <a href="" class="absolute right-0 bottom-[-50px] w-[80px] h-[80px] rounded-full bg-[#00A900] text-white flex items-center justify-center">
                <i class="bi bi-whatsapp text-5xl"></i>
            </a>
        </div>
    </section>


    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl">LANÇAMENTOS</h2>    
                </div>

                <a href='<?php route('/categoria/vendas') ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
            </div>

            <div class="flex flex-wrap w-full" data-slick="cards">
                <?php for ($i=0; $i < 6; $i++) { 
                    loadHtml(__DIR__ . '/../resources/client/partials/card-properties');
                } ?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl">VENDAS</h2>    
                </div>

                <a href='<?php route('/categoria/vendas') ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
            </div>

            <div class="flex flex-wrap w-full" data-slick="cards">
                <?php for ($i=0; $i < 6; $i++) { 
                    loadHtml(__DIR__ . '/../resources/client/partials/card-properties');
                } ?>
            </div>
        </div>
    </section>

    <section class="py-12 bg-[#F4F4F4]">
        <div class="container">
            <div class="relative flex justify-center w-full items-center flex-col md:flex-row">
                <div class="text-center mb-2 md:mb-0">
                    <p class="text-secondary text-md">DESTAQUES</p>
                    <h2 class="text-color-main font-bold text-2xl">ALUGUÉIS</h2>    
                </div>

                <a href='<?php route('/categoria/vendas') ?>' title='Ver todos' class='text-xs btn btn-color-main font-bold mx-1 text-center relative md:absolute right-0'>VER TODOS</a>
            </div>

            <div class="flex flex-wrap w-full" data-slick="cards">
                <?php for ($i=0; $i < 6; $i++) { 
                    loadHtml(__DIR__ . '/../resources/client/partials/card-properties');
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

                <p><?php echo getExcerpt($about, 400) ?></p>
            
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
