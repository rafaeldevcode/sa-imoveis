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
                            <span class="text-sm"><?php _e('Avatar') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Name') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Email') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3">
                            <span class="text-sm"><?php _e('Status') ?></span>
                        </th>
                        <th scope="col" class="py-1 px-3 text-right">
                            <span class="text-sm"><?php _e('Actions') ?></span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users->data as $user) { ?>
                        <tr class="bg-white border-b hover:bg-gray-100 text-gray-900">
                            <td class="w-4 py-1 px-3">
                                <div class="flex items-center">
                                    <input 
                                        value='<?php echo $user->id ?>' 
                                        data-message-delete='<?php _e('This action will remove all selected users!') ?>'
                                        type='checkbox'
                                        data-button="delete-enable"
                                        id="checkbox-table-search-<?php echo $user->id ?>" 
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                    >
                                    <label for="checkbox-table-search-<?php echo $user->id ?>" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td scope='row' class="py-1 px-3">
                                <div class='user w-[45px] h-[45px]'>
                                    <?php loadHtml(__DIR__ . '/../../../resources/partials/image', [
                                        'id' => $user->avatar,
                                        'alt' => $user->name,
                                        'class' => 'w-full rounded-full',
                                    ]) ?>
                                </div>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $user->name ?></span>
                            </td>
                            <td scope="row" class="py-1 px-3 whitespace-nowrap">
                                <span class="text-sm"><?php echo $user->email ?></span>
                            </td>
                            <td class="py-1 px-3">
                                <span class="rounded text-xs text-light px-2 py-1 bg-<?php echo (is_null($user->status) || $user->status == 'off') ? 'danger' : 'primary' ?>">
                                    <?php echo (is_null($user->status) || $user->status == 'off') ? __('Inactive') : __('Active') ?>
                                </span>
                            </td>
                            <td class="flex items-center justify-end py-1 px-3 space-x-2 right">
                                <a href="<?php route("/admin/users/?method=edit&id={$user->id}") ?>" title='<?php _e('Edit user :name.', [':name' => $user->name]) ?>' class='text-xs p-2 rounded btn-primary text-light fw-bold'>
                                    <i class='bi bi-pencil-square'></i>
                                </a>

                                <button
                                    data-button="delete"
                                    data-route='<?php route('/admin/users/delete') ?>'
                                    data-delete-id='<?php echo $user->id ?>'
                                    data-message-delete='<?php _e('This action will remove the user :name.', [':name' => $user->name]) ?>'
                                    type='button'
                                    title='<?php _e('Remove user :name.', [':name' => $user->name]) ?>'
                                    class='p-2 text-xs rounded btn-danger text-light fw-bold'
                                >
                                    <i class='bi bi-trash-fill'></i>
                                </button>

                                <form action="<?php route('/login/logout') ?>" method="POST" class="m-1 d-inline">
                                    <input type="hidden" name="id" value="<?php echo $user->id ?>">
                                    <button
                                        type='submit'
                                        title='<?php _e('Log out user :name.', [':name' => $user->name]) ?>'
                                        class='p-2 text-xs rounded cursor-pointer btn-<?php echo (!in_array($user->id, $ids) || $user->id === $_COOKIE['user_id']) ? 'secondary' : 'info' ?> text-light'
                                        <?php echo (!in_array($user->id, $ids) || $user->id === $_COOKIE['user_id']) ? 'disabled' : '' ?>
                                    >
                                        <i class="bi bi-box-arrow-right"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <?php if (count($users->data) == 0) { ?>
            <div class="p-2 h-[300px] flex justify-center items-center">
                <img class="h-full" src="<?php asset('assets/images/empty.svg') ?>" alt="<?php _e('No data found') ?>">
            </div>
        <?php } ?>
    </section>

    <?php if (isset($users->page)) {
        loadHtml(__DIR__ . '/../../../resources/admin/partials/pagination', [
            'page' => $users->page,
            'count' => $users->count,
            'next' => $users->next,
            'prev' => $users->prev,
            'search' => $users->search,
        ]);
    } ?>
</section>
