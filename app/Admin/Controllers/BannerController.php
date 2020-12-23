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
        $grid->column('site', __('Site'))->label('success');
        $grid->column('image', __('Image'))->image();
        $grid->column('url', __('Url'))->link();
        $grid->column('state', __('State'))->bool();
        $grid->column('created_at', __('Created_at'))->date('Y-m-d');
        $grid->column('updated_at', __('Updatetime'))->date('Y-m-d');

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
        $show->field('site', __('Site'))->label('success');
        $show->field('image', __('Image'))->image();
        $show->field('url', __('Url'))->link();
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
        $form->text('title', __('Title'));
        $form->checkbox('site')->options([1 => '发现页 banner', 2 => '线路页 banner',3 => '发现页 icon']);
        $form->image('image', __('Image'));
        $form->url('url', __('Url'));
        $states = [
            'on'  => ['value' => 1, 'text' => '启用', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => '禁用', 'color' => 'danger'],
        ];
        $form->switch('state')->states($states);

        return $form;
    }
}
