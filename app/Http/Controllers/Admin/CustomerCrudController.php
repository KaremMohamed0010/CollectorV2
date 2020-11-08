<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomerRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomerCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customer');
        CRUD::setEntityNameStrings('customer', 'customers');
        $this->crud->setShowView('Show.index');

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
                'label'     => 'Customer',
                'orderable' => false,
            ],
            [
                'name'      => 'target',
                'type'      => 'number',
                'label'     => 'Target',
                'orderable' => false,
            ],
            [
                // non-relationship count
                'name'      => 'Machines', // name of relationship method in the model
                'type'      => 'relationship_count', 
                'label'     => 'Machines', // Table column heading
                // OPTIONAL
                'suffix' => '', // to show "123 tags" instead of "123 items"
             ],
            [
                'name'      => 'balance',
                'type'      => 'text',
                'label'     => 'Balance',
            ],
             [  
                // any type of relationship
                'name'         => 'User', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Collector', // Table column heading
                // OPTIONAL
                // 'entity'    => 'tags', // the method that defines the relationship in your Model
                // 'attribute' => 'name', // foreign key attribute that is shown to user
                // 'model'     => App\Models\Category::class, // foreign key model
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
        CRUD::setValidation(CustomerRequest::class);

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
                'name'  => 'trademark',
                'label' => 'Trademark',
                'type'  => 'text',

            ],
            [  
                'name'  => 'district',
                'label' => 'District',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],
            ],
            [  
                'name'  => 'address',
                'label' => 'Address',
                'type'  => 'text',
                'wrapper' => ['class' => 'form-group col-md-6'],
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
            [  
                'name'  => 'target',
                'label' => 'Target',
                'type'  => 'number',
            ],
            [   // relationship
                'type' => "relationship",
                'name' => 'user_id', // the method on your model that defines the relationship
                'label' => "Collector",
                'attribute' => "name", // foreign key attribute that is shown to user (identifiable attribute)
                'placeholder' => "Select a Collector", // placeholder for the select2 input
                'entity' => 'User', // the method that defines the relationship in your Model

                // OPTIONALS:
                // 'attribute' => "name", // foreign key attribute that is shown to user (identifiable attribute)
                // 'model' => "App\Models\Category", // foreign key Eloquent model
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
        $this->crud->set('show.setFromDb', false);
        $this->crud->setOperationSetting('contentClass', 'col-md-12 bold-labels');
        $this->crud->setColumns([
            [
                'name'      => 'name',
                'type'      => 'text',
                'label'     => 'Customer',
            ],
            [  
                'name'  => 'national_id',
                'label' => 'National ID',
                'type'  => 'text',
            ],
            [  
                'name'  => 'mobile_one',
                'label' => 'Mobile 1',
                'type'  => 'phone',
            ],
            [  
                'name'  => 'mobile_two',
                'label' => 'Mobile 2',
                'type'  => 'phone',
            ],
            [  
                'name'  => 'district',
                'label' => 'District',
                'type'  => 'text',
            ],
            [  
                'name'  => 'address',
                'label' => 'Address',
                'type'  => 'text',
            ],
            [  
                'name'  => 'trademark',
                'label' => 'Trademark',
                'type'  => 'text',

            ],
            [
                // non-relationship count
                'name'      => 'Machines', // name of relationship method in the model
                'type'      => 'relationship_count', 
                'label'     => 'Machines', // Table column heading
                // OPTIONAL
                'suffix' => '', // to show "123 tags" instead of "123 items"
             ],
             [
                'name'      => 'target',
                'type'      => 'number',
                'label'     => 'Target',
                'orderable' => false,
            ],
            [
                'name'      => 'balance',
                'type'      => 'text',
                'label'     => 'Balance',
            ],
             [  
                // any type of relationship
                'name'         => 'User', // name of relationship method in the model
                'type'         => 'relationship',
                'label'        => 'Collector', // Table column heading
             ],
        ]);
    }

}
