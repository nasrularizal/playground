<?php

namespace App\Http\Controllers;

use App\Events\ContactFormSubmitted;
use App\Http\Requests\ContactForm\Store;
use App\Models\ContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    public function create()
    {
        $category = [
            'Kerusakan Fasilitas Umum' => 'Kerusakan Fasilitas Umum',
            'Pungutan Liar' => 'Pungutan Liar',
            'Pelayanan Publik' => 'Pelayanan Publik'
        ];
        return view('contact-form.create', compact('category'));
    }

    public function store(Store $request)
    {
        $insert = ContactForm::create($request->validated());

        if ($insert) {
            event(new ContactFormSubmitted($insert));
            return redirect()->back()->withSuccess('Pesan telah diterima dan menunggu tindak lanjut.');
        } else {
            return redirect()->back()->withError('Maaf, Gagal Menyimpan');
        }

    }
}
