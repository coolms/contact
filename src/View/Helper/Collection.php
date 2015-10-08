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

use Traversable,
    Zend\View\Exception,
    Zend\View\Helper\AbstractHelper,
    Zend\Stdlib\ArrayUtils;

/**
 * View helper for rendering contact collection.
 */
class Collection extends AbstractHelper
{
    /**
     * @var string
     */
    protected $separator;

    /**
     * @param array|Traversable $collection
     * @return self|string
     */
    public function __invoke($collection = null, $separator = ', ')
    {
        if (null === $collection) {
            return $this;
        }

        $this->setSeparator($separator);
        return $this->render($collection);
    }

    /**
     * Render contact collection
     * 
     * @param array|Traversable $collection
     * @return null|string
     */
    public function render($collection)
    {
        if ($collection) {

            if ($collection instanceof Traversable) {
                $collection = ArrayUtils::iteratorToArray($collection);
            }

            if (!is_array($collection)) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Collection must be type of array or %s',
                    Traversable::class
                ));
            }

            $renderer = $this->getView();
            if (!method_exists($renderer, 'plugin')) {
                // Bail early if renderer is not pluggable
                return '';
            }

            $helper = $this->getView()->plugin('cmsContact');
            foreach ($collection as $contactEntity) {
                $values [] = $helper($contactEntity);
            }

            if (isset($values)) {
                return implode($this->getSeparator(), $values);
            }
        }
    }

    /**
     * @param string $separator
     * @return self
     */
    public function setSeparator($separator)
    {
        $this->separator = $separator;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeparator()
    {
        return $this->separator;
    }
}
