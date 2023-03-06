<?php
/**
 * @package Base
 *
 * @author Gevorg Arshakyan <gevorg@armmage.com>
 *
 * @copyright Copyright (c) 2023 ArmMage (https://armmage.com)
 */

declare(strict_types = 1);

namespace ArmMage\Base\Model\Config;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Class Config
 *
 * Provides methods to fetch configuration values
 */
class Config
{
    /**
     * @var string
     */
    public const MODULE_ENABLE_PATH = 'category_redirect/general/enable';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }
    
    /**
     * Get ArmMage configuration `enabled` value
     *
     * @param string $path
     * @param string $scopeType
     * @param string $scopeCode
     *
     * @return boolean
     */
    protected function isModuleEnabled(
        string $path,
        string $scopeType,
        string $scopeCode
    ) {
        return $this->scopeConfig->isSetFlag(
            $path,
            $scopeType,
            $scopeCode
        );
    }

    /**
     * Get Website ID
     *
     * @return string
     *
     * @throws LocalizedException
     */
    protected function getCurrentWebsiteId(): string
    {
        $website = $this->storeManager->getWebsite();
        return (string) $website->getId();
    }
}
