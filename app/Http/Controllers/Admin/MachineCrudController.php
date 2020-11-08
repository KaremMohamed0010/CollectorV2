<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MachineRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class MachineCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class MachineCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Machine::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/machine');
        CRUD::setEntityNameStrings('machine', 'Machines list');
        // $this->crud->setShowView('Show.machine');

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
                'type'  => 'number',

            ],
            [
                'name'      => 'number',
                'type'      => 'text',
                'label'     => 'Number',
                'orderable' => false,
            ],
            [
                'name'      => 'type',
                'type'      => 'text',
                'label'     => 'Type',
                'orderable' => false,
            ],
            [
                'name'      => 'ownership',
                'type'      => 'text',
                'label'     => 'ownership',
                'orderable' => false,
            ],
            [
                'name'      => 'target',
                'type'      => 'text',
                'label'     => 'Target',
                'orderable' => false,
            ],
            [
                'name'      => 'Customer.name',
                'type'      => 'text',
                'label'     => 'Customer',
                'orderable' => false,
            ],
            [
                'name'      => 'Customer.balance',
                'type'      => 'text',
                'label'     => 'Balance',
                'orderable' => false,
            ],
        ]);

        $this->crud->addFilter([
            'type'  => 'date_range',
            'name'  => 'created_at',
            'label' => 'Date range'
          ],
          false,
          function ($value) { // if the filter is active, apply these constraints
            // $dates = json_decode($value);
            // $this->crud->addClause('where', 'date', '>=', $dates->from);
            // $this->crud->addClause('where', 'date', '<=', $dates->to . ' 23:59:59');
        });
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(MachineRequest::class);

        $this->crud->setOperationSetting('contentClass', 'col-md-12 bold-labels');
        $this->crud->addFields([
            [  
                'name'  => 'number',
                'label' => 'Number',
                'type'  => 'text',

            ],
            [  
                'name'  => 'type',
                'label' => 'Type',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],

            ],
            [  
                'name'  => 'ownership',
                'label' => 'Owner ship',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],


            ],
            [  
                'name'  => 'target',
                'label' => 'Target',
                'type'  => 'number',
                'wrapper' => ['class' => 'form-group col-md-6'],
            ],
            [   // relationship
                'type' => "relationship",
                'name' => 'customer_id', // the method on your model that defines the relationship
                'label' => "Customer",
                'attribute' => "name", // foreign key attribute that is shown to user (identifiable attribute)
                'placeholder' => "Select a Customer", // placeholder for the select2 input
                'entity' => 'Customer', // the method that defines the relationship in your Model

                // OPTIONALS:
                // 'attribute' => "name", // foreign key attribute that is shown to user (identifiable attribute)
                // 'model' => "App\Models\Category", // foreign key Eloquent model
                'wrapper' => ['class' => 'form-group col-md-6'],

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

    protected function setupShowOperation()
    {
        $this->crud->setOperationSetting('contentClass', 'col-md-12 bold-labels');

        $this->crud->set('show.setFromDb', false);
        $this->crud->setColumns([
            [  
                'name'  => 'id',
                'label' => '#',
                'type'  => 'number',

            ],
            [
                'name'      => 'number',
                'type'      => 'text',
                'label'     => 'Number',
                'orderable' => false,
            ],
            [
                'name'      => 'type',
                'type'      => 'text',
                'label'     => 'Type',
                'orderable' => false,
            ],
            [
                'name'      => 'ownership',
                'type'      => 'text',
                'label'     => 'ownership',
                'orderable' => false,
            ],
            [
                'name'      => 'target',
                'type'      => 'text',
                'label'     => 'Target',
                'orderable' => false,
            ],
            [
                'name'      => 'Customer.name',
                'type'      => 'text',
                'label'     => 'Customer',
                'orderable' => false,
            ],
            [
                'name'      => 'Customer.balance',
                'type'      => 'text',
                'label'     => 'Balance',
                'orderable' => false,
            ],
        ]);

    }


}
