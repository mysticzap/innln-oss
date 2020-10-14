<?php
declare(strict_type=1);
namespace innln\oss;

/**
 * 文件存储容器管理接口
 * 
 * 保存文件的地方
 * 
 */
interface BucketInterface 
{
    /**
     * 存储空间列表
     */
    public function list();
    /**
     * 获得存储空间信息
     */
    public function detail();
    /**
     * 获得存储空间元信息
     */
    public function meta();
    /**
     * 判断存储空间是否存在
     */
    public function isExist();
    /**
     * 创建存储空间
     */
    public function create();
    /**
     * 删除存储空间
     */
    public function remove();
    /**
     * 给存储空间添加标签
     */
    public function setTag();
}