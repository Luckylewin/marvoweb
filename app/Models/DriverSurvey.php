<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DriverSurvey
 * @package App\Models
 * @attr $sexuality string 性别
 * @attr $region string 地区/国家
 * @attr $name string   名称
 * @attr $age string    年龄
 * @attr $email string  邮箱
 * @attr $game string   游戏
 * @attr $suggest string 建议
 * @attr $types string 型号
 * @attr $facebook string facebook
 * @attr $created_at int 创建时间
 */
class DriverSurvey extends Model
{
    public $timestamps = false;

    protected $guarded = [];
}
