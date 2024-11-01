<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{

    /**
     * Handle the incoming request to display the contacts.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */

    public function __invoke(Request $request)
    {
        $contacts = Contact::paginate(10);

        return view('Admin.Contact.index', compact('contacts'));
    }
}
