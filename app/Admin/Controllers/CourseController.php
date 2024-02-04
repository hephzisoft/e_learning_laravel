<?php

namespace App\Admin\Controllers;

use App\Models\Course;
use App\Models\CourseType;
use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Tree;

class CourseController extends AdminController{

   
    protected function grid()
    {
        $grid = new Grid(new Course());

        $grid->column('id', __('Id'));

        // 
        $grid->column('user_token', __('Teacher'))->display(function($token) {
                // Futher processing date
                
        });
        $grid->column('name', __('Name'));
        $grid->column('thumbnail', __('Thumbnail'));
        $grid->column('video', __('Video'));
        $grid->column('description', __('Description'));
        $grid->column('type_id', __('Type id'));
        $grid->column('price', __('Price'));
        $grid->column('lesson_num', __('Lesson num'));
        $grid->column('video_length', __('Video length'));
        $grid->column('follow', __('Follow'));
        $grid->column('score', __('Score'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Course::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_token', __('Teacher'));
        $show->field('name', __('Name'));
        $show->field('thumbnail', __('Thumbnail'));
        $show->field('video', __('Video'));
        $show->field('description', __('Description'));
        $show->field('type_id', __('Type id'));
        $show->field('price', __('Price'));
        $show->field('lesson_num', __('Lesson num'));
        $show->field('video_length', __('Video length'));
        $show->field('follow', __('Follow'));
        $show->field('score', __('Score'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

       
        


    protected function form()
    {
        $form = new Form(new Course());
        $form->text('name', __('Name'));

        // Get our categories
        $result= CourseType::pluck('title','id');
         $form->select('type_id', __('Category'))->options($result);   
    //   File is used for video and oother format like pdf and doc
        $form->image('thumbnail',__('Thumbnail'))->uniqueName();
        $form->file('video',__('Video'))->uniqueName();

        $form->decimal('price', __('Price'));
        // Decimal methods helps with retrieving float format from the database
        $form->number('lesson_num', __('Lesson number'));
        $form->number('video_length', __('Video length'));

        // for posting and who is posting
        $result= User::pluck('name','token');
        $form->select('user_token', __('Teacher'))->options($result);
        $form->display('created_at',__('Created at'));
        $form->display('updated_at',__('Updated at'));
        $form->textarea('description', __('Description'));
       

        return $form;
    }
}