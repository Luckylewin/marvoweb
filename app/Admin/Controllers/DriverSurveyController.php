<?php

namespace App\Admin\Controllers;

use App\Models\DriverSurvey;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class DriverSurveyController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        $content->header("列表");

        return $content
            ->header('Index')
            ->description('description')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {

        $grid = new Grid(new DriverSurvey);
        $grid->model()->latest();

        // 搜索
        $grid->filter(function($filter){

            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            $filter->equal('email')->placeholder('请输入邮箱');
        });

        $grid->expandFilter();

        $grid->setTitle('收据收集列表');
        $grid->name('名称');
        $grid->age('年龄');
        $grid->region('地区');
        $grid->email('邮箱');
        $grid->game('游戏');
        $grid->suggest('建议');
        $grid->created_at('时间')->display(function ($created_at) {
            return date('Y-m-d H:i', $created_at);
        });

        $grid->actions(function ($actions) {
            $actions->disableEdit();
            $actions->disableView();
            $actions->disableDelete();

            //编辑按钮重构

            $actions->append("<a href='". url('admin/driver-surveys/' . $actions->getKey())  ."' class='btn btn-info btn-sm'><i class='fa fa-eye'></i> 查看</a>");
        });

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
        $show = new Show(DriverSurvey::findOrFail($id));

        $show->id('Id');
        $show->name('Name');
        $show->age('Age');
        $show->sexuality('Sexuality');
        $show->region('Region');
        $show->email('Email');
        $show->game('Game');
        $show->suggest('Suggest');
        $show->created_at('Created at');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new DriverSurvey);

        $form->text('name', 'Name');
        $form->text('age', 'Age');
        $form->text('sexuality', 'Sexuality')->default('male');
        $form->text('region', 'Region');
        $form->email('email', 'Email');
        $form->text('game', 'Game');
        $form->text('suggest', 'Suggest');

        return $form;
    }
}
