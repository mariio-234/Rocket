<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;


class NewsLetterController extends Controller
{
    public function createNewsletter(){
        return response()->json('Creacion de una newsletter');
    }

    public function removeNewsletter(){
        return response()->json('Eliminar una newsletter');
    }

    public function ActiveNewsletterEachSex(){
        return response()->json(Newsletter::ActiveNewsletterEachSex()->get());
    }
}
