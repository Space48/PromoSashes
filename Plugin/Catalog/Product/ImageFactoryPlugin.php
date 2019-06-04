<?php declare(strict_types=1);

namespace Space48\PromoSashes\Plugin\Catalog\Product;

use Magento\Catalog\Block\Product\Image as ImageBlock;
use Magento\Catalog\Block\Product\ImageFactory;
use Magento\Catalog\Model\Product;

class ImageFactoryPlugin
{
    /**
     * @param ImageFactory $subject
     * @param ImageBlock   $result
     * @param Product      $product
     *
     * @return ImageBlock
     */
    public function afterCreate(ImageFactory $subject, ImageBlock $result, Product $product): ImageBlock
    {
        $result->setData('product', $product);

        return $result;
    }
}
