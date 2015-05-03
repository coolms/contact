<?php
/**
 * CoolMS2 Contact Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/contact for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsContact\View\Helper;

use Zend\View\Helper\AbstractHelper,
    CmsContact\Mapping\ContactInterface;

/**
 * View helper for rendering contact.
 */
class Contact extends AbstractHelper
{
    /**
     * @var ContactInterface
     */
    protected $entity;

    /**
     * @var string
     */
    protected $value;

    /**
     * @var string
     */
    protected $rawValue;

    /**
     * Contact entity map to view helper
     * 
     * @var array
     */
    protected $classMap = [
        'CmsContact\Entity\Email'         => 'cmscontactemail',
        'CmsContact\Entity\Messenger'     => 'cmscontactmessenger',
        'CmsContact\Entity\Phone'         => 'cmscontactphone',
        'CmsContact\Entity\SocialNetwork' => 'cmscontactsocialnetwork',
        'CmsContact\Entity\Website'       => 'cmscontactwebsite',
    ];

    /**
     * @param ContactInterface $contactEntity
     * @return self|string
     */
    public function __invoke(ContactInterface $contactEntity = null)
    {
        if (func_num_args() === 0) {
            return $this;
        }
        if (null !== $contactEntity) {
            return $this->render($contactEntity);
        }
    }

    /**
     * Render contact value
     *
     * @param ContactInterface $contactEntity
     * @return string
     */
    public function render(ContactInterface $contactEntity)
    {
        $renderer = $this->getView();
        if (!method_exists($renderer, 'plugin')) {
            // Bail early if renderer is not pluggable
            return '';
        }
        
        $this->setEntity($contactEntity);
        
        $renderedInstance = $this->renderInstance($contactEntity);
        
        if ($renderedInstance !== null) {
            return $renderedInstance;
        }
        
        return $this->format();
    }

    /**
     * Render contact entity by helper name
     *
     * @param string $name
     * @param ContactInterface $contactEntity
     * @return string|null
     */
    protected function renderHelper($name, ContactInterface $contactEntity)
    {
        $helper = $this->getView()->plugin($name);
        if ($helper !== $this) {
            return $helper($contactEntity);
        }
    }

    /**
     * Render element by instance map
     *
     * @param ContactInterface $contactEntity
     * @return string|null
     */
    protected function renderInstance(ContactInterface $contactEntity)
    {
        foreach ($this->classMap as $class => $pluginName) {
            if ($contactEntity instanceof $class) {
                return $this->renderHelper($pluginName, $contactEntity);
            }
        }
        return null;
    }

    /**
     * @param ContactInterface $contactEntity
     * @return self
     */
    public function setEntity(ContactInterface $contactEntity)
    {
        $this->setRawValue($contactEntity->getValue());
        $this->entity = $contactEntity;
        return $this;
    }

    /**
     * @return ContactInterface
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $value
     * @return self
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $rawValue
     * @return self
     */
    public function setRawValue($rawValue)
    {
        $this->rawValue = $rawValue;
        return $this;
    }

    /**
     * @return string
     */
    public function getRawValue()
    {
        return $this->rawValue;
    }

    /**
     * Format value
     *
     * @return string
     */
    protected function format()
    {
        return $this->getValue() ?: $this->getRawValue();
    }
}
