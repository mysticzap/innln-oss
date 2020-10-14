<?php
declare(strict_type=1);
namespace innln\oss;
use innln\comm\core\BaseObject;
use innln\oss\aliyun\oss\FileObject as AliyunOssFileObject;
use innln\oss\tencentcloud\cos\FileObject as TencentCloudCosFileObject;
/**
 * 文件对象工厂
 */
class FileObjectFactory extends BaseObject implements FileObjectAbstractFactory
{
    /**
     * 阿里云oss存储对象
     */
    public function createAliyunOss(array $config){
        return new AliyunOssFileObject($config);
    }

    /**
     * 腾讯云cos存储对象
     */
    public function createTencentCos(array $config){
        return new TencentCloudCosFileObject($config);
    }
}