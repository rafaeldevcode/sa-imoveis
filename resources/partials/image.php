<?php
use Src\Models\Gallery;

$id = isset($id) ? $id : 0;
$gallery = new Gallery();
$thumbnail = $gallery->find($id);

$attr = '';

if(isset($attributes)):
    foreach($attributes as $indice => $attribute):
        $attr .= "{$indice}={$attribute} ";
    endforeach;
endif;
?>

<?php if($thumbnail->data) {
    if ($thumbnail->data->type == 1) {?>
        <img 
            class="<?php echo isset($class) ? $class : '' ?>" 
            src="<?php asset("assets/images/{$thumbnail->data->file}") ?>" 
            alt="<?php echo $alt ?>"
            width="<?php echo isset($width) ? $width : '' ?>"
            height="<?php echo isset($height) ? $height : '' ?>"
        >
    <?php } else { ?>
        <video 
            class="<?php echo isset($class) ? $class : '' ?>" 
            src="<?php asset("assets/images/{$thumbnail->data->file}") ?>" 
            width="<?php echo isset($width) ? $width : '' ?>"
            height="<?php echo isset($height) ? $height : '' ?>"
            <?php echo $attr ?>
        >
    <?php }
    } ?>
