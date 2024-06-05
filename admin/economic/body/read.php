<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <section>
        <div class="relative overflow-x-auto max-w-[2000px] mx-auto mb-4 rounded border">
            <table class="w-full text-left">
                <thead class="text-white uppercase bg-color-main">
                    <tr>
                        <th scope="col" class="py-1 px-3">
                            <div class="flex items-center">
                                <input 
                                    data-button="select-several"
                                    id="checkbox-all-search" 
                                    type="checkbox" 
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                >
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Type') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Month') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Year') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Percentage month') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Percentage year') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3 text-right">
                            <span class="text-sm"><?php _e('Actions') ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($economic->data as $item) { ?>
                        <tr class="bg-white border-b hover:bg-gray-100 text-gray-900">
                            <td class="w-4 py-1 px-3">
                                <div class="flex items-center">
                                    <input 
                                        value='<?php echo $item->id ?>' 
                                        data-message-delete='<?php _e('This action will remove all selected economic!') ?>'
                                        type='checkbox'
                                        data-button="delete-enable"
                                        id="checkbox-table-search-<?php echo $item->id ?>" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="checkbox-table-search-<?php echo $item->id ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $item->type ?></span>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo getMonths($item->month) ?></span>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $item->year ?></span>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $item->percentage_month ?>%</span>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $item->percentage_year ?>%</span>
                            </td>
                            <td class="flex items-center justify-end py-1 px-3 space-x-2 right">
                                <a href="<?php route("/admin/economic/?method=edit&id={$item->id}") ?>" title='<?php _e('Edit price index :type.', [':type' => $item->type]) ?>' class='text-xs p-2 rounded btn-primary text-light fw-bold'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>

                                <!-- <button
                                    data-button="delete"
                                    data-route='<?php route('/admin/economic/delete') ?>'
                                    data-delete-id='<?php echo $item->id ?>'
                                    data-message-delete='<?php _e('This action will remove the :type price index.', [':type' => $item->type]) ?>'
                                    type='button'
                                    title='<?php _e('Remove from :type price index.', [':type' => $item->type]) ?>'
                                    class='p-2 text-xs rounded btn-danger text-light fw-bold'
                                >
                                    <i class='bi bi-trash-fill'></i>
                                </button> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php if (count($economic->data) == 0) { ?>
            <div class="p-2 h-[300px] flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="<?php _e('No data found') ?>">
            </div>
        <?php } ?>
    </section>

    <?php if (isset($economic->page)) {
        loadHtml(__DIR__ . '/../../../resources/admin/partials/pagination', [
            'page' => $economic->page,
            'count' => $economic->count,
            'next' => $economic->next,
            'prev' => $economic->prev,
            'search' => $economic->search,
        ]);
    } ?>
</section>
