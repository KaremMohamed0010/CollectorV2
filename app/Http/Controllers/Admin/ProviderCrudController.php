<?php

namespace App\Http\Controllers\Admin;

use App\Models\Provider;
use App\Http\Requests\ProviderRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProviderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProviderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    // use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\User::class);
        $this->crud->addClause('where', 'is_provider', '=', '1');
        CRUD::setRoute(config('backpack.base.route_prefix') . '/provider');
        CRUD::setEntityNameStrings('provider', 'Providers list');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
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
                'name'      => 'balance',
                'type'      => 'text',
                'label'     => 'Balance',
            ]
        ]);
        $this->crud->addButtonFromModelFunction('line', 'open_recive', 'openReceive', 'beginning');
        $this->crud->addButtonFromModelFunction('line', 'open_pay', 'openPay', 'beginning');


    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProviderRequest::class);

        $this->crud->setOperationSetting('contentClass', 'col-md-12 bold-labels');
        $this->crud->addFields([
            [  
                'name'  => 'name',
                'label' => 'Name',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],

            ],
            [  
                'name'  => 'national_id',
                'label' => 'National ID',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],

            ],
            [  
                'name'  => 'address',
                'label' => 'Address',
                'type'  => 'text',
            ],
            [  
                'name'  => 'mobile_one',
                'label' => 'Mobile 1',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],
            ],
            [  
                'name'  => 'mobile_two',
                'label' => 'Mobile 2',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],
            ],
        ]);

        $this->crud->addField([
            'name'  => 'is_provider', 
            'type'  => 'hidden', 
            'value' => '1',
        ]);
        $this->crud->addField([
            'name'  => 'balance', 
            'type'  => 'hidden', 
            'value' => '0',
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

    

    // public function CreateRecive($id)
    // {
    //     $user=Provider::where('id',$id)->first();
    //     return View::make('Show.ProvidersRecive', compact(['Provider']));
    // }

    // public function StoreRecive(Request $request)
    // {
    //     // $resp=$request->all();
    //     // dd($resp);
    //     $UpdateItem= Provider::find(request('user_id'));
    //     $UpdateItem->balance = request('amount');
    //     $UpdateItem->save();
    //     \Alert::add('success', '<strong>Got it</strong><br>Done.');
    //     return redirect()->back();
    // }


}
