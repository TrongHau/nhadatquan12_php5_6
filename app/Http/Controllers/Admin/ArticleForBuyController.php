<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
// VALIDATION: change the requests to match your own file names if you need form validation
use Backpack\CRUD\app\Http\Requests\CrudRequest as StoreRequest;
use Backpack\CRUD\app\Http\Requests\CrudRequest as UpdateRequest;
use App\User;
use App\Models\ArticleForLeaseModel;
use App\Models\ArticleForBuyModel;
use App\Models\TypeModel;
use Storage;
use App\Library\Helpers;

class ArticleForBuyController extends CrudController
{
    public function __construct()
    {
        parent::__construct();


    }
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel("App\Models\ArticleForBuyModel");
        $this->crud->setRoute(config('backpack.base.route_prefix', 'admin').'/article_for_buy');
        $this->crud->setEntityNameStrings('article_for_lease', 'Tin rao cần mua, cần cho thuê đất');
        $this->crud->orderBy('id', 'desc');

        $this->crud->denyAccess(['create']);
        $this->crud->enableBulkActions();
        $this->crud->addBulkDeleteButton();

        $this->crud->addFilter([ // daterange filter
            'type' => 'date_range',
            'name' => 'from_to',
            'label'=> 'Hiển thị theo thời gian'
        ],
            false,
            function($value) {
                $dates = json_decode(htmlspecialchars_decode($value, ENT_QUOTES));
                $this->crud->addClause('whereDate', 'created_at', '>=', $dates->from);
                $this->crud->addClause('whereDate', 'created_at', '<=', $dates->to);
            });
        $this->crud->addFilter([ // select2_multiple filter
            'name' => 'method_article',
            'type' => 'dropdown',
            'label'=> 'Phương thức',
            'placeholder' => 'Tìm Danh mục tin tức'
        ], [
            'Nhà đất cần mua' => 'Nhà đất cần mua',
            'Nhà đất cần thuê' => 'Nhà đất cần thuê'
        ], function ($values) {
            if (!empty($values)) {
                $this->crud->addClause('where', 'method_article', $values);
            }
        });

        $this->crud->addFilter([ // select2_multiple filter
            'name' => 'type_article',
            'type' => 'select2_multiple',
            'label'=> 'Danh mục',
            'placeholder' => 'Tìm Danh mục tin tức'
        ], function () {
            return TypeModel::orderBy('name')->where('id', '>=', 20)->pluck('name', 'name')->toArray();
        }, function ($values) {
            $values = json_decode(htmlspecialchars_decode($values, ENT_QUOTES));
            if (!empty($values)) {
                $this->crud->addClause('whereIn', 'type_article', $values);
            }
        });



        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */

        // ------ CRUD COLUMNS
//        $this->crud->addColumn([
//                                'name' => 'created_at',
//                                'label' => 'Date',
//                                'type' => 'date',
//        ]);
        $this->crud->addColumn([
            'name'  => 'id',
            'label' => 'ID',
            'type' => 'closure',
            'function' => function($entry) {
                return '<a href="/quan-ly-tin/dang-tin-can-mua-can-thue/'.$entry->id.'" target="_blank">'.$entry->id.'</a>';
            },
        ]);


        $this->crud->addColumn([
            'name' => 'created_at',
            'label' => 'Ngày tạo',
            'type' => 'closure',
            'function' => function($entry) {
                return '<a href="/'.$entry->prefix_url.'-bds-'.$entry->id.'" target="_blank">'.date_format(date_create($entry->created_at),"d-m-Y").'</a>';
            },
        ]);

        $this->crud->addColumn([
            'name' => 'title',
            'label' => 'Tiêu đề',
        ]);

        $this->crud->addColumn([
            'name' => 'type_article',
            'label' => 'Thể loại',
        ]);
        $this->crud->addColumn([
            'name' => 'status',
            'label' => 'Xét duyệt',
            'type' => 'check',
        ]);
        $this->crud->addColumn([
            'name' => 'views',
            'label' => 'Lượt xem',
            'type' => 'number',
        ]);
        $this->crud->addColumn([
            'name' => 'address',
            'label' => 'Địa chỉ',
        ]);
        $this->crud->addColumn([
            'name' => 'contact_name',
            'label' => 'Liên lạc',
        ]);
        $this->crud->addColumn([
            'name' => 'project',
            'label' => 'Dự án'
        ]);
        $this->crud->addColumn([
            'name' => 'aprroval',
            'label' => 'Tình trạng'
        ]);

        $this->crud->addColumn([
            'name' => 'contact_address',
            'label' => 'Địa chỉ liên lạc'
        ]);

        $this->crud->addColumn([
            'name' => 'contact_phone',
            'label' => 'Sđt liên lạc'
        ]);

        $this->crud->addColumn([
            'name' => 'contact_email',
            'label' => 'Email liên lạc'
        ]);

        $this->crud->addColumn([
            'name' => 'area',
            'label' => 'Diện tích'
        ]);

        $this->crud->addColumn([
            'name' => 'price_real',
            'label' => 'Giá',
            'type' => 'number'
        ]);
        $this->crud->addColumn([
            'name' => 'point',
            'label' => 'Điểm',
            'type' => 'number'
        ]);






        // ------ CRUD FIELDS
        $this->crud->addField([    // TEXT
            'name' => 'title',
            'label' => 'Tiêu đề',
            'type' => 'text',
            'placeholder' => 'Nhập tiêu đề tin tức',
        ]);
        $this->crud->addField([
            'name' => 'content_article',
            'label' => 'Thông tin mô tả',
            'type' => 'textarea',
        ]);
        $this->crud->addField([    // CHECKBOX
            'name' => 'status',
            'label' => 'Tình trạng',
            'type' => 'checkbox',
        ]);

        $this->crud->enableAjaxTable();
    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
    public function edit($id, $template = false)
    {
        $this->crud->hasAccessOrFail('update');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ? $this->crud->getCurrentEntryId() : $id;

        // get the info for that entry
        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;
        $this->data['saveAction'] = $this->getSaveAction();
        $this->data['fields'] = $this->crud->getUpdateFields($id);
        $this->data['title'] = trans('backpack::crud.edit').' '.$this->crud->entity_name;
        $this->data['id'] = $id;

        return view('vendor.backpack.article.edit_for_buy', $this->data);
    }
    public function destroy($id)
    {
        $this->crud->hasAccessOrFail('delete');

        // get entry ID from Request (makes sure its the last ID for nested resources)
        $id = $this->crud->getCurrentEntryId() ? $this->crud->getCurrentEntryId() : $id;
        $article = $this->crud->getModel()::where('id', $id)->first();
        if($article->gallery_image) {
            foreach (json_decode($article->gallery_image) as $item) {
                Storage::delete('public/' . Helpers::file_path($id, SOURCE_DATA_ARTICLE_BUY, true) . $item);
            }
        }
        return $this->crud->delete($id);
    }
}
