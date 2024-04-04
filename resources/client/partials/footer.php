<footer class="bg-color-main">
    <section class="container text-white p-4">
        <div class="py-[6rem] flex flex-wrap justify-center">
            <div class="w-full md:w-6/12 lg:w-3/12 py-4 space-y-4">
                <div class="w-full m-w-[250px] mx-auto">
                    <a href="<?php route('/') ?>" title="Acessar a página inicial">
                        <img class='w-2/3 mx-auto' src='<?php asset('assets/images/' . SETTINGS->site_logo_secondary) ?>' alt="Logo <?php echo SETTINGS->site_name ?>" />
                    </a>
                </div>

                <div>
                    <p class="italic font-semibold text-center font-main">
                        <?php echo SETTINGS->site_description?>
                    </p>
                </div>
            </div>

            <div class="w-full md:w-6/12 lg:w-3/12 py-4 px-0 md:px-4">
                <h2 class="font-bold text-xl font-main">Veja também</h2>

                <ul>
                    <li>
                        <a href="<?php route('/') ?>" title="Inicio">Inicio</a>
                    </li>
                    <li>
                        <a href="<?php route('/') ?>" title="Comprar">Comprar</a>
                    </li>
                    <li>
                        <a href="<?php route('/') ?>" title="Alugar">Alugar</a>
                    </li>
                    <li>
                        <a href="<?php route('/') ?>" title="Quem Somos">Quem Somos</a>
                    </li>
                    <li>
                        <a href="<?php route('/') ?>" title="Contato">Contato</a>
                    </li>
                    <li>
                        <a href="<?php route('/') ?>" title="Simula um Financiamento">Simula um Financiamento</a>
                    </li>
                    <li>
                        <a href="<?php route('/') ?>" title="Anuncie seu Imóvel">Anuncie seu Imóvel</a>
                    </li>
                </ul>
            </div>

            <div class="w-full md:w-6/12 lg:w-3/12 py-4 space-y-4">
                <div>
                    <h2 class="font-bold text-xl font-main">Contatos</h2>

                    <ul>
                        <?php if (! empty(SETTINGS->email)) { ?>
                            <li>
                                <i class="bi bi-envelope-fill"></i>
                                <a href="mailto:<?php echo SETTINGS->email ?>" title="Email para contato">
                                    E-mail: <?php echo SETTINGS->email ?>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (! empty(SETTINGS->phone)) { ?>
                            <li>
                                <i class="bi bi-telephone-fill"></i>
                                <a href="tel:+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->phone) ?>" title="Telefone para contato">
                                    Telefone: <?php echo substr(SETTINGS->phone, 4) ?>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (! empty(SETTINGS->whatsapp)) { ?>
                            <li>
                                <i class="bi bi-whatsapp"></i>
                                <a href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->whatsapp) ?>?text=<?php echo SETTINGS->whatsapp_message ?>" target="_blank" rel="noopener" title="Telefone e Whataspp para contato">
                                    Whatsapp: <?php echo substr(SETTINGS->whatsapp, 4) ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="w-full md:w-6/12 lg:w-3/12 py-4 space-y-4">
                <?php if (! empty(SETTINGS->andress)) { ?>
                    <div>
                        <h2 class="font-bold text-xl font-main">Endereço</h2>

                        <p><?php echo SETTINGS->andress ?></p>
                    </div>
                <?php } ?>

                <div>
                    <h2 class="font-bold text-xl font-main">Redes Sociais</h2>

                    <ul class="flex space-x-4">
                        <?php if (! empty(SETTINGS->profile_facebook)) { ?>
                            <li>
                                <a href="<?php echo SETTINGS->profile_facebook ?>" target="_blank" rel="noopener" title="Nosso perfil no facebook">
                                    <i class="bi bi-facebook"></i>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (! empty(SETTINGS->profile_instagram)) { ?>
                            <li>
                                <a href="<?php echo SETTINGS->profile_instagram ?>" target="_blank" rel="noopener" title="Nosso perfil no instagram">
                                    <i class="bi bi-instagram"></i>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (! empty(SETTINGS->profile_linkedin)) { ?>
                            <li>
                                <a href="<?php echo SETTINGS->profile_linkedin ?>" target="_blank" rel="noopener" title="Nosso perfil no linkedin">
                                    <i class="bi bi-linkedin"></i>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (! empty(SETTINGS->profile_twitter)) { ?>
                            <li>
                                <a href="<?php echo SETTINGS->profile_twitter ?>" target="_blank" rel="noopener" title="Nosso perfil no twitter">
                                    <i class="bi bi-twitter"></i>
                                </a>
                            </li>
                        <?php } ?>

                        <?php if (! empty(SETTINGS->telegram)) { ?>
                            <li>
                                <a href="https://t.me/<?php echo SETTINGS->telegram ?>?text=<?php echo SETTINGS->telegram_message ?>" target="_blank" rel="noopener" title="Contate nos via telegram">
                                    <i class="bi bi-telegram"></i>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="container text-white p-4 flex flex-col md:flex-row justify-center items-center md:justify-evenly space-y-4 md:space-y-0">
        <div class="text-center md:text-left">
            <p><?php echo SETTINGS->copyright ?></p>
        </div>
    </section>
</footer>
