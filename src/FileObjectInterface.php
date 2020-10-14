<?php
declare(strict_type=1);
namespace innln\oss;
/**
 * 文件对象接口
 */
interface FileObjectInterface
{
    /**
     * 对象列表
     */
    public function list(string $bucket);
    /**
     * 获得详细元数据
     */
    public function getMeta(string $bucket, string $object, ?array $options = NULL);
    /**
     * 获得简单元数据
     */
    // public function getSimpleMeta(string $bucket, string $object, $options = NULL);
    /**
     * 下载/获得对象
     * @param string $localFile 保存在本地的地址，为空时，保存到内存中
     * @return string
     */
    public function getObject(string $bucket, string $object, ?string $localFile = NULL, ?array $options = NULL);

    /**
     * 生成带有效期的链接
     */
    public function genExpireUrl(string $bucket, string $object, int $timeout = 60, ?array $options = NULL);
    
    /**
     * 生成自定义域名的带有效期的链接
     */
    // public function getCustomDomainExpireUrl();

    /**
     * 判断是否存在
     */
    public function isExist(string $bucket, string $object, $file, ?array $options = NULL);

    /**
     * 上传对象
     */
    public function  putObject(string $bucket, string $object, $file, ?array $options = NULL);
    /**
     * 上传文件
     */
    public function upload(string $bucket, string $object, $file, ?array $options = NULL);

    /**
     * 上传回调
     */
    public function uploadCallback();

    /**
     * 分片上传
     */
    public function fragmentUpload(string $bucket, string $object, $file, ?array $options = NULL);

    /**
     * 取消分片上传
     */
    public function cancelFragmentUpload(string $bucket, string $object, string $uploadId);
    /**
     * 分片上传回调
     */
    public function fragmentUploadCallback();

    /**
     * 复制对象
     */
    public function copy($fromBucket, $fromObject, $toBucket, $toObject, ?array $options = NULL);

    /**
     * 移除对象
     */
    public function remove(string $bucket, string $object, ?array $options = NULL);
    
    /**
     * 批量移除对象
     */
    public function batchRemove(string $bucket, string $objects, ?array $options = NULL);

    /**
     * 给对象添加标签
     */
    // public function addTag();
    /**
     * 更新对象标签
     */
    // public function updateTag();

    /**
     * 移除对象标签
     */
    // public function removeTag();
}