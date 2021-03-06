<?php namespace Ahorak\Todo\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Octobro\API\Classes\ApiController;

class Todo extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('Ahorak.Todo', 'todo-menu');
    }
}
