<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        $grid->column('id', __('Id'));
        $grid->column('admin_id', __('Admin id'));
        $grid->column('title', __('Title'));
        $grid->column('content', __('Content'));
        $grid->column('files', __('Files'));
        $grid->column('state', __('State'));
        
        $grid->column('browse_count', __('Browse count'));
        $grid->column('like_count', __('Like count'));
        $grid->column('createtime', __('Createtime'))->date('Y-m-d');
        $grid->column('updatetime', __('Updatetime'))->date('Y-m-d');

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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('admin_id', __('Admin id'));
        $show->field('title', __('Title'));
        $show->field('content', __('Content'));
        $show->field('files', __('Files'));
        $show->field('state', __('State'));
        
        $show->field('browse_count', __('Browse count'));
        $show->field('like_count', __('Like count'));
        $show->field('createtime', __('Createtime'));
        $show->field('updatetime', __('Updatetime'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());

        $form->text('title', __('Title'));
        $form->ckeditor('content', __('Content'));
        $form->text('files', __('Files'));
        $form->text('state', __('State'));
        
        $form->number('browse_count', __('Browse count'));
        $form->number('like_count', __('Like count'));

        return $form;
    }
}
