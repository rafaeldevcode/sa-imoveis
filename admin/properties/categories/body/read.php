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
                            <span class="text-sm"><?php _e('Name') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Slug') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3 text-right">
                            <span class="text-sm"><?php _e('Actions') ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories->data as $category) { ?>
                        <tr class="bg-white border-b hover:bg-gray-100 text-gray-900">
                            <td class="w-4 py-1 px-3">
                                <div class="flex items-center">
                                    <input 
                                        value='<?php echo $category->id ?>' 
                                        data-message-delete='<?php _e('This action will remove all selected categories!') ?>'
                                        type='checkbox'
                                        data-button="delete-enable"
                                        id="checkbox-table-search-<?php echo $category->id ?>" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="checkbox-table-search-<?php echo $category->id ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $category->name ?></span>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $category->slug ?></span>
                            </td>
                            <td class="flex items-center justify-end py-1 px-3 space-x-2 right">
                                <a target="_blank" rel="noopener" href="<?php route("/imoveis/categoria/{$category->slug}") ?>" title='<?php _e('View category :name', [':name' => $category->name]) ?>' class='text-xs p-2 rounded btn-info text-light fw-bold'>
                                    <i class="bi bi-eye-fill"></i>
                                </a>

                                <a href="<?php route("/admin/properties/categories/?method=edit&id={$category->id}") ?>" title='<?php _e('Edit category :name.', [':name' => $category->name]) ?>' class='text-xs p-2 rounded btn-primary text-light fw-bold'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route='<?php route('/admin/properties/categories/delete') ?>'
                                    data-delete-id='<?php echo $category->id ?>'
                                    data-message-delete='<?php _e('This action will remove the category :name.', [':name' => $category->name]) ?>'
                                    type='button'
                                    title='<?php _e('Remove category :name.', [':name' => $category->name]) ?>'
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

        <?php if (count($categories->data) == 0) { ?>
            <div class="p-2 h-[300px] flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="<?php _e('No data found') ?>">
            </div>
        <?php } ?>
    </section>

    <?php if (isset($categories->page)) {
        loadHtml(__DIR__ . '/../../../../resources/admin/partials/pagination', [
            'page' => $categories->page,
            'count' => $categories->count,
            'next' => $categories->next,
            'prev' => $categories->prev,
            'search' => $categories->search,
        ]);
    } ?>
</section>
