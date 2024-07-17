<select name="symbol">
    <?php foreach ($stocks as $stock) : ?>
        <option value='<?php echo $stock->get_symbol() ?>'><?php echo $stock->get_name() ?></option>
    <?php endforeach; ?>
</select>