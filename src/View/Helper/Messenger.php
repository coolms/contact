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

/**
 * View helper for rendering messenger.
 */
class Messenger extends Contact
{
    /**
     * {@inheritDoc}
     */
    protected function format()
    {
        $value = $this->getRawValue();
        $this->setValue($value);
        return parent::format();
    }
}
