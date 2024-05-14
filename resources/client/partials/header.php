<header class="bg-color-main sticky top-0 shadow-lg p-4 z-[10]">
    <section class="container flex flex-row justify-between">
        <div class="flex items-center">
            <div class="h-[60px] lg:h-[80px] mr-4">
                <a href='<?php route('/') ?>' title='<?php _e('Return to home page') ?>'>
                    <img class='h-full' src='<?php asset('assets/images/' . SETTINGS->site_logo_secondary) ?>' alt="Logo <?php echo SETTINGS->site_name ?>" />
                </a>
            </div>
        </div>

        <div id="menu-client" class="hidden lg:flex flex-col lg:flex-row gap-4 fixed bg-white lg:bg-color-main lg:relative lg:top-0 lg:right-0 top-20 right-2 rounded p-4 lg:p-0">
            <nav class="flex flex-col">
                <ul class="flex justify-start lg:justify-end flex-col lg:flex-row gap-4 lg:gap-10 mb-6">
                    <li>
                        <a href="<?php route('/simular-financiamento') ?>" class="text-secondary font-bold" title="SIMULE UM FINANCIAMENTO">SIMULE UM FINANCIAMENTO</a>
                    </li>

                    <li>
                        <a href="<?php route('/anunciar-imovel') ?>" class="text-secondary font-bold" title="ANUNCIE SEU IMÓVEL">ANUNCIE SEU IMÓVEL</a>
                    </li>

                    <li>
                        <a href="<?php route('/favoritos') ?>" class="text-secondary font-bold" title="MEUS FAVORITOS">
                            <i class="bi bi-heart"></i>
                            MEUS FAVORITOS
                        </a>
                    </li>
                </ul>

                <div class="flex flex-col lg:flex-row gap-10">
                    <ul class="flex flex-col lg:flex-row gap-4 lg:gap-6">
                        <li>
                            <a href="<?php route('/') ?>" class="<?php isActive('') ?> uppercase border-b-2 hover:border-secondary transition ease-in-out text-color-main lg:text-white font-bold px-2" title="INICIO">INICIO</a>
                        </li>

                        <?php if (thereIsProperty('Vender')) { ?>
                            <li>
                                <a href="<?php route('/comprar') ?>" class="<?php isActive('comprar') ?> uppercase border-b-2 hover:border-secondary transition ease-in-out text-color-main lg:text-white font-bold px-2" title="Comprar">Comprar</a>
                            </li>
                        <?php } ?>

                        <?php if (thereIsProperty('Alugar')) { ?>
                            <li>
                                <a href="<?php route('/alugar') ?>" class="<?php isActive('alugar') ?> uppercase border-b-2 hover:border-secondary transition ease-in-out text-color-main lg:text-white font-bold px-2" title="Alugar">Alugar</a>
                            </li>
                        <?php } ?>

                        <li>
                            <a href="<?php route('/sobre') ?>" class="<?php isActive('sobre') ?> uppercase border-b-2 hover:border-secondary transition ease-in-out text-color-main lg:text-white font-bold px-2" title="QUEM SOMOS">QUEM SOMOS</a>
                        </li>

                        <li>
                            <a href="<?php route('/contato') ?>" class="<?php isActive('contato') ?> uppercase border-b-2 hover:border-secondary transition ease-in-out text-color-main lg:text-white font-bold px-2" title="CONTATO">CONTATO</a>
                        </li>
                    </ul>

                    <form action='<?php route('/pesquisar') ?>' method='POST' class="flex">
                        <input type="hidden" name="search_type" value="1">
                        <input type='search' class='text-white py-1 px-4 border placeholder:text-secondary lg:placeholder:text-white bg-white lg:bg-color-main border-secondary placeholder:text-sm mr-[-5px] placeholder:italic' name='search' placeholder='Buscar por código ou nome' value='<?php echo isset(requests()->search) ? requests()->search : '' ?>'>
                        
                        <button title="<?php _e('Submit search') ?>" type='submit' class='input-group-text py-1 px-2 btn-secondary' id='search'>
                            <i class='bi bi-search fs-xs'></i>
                        </button>
                    </form>
                </div>
            </nav>
        </div>

        <button id="button-menu-client" data-menu="close" class="text-white border-none bg-transparent block lg:hidden">
            <i class="bi bi-list text-4xl"></i>
        </button>
    </section>
</header>
