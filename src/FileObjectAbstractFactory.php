<?php
declare(strict_type=1);
namespace innln\oss;
/**
 * 对象抽象工厂
 * 
 * 
 */
interface FileObjectAbstractFactory
{
    /**
     * 阿里云对象存储
     */
    public function createAliyunOss();
    
    /**
     * 腾讯云对象存储
     */
    public function createTencentCos();
}