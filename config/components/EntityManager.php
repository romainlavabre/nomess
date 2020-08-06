<?php
/*
     _______________________________________
    |                                       |
    | Map your entity that you want cached  |
    | Sample: App\Entities\Product::class,  |
    |_______________________________________|
 */
return [
    'enable' => FALSE, // Disabled for development context
    'life_time' => 60 * 60 * 6 // 6h
];
