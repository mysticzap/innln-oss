<?php
declare(strict_type=1);
namespace innln\oss\config;
use innln\comm\core\BaseObject;

/**
 * oss基础配置
 */
class BaseConfigure extends BaseObject
{
    /**
     * 访问key Id
     */
    protected ?string $accessKeyId;

    /**
     * 访问key密钥
     */
    protected ?string $accessKeySecret;
    /**
     * 存储空间名
     */
    protected ?string $bucket;
    /**
     * endpoint外网端点
     */
    protected ?string $endpoint;
    /**
     * 内网端点 
     */
    protected ?string $endpointInternal;
    /**
     * 用户自定义访问域名地址
     */ 
    protected ?string $customHostDomain;
    /**
     * true为开启CNAME。CNAME是指将自定义域名绑定到存储空间上。
     */
    protected ?bool $isCName;
    /**
     * 安全令牌
     * @property string $securityToken
     */
    protected ?string $securityToken;
    /**
     * 请求代理
     */
    protected ?string $requestProxy;

    public function getAccessKeyId(): ?string{
        return $this->accessKeyId;
    }

    public function getBucket(): ?string {
        return $this->bucket;
    }

    public function setBucket(?string $bucket): ?self {
        $this->bucket = $bucket;
        return $this;
    }


}