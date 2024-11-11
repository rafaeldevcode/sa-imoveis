<section class='w-full border-t-2 border-secondary'>
    <div class='pt-2 flex justify-between'>
        <form action="">
            <?php if (!is_null($prev)) { ?>
                <input type="hidden" name="page" value="<?php echo $prev ?>">
            <?php } ?>

            <?php if (!is_null($search)) { ?>
                <input type="hidden" name="search" value="<?php echo $search ?>">
            <?php } ?>

            <?php foreach (requests() as $indice => $request) {
                if ($indice !== 'page' && $indice !== 'search') { ?>
                    <input type="hidden" name="<?php echo $indice ?>" value="<?php echo $request ?>">
                <?php }
            } ?>

            <button type="submit" title='<?php _e('Página anterior') ?>' class='btn btn-secondary' <?php echo is_null($prev) ? 'disabled' : '' ?>>
                <i class='bi bi-arrow-left-short'></i>
                Anterior
            </button>
        </form>

        <div class='flex items-center'>
            <div class='px-2 me-1 border-t-2 border-color-main'>
                <?php echo $page ?>
            </div>
            <div class='border-t-2 border-secondary'>de <?php echo $count ?></div>
        </div>

        <form action="">
            <?php if (!is_null($next)) { ?>
                <input type="hidden" name="page" value="<?php echo $next ?>">
            <?php } ?>

            <?php if (!is_null($search)) { ?>
                <input type="hidden" name="search" value="<?php echo $search ?>">
            <?php } ?>

            <?php foreach (requests() as $indice => $request) {
                if ($indice !== 'page' && $indice !== 'search') { ?>
                    <input type="hidden" name="<?php echo $indice ?>" value="<?php echo $request ?>">
                <?php }
            } ?>

            <button type="submit" title='<?php _e('Próxima página') ?>' class='btn btn-secondary' <?php echo is_null($next) ? 'disabled' : '' ?>>
                Próximo
                <i class='bi bi-arrow-right-short'></i>
            </button>
        </form>
    </div>
</section>
