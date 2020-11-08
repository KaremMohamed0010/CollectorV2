<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Acount;
use App\Models\Machine;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\AcountRequest;
use Illuminate\Support\Facades\Redirect;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Auth;


/**
 * Class AcountCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AcountCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }


    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Acount::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/acount');
        CRUD::setEntityNameStrings('acount', 'acounts');
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
                'label' => '#',
                'type'  => 'text',
            ],
            [  
                // any type of relationship
                'name'         => 'Machine', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Machine', // Table column heading
                'attribute' => 'number', // foreign key attribute that is shown to user
            ],
            [  
                // any type of relationship
                'name'         => 'customer', // name of relationship method in the model
                'type'         => 'text',
                'label'        => 'Customer', // Table column heading
                'attribute' => 'number', // foreign key attribute that is shown to user
            ],
            [  
                // any type of relationship
                'name'         => 'debit', // name of relationship method in the model
                'type'         => 'number',
                'label'        => 'Debit', // Table column heading
            ],
            [  
                // any type of relationship
                'name'         => 'credit', // name of relationship method in the model
                'type'         => 'number',
                'label'        => 'Credit', // Table column heading
            ],
            [  
                'name'     => 'created_at',
                'label'    => 'Created',
                'type'     => 'date',
            ],
            [  
                'name'     => 'collector',
                'label'    => 'Collector',
                'type'     => 'text',
            ],
        ]);
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(AcountRequest::class);
        $this->crud->setOperationSetting('contentClass', 'col-md-12 bold-labels');
        $this->crud->addFields([
            [  
                'name'  => 'debit',
                'label' => 'Debit',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],

            ],
            [  
                'name'  => 'credit',
                'label' => 'Credit',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],
            ],
            [   // relationship
                'type' => "relationship",
                'name' => 'machine_id', // the method on your model that defines the relationship
                'label' => "Machine",
                'attribute' => "number", // foreign key attribute that is shown to user (identifiable attribute)
                'placeholder' => "Select a Machine", // placeholder for the select2 input

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


    public function store(Request $request)
    {
      // do something before validation, before save, before everything

      $CustomerMachine=Machine::where('id',$request->machine_id)->first();
      $customer=Customer::where('id', $CustomerMachine->customer_id)->first();
         $user=backpack_user();

      $NewItem= new Acount;
      $NewItem->debit = $request->debit;
      $NewItem->credit = $request->credit;
      $NewItem->customer = $customer->name;
      $NewItem->machine_id = $request->machine_id;
      $NewItem->collector = $user->name;


      $NewItem->save();
      return Redirect::back();
          //   return $NewItem;
    }
}
