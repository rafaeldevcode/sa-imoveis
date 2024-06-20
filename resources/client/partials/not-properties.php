<section class="p-4 my-10 text-center w-full">
    <p class="text-bold text-2xl">Não foi possível localizar imóveis. Você pode ajustar a buscar, mas se preferir nós estamos prontos para lhe ajudar e vamos encontrar a melhor solução.</p>

    <?php if (!empty(SETTINGS->whatsapp)) { ?>
        <a href="https://wa.me/+<?php echo preg_replace('/[^0-9]/', '', SETTINGS->whatsapp) ?>?text=<?php echo SETTINGS->whatsapp_message ?>" class="rounded px-4 py-2 mt-4 max-w-[310px] mx-auto font-bold bg-[#00A900] text-white flex items-center justify-center border border-[#00A900] hover:bg-white hover:text-[#00A900] ease-in duration-300">
            Falar com a Santo Antônio imoveis!
            <i class="bi bi-whatsapp text-xl ml-2"></i>
        </a>
    <?php } ?>
</section>
