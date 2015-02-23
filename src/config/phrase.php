<?php

return [
    'can_edit' => function() {
        RoomsHotels\Http\Controllers\Dedit\AuthManagerController::check();
    },
    'is_editable_mode_on' => function() {
        return isset($_COOKIE['editing_mode']) && $_COOKIE['editing_mode'] === "false" ? false : true;
    },
    'white_list' => [
        'Phrase' => ['value'],
        'User' => ['email'],
    ],
];