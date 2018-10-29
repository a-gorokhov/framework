<?php

class EntryController extends \framework\base\Controller
{
    public function actionIndex()
    {
        $models = Entry::findAll();

        return $this->render('index', [
            'models' => $models,
        ]);
    }

    public function actionView($id)
    {

    }

    public function actionUpdate($id)
    {

    }

    public function actionDelete($id)
    {

    }
}