<?php echo var_dump($image_metadata);?>
        <h3>Congratulations, the image has successfully been uploaded</h3>
        <p>Click here to view the image you just uploaded
            <?php echo anchor('./assets/images/'.$image_metadata['file_name'], 'View My Image!')?>
        </p>

        <p>
            <?php echo anchor('Image', 'Go back to Image Upload'); ?>
        </p>