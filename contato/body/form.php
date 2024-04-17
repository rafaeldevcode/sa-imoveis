<main class="py-12 bg-[#F4F4F4]">
    <div class="container">
        <h1 class="font-bold text-center text-4xl text-color-main font-main">CONTATO</h1>

        <!-- Send message -->
        <div class="mt-6 w-full max-w-[900px] mx-auto">
            <form action="<?php route('/contato/create') ?>" method="POST">
                <div class='flex justify-between flex-wrap'>
                    <div class='w-full'>
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
                            'icon' => 'bi bi-telephone-fill',
                            'name' => 'phone',
                            'label' => 'Telefone (com DDD)',
                            'type' => 'text',
                        ]) ?>
                    </div>

                    <div class='w-full'>
                        <?php loadHtml(__DIR__.'/../../resources/partials/form/text-area', [
                            'icon' => 'bi bi-chat-left-text-fill',
                            'name' => 'message',
                            'label' => 'Sua mensagem',
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
</main>
