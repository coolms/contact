<?php
/**
 * CoolMS2 Contact Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/contact for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsContact\Mapping\Traits;

use CmsContact\Mapping\MetadataInterface;

trait ContactMetadatableTrait
{
    /**
     * @var MetadataInterface
     * 
     * @Form\ComposedObject({
     *      "target_object":"CmsContact\Mapping\MetadataInterface",
     *      "options":{
     *          "name":"contactMetadata",
     *          "label":"Contact metadata",
     *          "partial":"cms-contact/metadata/fieldset",
     *          "translator_text_domain":"CmsContact",
     *      }})
     */
    protected $contactMetadata;

    /**
     * @param MetadataInterface $metadata
     */
    public function setContactMetadata(MetadataInterface $metadata)
    {
        $this->contactMetadata = $metadata;
        if ($metadata instanceof \CmsCommon\Mapping\Common\ObjectableInterface) {
            $metadata->setObject($this);
        }
    }

    /**
     * @return MetadataInterface
     */
    public function getContactMetadata()
    {
        return $this->contactMetadata;
    }
}
