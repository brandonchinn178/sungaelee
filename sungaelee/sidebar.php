<?php
$image = get_field('image');
if (!empty($image)): ?>
    <div class="sidebar">
        <img src="<?php echo $image['url']; ?>">
    </div>
<?php endif; ?>