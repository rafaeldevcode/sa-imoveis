<section class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <div class="w-full max-w-[900px] mx-auto">
            <h1 class="font-bold text-center text-4xl text-color-main font-main uppercase">Anuncie seu Imóvel</h1>
            <?php if (! empty(SETTINGS->whatsapp)) { ?>
                <p>Você pode entrar em contato diretamente conosco através do WhatsApp no número <a target="_blank" class="ease-in duration-300 text-secondary font-bold hover:text-color-main" href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->whatsapp) ?>?text=<?php echo SETTINGS->whatsapp_message ?>"><?php echo substr(SETTINGS->whatsapp, 4) ?></a>, e com um simples clique, você será redirecionado para o WhatsApp. Se preferir, também pode preencher o formulário abaixo.</p>
            <?php } ?>
        </div>

        <!-- Send message -->
        <div class="mt-6 w-full max-w-[900px] mx-auto">
            <form action="<?php route('/anunciar-imovel/create') ?>" method="POST">
                <div class='flex justify-between flex-wrap'>
                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-person-fill',
                            'name' => 'name',
                            'label' => 'Nome',
                            'type' => 'text',
                            'attributes' => 'required'
                        ]) ?>
                    </div>

                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-envelope-fill',
                            'name' => 'email',
                            'label' => 'Email',
                            'type' => 'email',
                            'attributes' => 'required'
                        ]) ?>
                    </div>

                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-whatsapp',
                            'name' => 'whatsapp',
                            'label' => 'Celeular whatsapp (com DDD)',
                            'type' => 'text',
                            'attributes' => 'required'
                        ]) ?>
                    </div>

                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-telephone-fill',
                            'name' => 'phone',
                            'label' => 'Telefone (com DDD)',
                            'type' => 'text',
                        ]) ?>
                    </div>
                </div>

                <div class='flex justify-between flex-wrap'>
                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__ . '/../../resources/partials/form/input-select', [
                            'icon' => 'bi bi-hash',
                            'name' => 'type',
                            'label' => 'Tipo do imóvel',
                            'attributes' => ['required' => true],
                            'value' => null,
                            'options' => [
                                'Alugar' => __('Alugar'),
                                'Vender' => __('Vender'),
                            ]
                        ]) ?>
                    </div>
                </div>

                <div class='flex justify-between flex-wrap'>
                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__ . '/../../resources/partials/form/input-select', [
                            'icon' => 'bi bi-hash',
                            'name' => 'state',
                            'label' => 'Estado',
                            'attributes' => ['required' => true],
                            'value' => null,
                            'options' => getStates()
                        ]) ?>
                    </div>

                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-alphabet',
                            'name' => 'city',
                            'label' => 'Cidade',
                            'type' => 'text',
                            'attributes' => 'required'
                        ]) ?>
                    </div>

                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-alphabet',
                            'name' => 'neighborhood',
                            'label' => 'Bairro',
                            'type' => 'text',
                            'attributes' => 'required'
                        ]) ?>
                    </div>

                    <div class='w-full md:w-6/12'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/input-default', [
                            'icon' => 'bi bi-alphabet',
                            'name' => 'street',
                            'label' => 'Rua',
                            'type' => 'text',
                            'attributes' => 'required'
                        ]) ?>
                    </div>

                    <div class='w-full'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/text-area', [
                            'icon' => 'bi bi-chat-left-text-fill',
                            'name' => 'message',
                            'label' => 'Sua mensagem',
                            'attributes' => 'required',
                        ]) ?>
                    </div>
                </div>

                <div class='flex justify-end'>
                    <?php loadHtml(__DIR__.'/../../resources/partials/form/input-button', [
                        'type' => 'submit',
                        'style' => 'color-main',
                        'title' => 'Enviar',
                    ]) ?>
                </div>
            </form>
        </div>
    </div>
</section>
