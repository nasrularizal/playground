<?php

namespace App\TableView;

use Laravolt\Suitable\Columns\Text;
use Laravolt\Suitable\TableView;

class CustomFormTableView extends TableView
{
    protected function columns()
    {
        return [
            Text::make('id')->sortable()->searchable(),
            Text::make('name')->sortable()->searchable(),
            Text::make('email')->sortable()->searchable(),
            Text::make('kategori')->sortable()->searchable(),
            Text::make('message')->sortable()->searchable(),
        ];
    }
}
