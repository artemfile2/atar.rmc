<?php

namespace Models;


class MainMenu
{
    public function Menu(){
        return $menu = [
            'index_list' => [
                'link' => '/filial/all',
                'name' =>'Тарификационный список',
                'active' => false,
            ],
            'employees' => [
                'link' => '/strax/all',
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