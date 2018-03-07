<?php

namespace models;


class mainmenu
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
            'uploadxml' => [
                'link' => '/uploadxml/XMLload',
                'name' => 'Загрузка XML',
                'active' => false,
            ],
            'exit' => [
                'link' => '/auth/logout',
                'name' => 'Выйти',
                'active' => false,
            ],
        ];
    }
}