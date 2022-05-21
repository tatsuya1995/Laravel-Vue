<?php



return [
    'ageRange' => [
        ['id' => 0, 'value' =>'未選択', 'range' => ''],
        ['id' => 1, 'value' =>'10代', 'range' => [10, 19]],
        ['id' => 2, 'value' =>'20代', 'range' => [20, 29]],
        ['id' => 3, 'value' =>'30代', 'range' => [30, 39]],
        ['id' => 4, 'value' =>'40代', 'range' => [40, 49]],
        ['id' => 5, 'value' =>'50代', 'range' => [50, 59]],
        ['id' => 6, 'value' =>'60代', 'range' => [60, 69]],
        ['id' => 7, 'value' =>'70代', 'range' => [70, 79]],
        ['id' => 8, 'value' =>'80代', 'range' => [80, 89]],
    ],
    'sortValue' => [
        ['id' => 0, 'value' =>'更新日が最新', 'sort' => 'updated_at'],  
        ['id' => 1, 'value' =>'星が多い順', 'sort' => 'star'],
    ]
];
