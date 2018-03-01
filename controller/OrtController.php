<?php
require_once '../repository/KontaktRepository.php';
require_once '../repository/OrtRepository.php';

class OrtController
{
    public function index()
    {
        $ortRepository = new OrtRepository();
        $view = new View('ort_index');
        $view->title = 'Orttliste';
        $view->heading = 'Ortliste';
        $view->orte = $ortRepository->readAll();
        $view->display();
    }

    public function create()
    {
        $kontaktRepository = new KontaktRepository();
        $ortRepository = new OrtRepository();
        $view = new View('ort_create');
        $view->title = 'Ort erfassen';
        $view->heading = 'Ort erfassen';
        $view->orte = $ortRepository->readAll();
        $view->display();
    }
}