<?php
use App\Models\Category;

function get_category($type){
    return Category::where('type',$type)->get();
}

function delete_file($filename)
{
    \File::delete($filename);
    // unlink($file_path);
}
