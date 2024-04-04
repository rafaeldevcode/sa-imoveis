<header class="bg-color-main sticky top-0 shadow-lg p-4 z-[10]">
    <section class="container flex flex-row justify-between">
        <div class="flex items-center">
            <div class="h-[40px] mr-4">
                <a href='<?php route('/') ?>' title='<?php _e('Return to home page') ?>'>
                    <img class='h-full' src='<?php asset('assets/images/' . SETTINGS->site_logo_secondary) ?>' alt="Logo <?php echo SETTINGS->site_name ?>" />
                </a>
            </div>
        </div>

        <div id="menu-client" class="hidden md:flex flex-col md:flex-row gap-4 fixed bg-white md:bg-color-main md:relative md:top-0 md:right-0 top-20 right-2 rounded p-4 md:p-0">
            <nav class="flex flex-col">
                <ul class="flex justify-start md:justify-end flex-col md:flex-row gap-4 md:gap-10 mb-6">
                    <li>
                        <a href="<?php route('/') ?>" class="text-secondary font-bold" title="SIMULE UM FINANCIAMENTO">SIMULE UM FINANCIAMENTO</a>
                    </li>

                    <li>
                        <a href="<?php route('/comprar') ?>" class="text-secondary font-bold" title="ANUNCIE SEU IMÓVEL">ANUNCIE SEU IMÓVEL</a>
                    </li>

                    <li>
                        <a href="<?php route('/comprar') ?>" class="text-secondary font-bold" title="MEUS FAVORITOS">
                            <i class="bi bi-heart"></i>
                            MEUS FAVORITOS
                        </a>
                    </li>
                </ul>

                <div class="flex flex-col md:flex-row gap-10">
                    <ul class="flex flex-col md:flex-row gap-4 md:gap-6">
                        <li>
                            <a href="<?php route('/') ?>" class="border-b-2 border-transparent hover:border-secondary transition ease-in-out text-color-main md:text-white font-bold px-2" title="INICIO">INICIO</a>
                        </li>

                        <li>
                            <a href="<?php route('/comprar') ?>" class="border-b-2 border-transparent hover:border-secondary transition ease-in-out text-color-main md:text-white font-bold px-2" title="COMPRAR">COMPRAR</a>
                        </li>

                        <li>
                            <a href="<?php route('/alugar') ?>" class="border-b-2 border-transparent hover:border-secondary transition ease-in-out text-color-main md:text-white font-bold px-2" title="ALUGAR">ALUGAR</a>
                        </li>

                        <li>
                            <a href="<?php route('/#sobre') ?>" class="border-b-2 border-transparent hover:border-secondary transition ease-in-out text-color-main md:text-white font-bold px-2" title="QUEM SOMOS">QUEM SOMOS</a>
                        </li>

                        <li>
                            <a href="<?php route('/alugar') ?>" class="border-b-2 border-transparent hover:border-secondary transition ease-in-out text-color-main md:text-white font-bold px-2" title="CONTATO">CONTATO</a>
                        </li>
                    </ul>

                    <form action='?' method='POST' class='input-group'>
                        <input type='search' class='py-1 px-4 border placeholder:text-secondary md:placeholder:text-white bg-white md:bg-color-main border-secondary placeholder:text-sm mr-[-5px] placeholder:italic' name='search' placeholder='Buscar por código ou nome' value='<?php echo isset(requests()->search) ? requests()->search : '' ?>'>
                        
                        <button title="<?php _e('Submit search') ?>" type='submit' class='input-group-text py-1 px-2 btn-secondary' id='search'>
                            <i class='bi bi-search fs-xs'></i>
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <button id="button-menu-client" data-menu="close" class="text-white border-none bg-transparent block md:hidden">
            <i class="bi bi-list text-4xl"></i>
        </button>
    </section>
</header>
