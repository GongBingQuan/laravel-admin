<?php

namespace App\Admin\Controllers;

use App\Models\Banner;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BannerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Banner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Banner());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('site', __('Site'));
        $grid->column('image', __('Image'));
        $grid->column('state', __('State'));
        $grid->column('created_at', __('Created_at'));
        $grid->column('updated_at', __('Updatetime'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Banner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('site', __('Site'));
        $show->field('image', __('Image'));
        $show->field('state', __('State'));
        $show->field('created_at', __('Created_at'));
        $show->field('updated_at', __('Updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Banner());
        $form->saving(function (Form $form) {

            dump($form->site);
        
        });
        $form->text('title', __('Title'));
        $form->text('site', __('Site'));
        // $form->checkbox('site')->checkbox([0 => '发现页', 1 => '线路页']);
        $form->multipleImage('image', __('Image'));
        $states = [
            'on'  => ['value' => 1, 'text' => '启用', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '禁用', 'color' => 'danger'],
        ];
        $form->switch('state')->states($states);

        return $form;
    }
}
