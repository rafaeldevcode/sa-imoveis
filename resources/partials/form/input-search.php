<?php
$attr = null;

if (isset($attributes)) {
    if (is_array($attributes)) {
        foreach ($attributes as $indice => $attribute) {
            $attr .= "{$indice}={$attribute} ";
        };
    } else {
        $attr = $attributes;
    };
};
?>

<form action='?' method='GET' class='input-group'>
    <input type='search' class='py-1 px-2 rounded-l border border-divide-gray-500 mr-[-5px]' name='search' placeholder='<?php _e('Search...') ?>' value='<?php echo isset(requests()->search) ? requests()->search : '' ?>' <?php echo $attr ?>>
    
    <button title="<?php _e('Submit search') ?>" type='submit' class='input-group-text py-1 px-2 btn-primary rounded-r' id='search'>
        <i class='bi bi-search fs-xs'></i>
    </button>
</form>
