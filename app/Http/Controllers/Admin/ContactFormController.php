<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;
use App\TableView\CustomFormTableView;
use Illuminate\Http\Request;
use Laravolt\Suitable\Plugins\Pdf;
use Laravolt\Suitable\Plugins\Spreadsheet;
use Suitable;

class ContactFormController extends Controller
{
    public function index()
    {
        $data = ContactForm::autoFilter()->paginate();
        return (CustomFormTableView::make($data))
            ->plugins([
                new Pdf('users.pdf'),
                new Spreadsheet('users.xls')
            ])
            ->view('admin.contact-form.index');
    }
}
