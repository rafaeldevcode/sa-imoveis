<header class="bg-white sticky top-0 shadow-lg p-4 z-[10]">
    <section class="container flex flex-row justify-between">
        <div class="flex items-center">
            <div class="h-[40px] mr-4">
                <a href='<?php route('/') ?>' title='<?php _e('Return to home page') ?>'>
                    <img class='h-full' src='<?php asset('assets/images/' . SETTINGS->site_logo_secondary) ?>' alt="Logo <?php echo SETTINGS->site_name ?>" />
                </a>
            </div>
        </div>

        <div id="menu-client" class="hidden md:flex flex-col md:flex-row items-start md:items-center gap-4 fixed bg-white md:relative md:top-0 md:right-0 top-20 right-2 rounded p-4 md:p-0">
            <nav>
                <ul class="flex flex-col md:flex-row gap-4 items-start md:items-center">
                    <li>
                        <a href="<?php route('/') ?>" class="text-secondary font-bold hover:text-color-main" title="Inicio">Inicio</a>
                    </li>

                    <li>
                        <a href="<?php route('/schedules') ?>" class="text-secondary font-bold hover:text-color-main" title="Agendamentos">Agendamentos</a>
                    </li>
                </ul>
            </nav>
        </div>

        <button id="button-menu-client" data-menu="close" class="border-none bg-transparent block md:hidden">
            <i class="bi bi-list text-4xl"></i>
        </button>
    </section>
</header>
