<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExtraController extends Controller
{
    public function extraAction(Request $request, $parameter)
    {
        return new Response($parameter);
    }

}
