<?php
        
       $check =  "images\avatar/no-avatar.jpg";
        if (file_exists($check)) {
        echo 'không có gì';
       } else{
        echo 'có';
       }
       $status = unlink("images\avatar/test.txt");
            if ($status){
                echo "File bị xóa thành công!";
            } else {
                echo "Error: File không bị xóa.";
            } 
    
            // @vite(['resources/sass/app.scss', 'resources/js/app.js']) bootstrap
            use App\Models\name;
    ?>
    