{{-- Functions --}}
@php

if (!function_exists('set_breadcrumb')) {
    function set_breadcrumb($page_name, $category_name) {
       echo '<li class="breadcrumb-item"><a href="javascript:void(0);"> jess </a></li>
       <li class="breadcrumb-item active" aria-current="page"><span>Home</span></li>';
    }
}

if (!function_exists('scrollspy')) {
    function scrollspy($offset) {
        echo 'data-target="#navSection" data-spy="scroll" data-offset="'. $offset . '"';
    }
}

@endphp
