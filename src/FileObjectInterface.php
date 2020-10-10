<?php
declare(strict_type=1);
namespace innln\oss;
/**
 * 文件对象接口
 */
interface FileObjectInterface
{
    /**
     * 获取对象
     */
    public function get();

    /**
     * 上传对象
     */
    public function upload();

    /**
     * 上传回调
     */
    public function uploadCallback();

    /**
     * 复制对象
     */
    public function copy();

    /**
     * 移除对象
     */
    public function remove();
    
    /**
     * 批量移除对象
     */
    public function batchRemove();
}