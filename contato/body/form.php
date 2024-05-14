<section class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="font-bold text-center text-4xl text-color-main font-main">CONTATO</h1>

        <!-- Send message -->
        <div class="mt-6 w-full max-w-[900px] mx-auto">
            <div>
                <ul>
                    <?php if (!empty(SETTINGS->phone)) { ?>
                        <li>
                            <i class="bi bi-telephone-fill text-color-main"></i>
                            <a href="tel:+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->phone) ?>" title="Telefone para contato">
                                <b class="text-color-main">Telefone:</b> <?php echo substr(SETTINGS->phone, 4) ?>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (!empty(SETTINGS->whatsapp)) { ?>
                        <li>
                            <i class="bi bi-whatsapp text-color-main"></i>
                            <a href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->whatsapp) ?>?text=<?php echo SETTINGS->whatsapp_message ?>" target="_blank" rel="noopener" title="Telefone e Whataspp para contato">
                                <b class="text-color-main">Whatsapp:</b> <?php echo substr(SETTINGS->whatsapp, 4) ?>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (!empty(SETTINGS->email)) { ?>
                        <li>
                            <i class="bi bi-envelope-fill text-color-main"></i>
                            <a href="mailto:<?php echo SETTINGS->email ?>" title="Email para contato">
                                <b class="text-color-main">E-mail:</b> <?php echo SETTINGS->email ?>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if (!empty(SETTINGS->andress)) { ?>
                        <li class="flex">
                            <i class="bi bi-geo-alt-fill text-color-main"></i>

                            <p><?php echo SETTINGS->andress ?></p>
                        </li>
                    <?php } ?>
                </ul>

                <p class="mt-4 text-xl">Caso ainda prefira, pode nos contatar através do formulário abaixo, deixando seus dados e sua mensagem.</p>
            </div>
            
            <form class="mt-4" action="<?php route('/contato/create') ?>" method="POST">
                <div class='flex justify-between flex-wrap'>
                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__ . '/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-person-fill',
                            'name' => 'name',
                            'label' => 'Nome',
                            'type' => 'text',
                            'attributes' => 'required',
                        ]) ?>
                    </div>

                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__ . '/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-telephone-fill',
                            'name' => 'phone',
                            'label' => 'Telefone (com DDD)',
                            'type' => 'text',
                            'attributes' => 'required',
                        ]) ?>
                    </div>

                    <div class='w-full'>
                        <?php loadHtml(__DIR__ . '/../../resources/partials/form/text-area', [
                            'icon' => 'bi bi-chat-left-text-fill',
                            'name' => 'message',
                            'label' => 'Sua mensagem',
                            'attributes' => 'required',
                        ]) ?>
                    </div>
                </div>

                <div class='flex justify-end'>
                    <?php loadHtml(__DIR__ . '/../../resources/partials/form/input-button', [
                        'type' => 'submit',
                        'style' => 'color-main',
                        'title' => 'Enviar',
                    ]) ?>
                </div>
            </form>
        </div>
    </div>
</section>
