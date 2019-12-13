<?php
function image_uploader($data) {
    $extensionMap = [
        'image/gif' => '.gif'
    ];
    $target_dir = BASEPATH . '/public/img/postsImg/';
    $info = pathinfo($_FILES['image']['name']);
    $ext = $info['extension'];
    $size = $_FILES['image']['size'];
    
    if($_FILES['image']['size'] > 5000000) {
        $data['img_error'] = 'Max file size must be 5MB and it must be a .jpg, .png, .jpeg or .gif';
    }
    //!isset($extensionMap[$_FILES['image']['type']])
    if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png' && $ext != 'gif') {
        $data['img_error'] = 'Max file size must be 5MB and it must be a .jpg, .png, .jpeg or .gif';
    }
    if (empty($data['img_error'])) {
        $saveName = (time() + random_int(0, PHP_INT_MAX)) . '.' . $ext;
        $files = glob($target_dit . '*.*');
        //[];
        $files = array_diff(scandir($target_dir), array('..', '.'));
        $check_duplicates = false;

        foreach ($files as $file) {
           if (md5(file_get_contents($target_dir . $file)) == md5(file_get_contents($_FILES['image']['tmp_name']))) {
               $data['img_saveName'] = basename($file);
               $data['img_originalName'] = basename($_FILES['image']['name']);
               $check_duplicates = true;
               break;
           }
        }
        if (!$check_duplicates) {
            $target_file = $target_dir . $saveName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $data['img_saveName'] = $saveName;
                $data['img_originalName'] = basename($_FILES['image']['name']);
            } else {
                $data['img_error'] = 'Sorry problem occurred while saving your file';
            }    
        }
    }
    return $data;
}