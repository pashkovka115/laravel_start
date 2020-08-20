<?php

namespace App\Http\Middleware;

use Alexusmai\LaravelFileManager\Controllers\FileManagerController;
use Closure;
use Modules\Admin\Http\Controllers\DashboardController;
use Modules\Admin\Http\Controllers\PermissionController;
use Modules\Admin\Http\Controllers\RoleController;
use Modules\Admin\Http\Controllers\Tour\GeneralController;
use Modules\Admin\Http\Controllers\Tour\IndexController;
use Modules\Admin\Http\Controllers\UserController;
use Modules\Admin\Http\Controllers\UserRoleController;

class CheckPermissions
{
    /**
     * @var array $abilities
     * Разрешения для методов контроллера (админка)
     * по шаблону
     * 'method' => 'permission'
     * Для не раздувания списка методов
     * рекомендуется использовать
     * архитектуру REST
     */
    private $abilities = [
        'index'   => 'view',
        'show'    => 'view',
        'requests' => 'view',
        'new_items' => 'view',
        'recommended' => 'view',
        'edit'    => 'edit',
        'update'  => 'edit',
        'create'  => 'add',
        'store'   => 'add',
        'add_field' => 'add', // на странице о нас, лендинг
        'destroy' => 'delete',

//        File Manager
        'initialize' => '*',
        'content' => '*',
        'tree' => '*',
        'selectDisk' => '*',
        'upload' => '*',
        'delete' => '*',
        'paste' => '*',
        'rename' => '*',
        'download' => '*',
        'thumbnails' => '*',
        'preview' => '*',
        'url' => '*',
        'createDirectory' => '*',
        'createFile' => '*',
        'updateFile' => '*',
        'streamFile' => '*',
        'zip' => '*',
        'unzip' => '*',
        'ckeditor' => '*',
        'tinymce' => '*',
        'tinymce5' => '*',
        'summernote' => '*',
        'fmButton' => '*',
//      End  File Manager
    ];

    /**
     * @var array $types
     * Список контроллеров к которым будут применяться разрешения $abilities  (админка)
     * по шаблону
     * ControllerName => 'type'
     * где type произвольная строка как псевдоним этого контроллера
     *
     * При записи:
     * private $abilities = [
     *      'index' => 'view',
     * ];
     * private $types = [
     *       HomeController::class => 'dashboard'
     * ];
     * Для выполнения  HomeController::index()
     * будет проверяться разрешение - dashboard_view (через подчёркивание)
     * И не забыть добавить разрешение в БД )))
     */
    private $types = [
        DashboardController::class => 'dashboard',
        UserController::class => 'user',
        PermissionController::class => 'permission',
        RoleController::class => 'role',
        UserRoleController::class => 'user-role',

        IndexController::class => 'tour',
        GeneralController::class => 'tour',

//        File Mager
        FileManagerController::class => 'file-manager'
    ];


    /**
     * Проверяет разрешение на выполнение метода контроллера
     */
    public function handle($request, Closure $next)
    {
        $action = \Route::currentRouteAction();

        $sp = explode('@', $action);
        $controller = isset($this->types[$sp[0]]) ? $this->types[$sp[0]] : '';
        $method = isset($this->abilities[$sp[1]]) ? $this->abilities[$sp[1]] : '';
        $permission = $controller . '_' . $method;


        if (auth()->check()){
            if (auth()->user()->can($permission)){
                define('IS_ADMIN', true);
            }

            $referer = $request->server('HTTP_REFERER');
            $current_url = $request->url();

//            $is_referer_cabinet = preg_match('/https?\:\/\/[\w\-\_]+\.[\w]{1,10}\/cabinet\/.+/', $referer) == 1;
            $is_referer_admin = preg_match('/https?\:\/\/[\w\-\_]+\.[\w]{1,10}\/admin/', $referer) == 1;
            $is_current_admin = preg_match('/https?\:\/\/[\w\-\_]+\.[\w]{1,10}\/admin/', $current_url) == 1;
//            $is_file_manager = preg_match('/https?\:\/\/[\w\-\_]+\.[\w]{1,10}\/file-manager\/fm.+/', $current_url) == 1;

            // TODO: МЕТКА: если надо поменять префикс админки, здесь тоже надо менять
            if (($is_referer_admin or $is_current_admin) and !defined('IS_ADMIN')){
                return redirect()->to('/')->withErrors('Не достаточно прав!');
            }



        }else{
            header('Location: /');
            exit();
        }



        return $next($request);
    }
}
