<?php

namespace Models;


class MainMenu
{
    public function Menu(){
        return $menu = [
            'index_list' => [
                'name' =>'Тарификационный список',
                'active' => false,
            ],
            'employees' => [
                'name' => 'Сотрудники',
                'active' => false,
            ],
            'reference' => [
                'name' => 'Справочники',
                'active' => false,
            ],
            'about' => [
                'name' => 'О программе',
                'active' => false,
            ],
        ];
    }
}