<section class='p-3 bg-light mx-0 sm:mx-3 my-3 rounded shadow-sm'>
    <form action='?' method='GET' class='flex items-end gap-2'>
        <div class="w-[120px]">
            <?php loadHtml(__DIR__ . '/../../../resources/partials/form/input-select', [
                'name' => 'column',
                'value' => isset(requests()->column) ? requests()->column : '',
                'attributes' => [
                    'onchange' => "javascript:changeColumn(event)"
                ],
                'options' => [
                    'name' => __('Name'),
                    'description' => __('Description'),
                    'code' => __('Code'),
                    'value' => __('Value'),
                    'condominium' => __('Condominium'),
                    'iptu' => __('IPTU'),
                    'andress' => __('Andress'),
                    'location' => __('Location'),
                    'details' => __('Details'),
                    'status' => __('Status'),
                    'type' => __('Type')
                ],
            ]) ?>
        </div>
        <div class="mb-3">
            <input type='search' class='py-1 px-2 rounded-l border border-divide-gray-500 mr-[-5px]' name='search' placeholder='<?php _e('Search...') ?>' value='<?php echo isset(requests()->search) ? requests()->search : '' ?>'>
            
            <button title="<?php _e('Submit search') ?>" type='submit' class='input-group-text py-1 px-2 btn-primary rounded-r' id='search'>
                <i class='bi bi-search fs-xs'></i>
            </button>
        </div>
    </form>
    <section>
        <div class="relative overflow-x-auto max-w-[2000px] mx-auto mb-4 rounded border">
            <table class="w-full text-left">
                <thead class="text-white uppercase bg-color-main">
                    <tr>
                        <th scope="col" class="!py-1 !px-3">
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
                        <th scope="col" class="!py-1 !px-3">
                            <span class="text-sm"><?php _e('Name') ?></span>
                        </th>
                        <th scope="col" class="!py-1 !px-3">
                            <span class="text-sm"><?php _e('Code') ?></span>
                        </th>
                        <th scope="col" class="!py-1 !px-3">
                            <span class="text-sm"><?php _e('Value') ?></span>
                        </th>
                        <th scope="col" class="!py-1 !px-3">
                            <span class="text-sm"><?php _e('Type') ?></span>
                        </th>
                        <th scope="col" class="!py-1 !px-3">
                            <span class="text-sm"><?php _e('Launch') ?></span>
                        </th>
                        <th scope="col" class="!py-1 !px-3">
                            <span class="text-sm"><?php _e('Highlighted') ?></span>
                        </th>
                        <th scope="col" class="!py-1 !px-3">
                            <span class="text-sm"><?php _e('Status') ?></span>
                        </th>
                        <th scope="col" class="!py-1 !px-3 text-right">
                            <span class="text-sm"><?php _e('Actions') ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($properties->data as $property) { ?>
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="w-4 !py-1 !px-3">
                                <div class="flex items-center">
                                    <input 
                                        value='<?php echo $property->id ?>' 
                                        data-message-delete='<?php _e('This action will remove all selected properties!') ?>'
                                        type='checkbox'
                                        data-button="delete-enable"
                                        id="checkbox-table-search-<?php echo $property->id ?>" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="checkbox-table-search-<?php echo $property->id ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope="row" class="!py-1 !px-3 font-medium text-gray-900 whitespace-nowrap">
                                <span class="text-sm"><?php echo $property->name ?>
                            </td>
                            <td scope="row" class="!py-1 !px-3 font-medium text-gray-900 whitespace-nowrap">
                                <span class="text-sm"><?php echo $property->code ?>
                            </td>
                            <td scope="row" class="!py-1 !px-3 font-medium text-gray-900 whitespace-nowrap">
                                <span class="text-sm">R$ <?php echo number_format($property->value, 2, ',', '.') ?>
                            </td>

                            <td class="py-1 px-3">
                               <span class="text-sm"><?php echo $property->type ?>
                            </td>

                            <td class="py-1 px-3">
                                <span class="rounded text-xs text-light px-2 py-1 bg-<?php echo (is_null($property->is_launch) || $property->is_launch == 'off') ? 'danger' : 'primary' ?>">
                                    <?php echo (is_null($property->is_launch) || $property->is_launch == 'off') ? __('No') : __('Yes') ?>
                                </span>
                            </td>

                            <td class="py-1 px-3">
                                <span class="rounded text-xs text-light px-2 py-1 bg-<?php echo (is_null($property->is_highlighted) || $property->is_highlighted == 'off') ? 'danger' : 'primary' ?>">
                                    <?php echo (is_null($property->is_highlighted) || $property->is_highlighted == 'off') ? __('No') : __('Yes') ?>
                                </span>
                            </td>

                            <td class="py-1 px-3">
                                <span class="rounded text-xs text-light px-2 py-1 bg-<?php echo propertyStatus($property->status, 'colors') ?>">
                                    <?php echo propertyStatus($property->status, 'texts') ?>
                                </span>
                            </td>

                            <td class="flex items-center justify-end !py-1 !px-3 space-x-2 right">
                                <a href="<?php route("/admin/properties/views?property={$property->id}") ?>" title='<?php _e('Number of views of the :name property', [':name' => $property->name]) ?>' class='text-xs p-2 rounded btn-info text-light fw-bold'>
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <a target="_blank" rel="noopener" href="<?php route("/imoveis/{$property->id}") ?>" title='<?php _e('View property :name', [':name' => $property->name]) ?>' class='text-xs p-2 rounded btn-info text-light fw-bold'>
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>

                                <a href="<?php route("/admin/properties/?method=edit&id={$property->id}") ?>" title='<?php _e('Edit property :name', [':name' => $property->name]) ?>' class='text-xs p-2 rounded btn-primary text-light fw-bold'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route='<?php route('/admin/properties/delete') ?>'
                                    data-delete-id='<?php echo $property->id ?>'
                                    data-message-delete='<?php _e('This action will remove the property :name!', [':name' => $property->name]) ?>'
                                    type='button'
                                    title='<?php _e('Remove property :name', [':name' => $property->name]) ?>'
                                    class='p-2 text-xs rounded btn-danger text-light fw-bold'
                                >
                                    <i class='bi bi-trash-fill'></i>
                                </button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>


        <?php if (count($properties->data) == 0) { ?>
            <div class="p-2 h-[300px] flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="<?php _e('No data found') ?>">
            </div>
        <?php } ?>
    </section>

    <?php if (isset($properties->page)) {
        loadHtml(__DIR__ . '/../../../resources/admin/partials/pagination', [
            'page' => $properties->page,
            'count' => $properties->count,
            'next' => $properties->next,
            'prev' => $properties->prev,
            'search' => $properties->search,
        ]);
    } ?>
</section>
