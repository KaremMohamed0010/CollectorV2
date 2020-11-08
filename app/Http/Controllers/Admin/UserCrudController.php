<?php

namespace App\Http\Controllers\Admin;

use View;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Prologue\Alerts\Facades\Alert;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Redirect;




/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }


    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        $this->crud->addClause('where', 'is_provider', '=', '0');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');

    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::setFromDb(); // columns

        $this->crud->setColumns([
            [  
                'name'  => 'id',
                'label' => 'ID',
                'type'  => 'number',

            ],
            [
                'name'      => 'name',
                'type'      => 'text',
                'label'     => 'Name',
                'orderable' => false,
            ],
            [
                // non-relationship count
                'name'      => 'Customer', // name of relationship method in the model
                'type'      => 'relationship_count', 
                'label'     => 'Customers', // Table column heading
                // OPTIONAL
                'suffix' => '', // to show "123 tags" instead of "123 items"
            ],
            [
                'name'  => 'type_id',
                'label' => 'Permission',
                'type'  => 'boolean',
                'options' => [0 => 'Collector', 1 => 'Administrator']
            ],

        ]);

        $this->crud->addButtonFromModelFunction('line', 'open_google', 'openReceive', 'beginning');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        $this->crud->setOperationSetting('contentClass', 'col-md-12 bold-labels');
        $this->crud->addFields([
            [  
                'name'  => 'name',
                'label' => 'Name',
                'type'  => 'text',
            ],
            [  
                'name'  => 'password',
                'label' => 'Password',
                'type'  => 'password',
            ],
            [  
                'name'  => 'email',
                'label' => 'Email',
                'type'  => 'email',
            ],
            [   // radio
                'name'        => 'type_id', // the name of the db column
                'label'       => 'Type', // the input label
                'type'        => 'radio',
                'options'     => [
                    // the key will be stored in the db, the value will be shown as label; 
                    0 => "Collector",
                    1 => "Administrator"
                ],
                'inline'      => true, // show the radios all on the same line?
            ],
        ]);
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    // public function store()
    // {
    //     $this->crud->request = $this->crud->validateRequest();

    //     // Encrypt password if specified.
    //     if ($request->input('password')) {
    //         $request->request->set('pa  ssword', Hash::make($request->input('password')));
    //     } else {
    //         $request->request->remove('password');
    //     }

    //     return $this->traitStore();
    // }

    public function CreateRecive($id)
    {
        $user=User::where('id',$id)->first();
        return View::make('Show.recive', compact(['user']));
    }

    public function StoreRecive(Request $request)
    {
        User::where('id', request('user_id'))->decrement('balance', request('amount'));

        \Alert::add('success', '<strong>Got it</strong><br>Done.');
        $url = 'http://phplaravel-421479-1568723.cloudwaysapps.com/admin/provider';
        // redirects to http://localhost:8888/www.google.com
        return Redirect::to($url);
    }

    public function CreatePay($id)
    {
        $user=User::where('id',$id)->first();
        return View::make('Show.recive', compact(['user']));
    }

    public function StorePay(Request $request)
    {

        User::where('id', request('user_id'))->decrement('balance', request('amount'));

        // $UpdateItem= User::find(request('user_id'));

        // $UpdateItem->balance = $UpdateItem->balance + request('amount');
        // $UpdateItem->save();
        \Alert::add('success', '<strong>Got it</strong><br>Done.');
        $url = 'http://phplaravel-421479-1568723.cloudwaysapps.com/admin/provider';
        // redirects to http://localhost:8888/www.google.com
        return Redirect::to($url);
    }

}
