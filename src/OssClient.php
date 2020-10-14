<?php
declare(strict_type=1);
namespace innln\oss;
use innln\comm\core\BaseOjbect;

/**
 * 文件存储功能对象管理端类
 * 
 * oss聚合根
 */
class OssClient extends BaseObject
{
    /**
     * 配置信息
     */
    protected BaseConfigure $configure;
    /**
     * 文件存储空间管理对象
     */
    protected BucketInterface $bucket;
    /**
     * 文件管理对象
     */
    protected FileObjectInterface $fileOjbect;

    
}