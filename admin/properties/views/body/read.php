<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <section>
        <div class="flex justify-between items-end">
            <div>
                <p class="text-color-main font-bold text-xl mb-2"><?php echo _e(':total views in total', [':total' => $total]) ?></p>
                <p class="text-color-main font-bold text-xl mb-2"><?php echo _e(':total views for the date of :date', [':total' => $totalByDay, ':date' => (new DateTime($date))->format('d/m/Y')]) ?></p>
            </div>
        
            <form data-views="submit" method="GET" class="w-full md:w-2/12 px-4">
                <input type="hidden" name="property" value="<?php echo requests()->property ?>">

                <div class='w-full'>
                    <?php loadHtml(__DIR__ . '/../../../../resources/partials/form/input-default', [
                        'icon' => 'bi bi-calendar-fill',
                        'name' => 'date',
                        'type' => 'date',
                        'value' => $date
                    ]) ?>
                </div>
            </form>
        </div>

        <div class="relative overflow-x-auto max-w-[2000px] mx-auto mb-4 rounded border">
            <table class="w-full text-left">
                <thead class="text-white uppercase bg-color-main">
                    <tr>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Date') ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($views->data as $view) { ?>
                        <tr class="bg-white border-b hover:bg-gray-100 text-gray-900">
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo (new DateTime($view->date))->format('d/m/Y H:i:s') ?></span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php if (count($views->data) == 0) { ?>
            <div class="p-2 h-[300px] flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="<?php _e('No data found') ?>">
            </div>
        <?php } ?>
    </section>

    <?php if (isset($views->page)) {
        loadHtml(__DIR__ . '/../../../../resources/admin/partials/pagination', [
            'page' => $views->page,
            'count' => $views->count,
            'next' => $views->next,
            'prev' => $views->prev,
            'search' => $views->search,
        ]);
    } ?>
</section>
