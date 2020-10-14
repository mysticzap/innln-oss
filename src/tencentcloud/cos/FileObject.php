<?php
declare(strict_type=1);
namespace innln\oss\tencentcloud\cos;

use innln\oss\FileObjectInterface;

class FileObject implements FileObjectInterface
{
    /**
     * @var TencentCloudConfigure
     */
    public TencentCloudConfigure $configure;

    /**
     * @var OssClient 原始的阿里客户端对象
     */
    public OssClient $client;

    public function init() {
        // 初始化客户端 , $isCName = false, $securityToken = NULL, $requestProxy = NULL
        $this->client = new OssClient(
            $configure->accessKeyId, 
            $configure->accessKeySecret, 
            $configure->endpoint, 
            $configure->isCName, 
            $configure->securityToken, 
            $configure->requestProxy
        );
    }
    public function getMeta(string $bucket, string $object, ?array $options = NULL){

    }
    /**
     * 下载、获得对象
     */
    public function getObject(string $bucket, string $object, $localFile, $options){
        $result = NULL;
        if(empty($localFile)) {
            $result = $this->client->getObject($bucket, $object);
        } else {
            $options = is_array($options) ? $options :[];
            $options[$this->client::OSS_FILE_DOWNLOAD] = $localFile;
            $result = $this->client->getObject($bucket, $object, $options);
        }
        return $result;
    }
    
    public function getExpireUrl(string $bucket, string $object, $timeout = 60, $options = NULL){
        return $this->client->signUrl($bucket, $object, $timeout, "GET", $options);
    }

    // public function getCustomDomainExpireUrl(string $bucket, string $object, $timeout = 60, $options = NULL){
        
    // }


    public function isExist(string $bucket, string $object, $options = NULL){
        return $this->client->doesObjectExist($bucket, $object);
    }
    /**
     * 文件上传
     * @param string $bucket 存储空间
     * @param string $object 存储对象
     * @param string $file 带文件名的文件路径地址 如：/users/local/myfile.txt。
     * @return bool
     */
    public function upload(string $bucket, string $object, string $file){
        return $this->client->uploadFile($bucket, $object, $file);
    }

    public function uploadCallback(){

    }
    /**
     * 分片上传
     * 
     * @param string $bucket 存储空间
     * @param string $object 存储对象
     * @param string $file 带文件名的文件路径地址 如：/users/local/myfile.txt。
     * @param ?array $options 
     * 
     */
    public function fragmentUpload($bucket, $object, string $file, $options = NULL){
        // $options = [
        //     // 指定文件长度。
        //     $this->client::OSS_PART_SIZE =>  10 * 1024 * 1024,
        //     // 是否开启MD5校验，true为开启。
        //     $this->client::OSS_CHECK_MD5 => $isCheckMd5,

        // ];
        try{
            $this->client->multiuploadFile($bucket, $object, $file, $options);
        } catch (\OssException $e) {
            throw $e;
        }
    }
    /**
     * 取消分片上传
     */
    public function cancelFragmentUpload($bucket, $object, $uploadId) {
        $this->client->abortMultipartUpload($bucket, $object, $uploadId);
    }

    public function fragmentUploadCallback(){
    }

    public function copy($fromBucket, $fromObject, $toBucket, $toObject, ?array $options = NULL){
        return $this->client->copyObject($fromBucket, $fromObject, $toBucket, $toObject, $options);
    }

    public function remove(string $bucket, string $object, ?array $options = NULL){
        return $this->client->deleteObjects($bucket, $object, $options);
    }

    public function batchRemove(string $bucket, array $objects, ?array $options = NULL){
        return $this->client->deleteObjects($bucket, $objects, $options);
    }
}
