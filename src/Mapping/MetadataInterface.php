<?php
/**
 * CoolMS2 Contact Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/contact for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsContact\Mapping;

interface MetadataInterface
{
    /**
     * @return array|\Traversable
     */
    public function getEmails();

    /**
     * @return Collection
     */
    public function getWebsites();

    /**
     * @return Collection
     */
    public function getMessengers();

    /**
     * @return Collection
     */
    public function getPhones();

    /**
     * @return Collection
     */
    public function getSocialNetworks();
}
