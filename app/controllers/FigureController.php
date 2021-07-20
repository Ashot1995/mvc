<?php


class FigureController extends Controller
{
    public function indexAction()
    {
        $this->view->mess = "Hello index";
    }

    public function resultAction()
    {
        $request = $this->getRequest()->getAllParams();
        $this->view->params = json_encode($request);
    }
}
