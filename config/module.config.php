<?php
/**
 * CoolMS2 Contact Module (http://www.coolms.com/)
 *
 * @link      http://github.com/coolms/contact for the canonical source repository
 * @copyright Copyright (c) 2006-2015 Altgraphic, ALC (http://www.altgraphic.com)
 * @license   http://www.coolms.com/license/new-bsd New BSD License
 * @author    Dmitry Popov <d.popov@altgraphic.com>
 */

namespace CmsContact;

return [
    'controllers' => [
        'aliases' => [
            'CmsContact\Controller\Admin' => 'CmsContact\Mvc\Controller\AdminController',
        ],
        'invokables' => [
            'CmsContact\Mvc\Controller\AdminController' => 'CmsContact\Mvc\Controller\AdminController',
        ],
    ],
    'router' => [
        'routes' => [
            'cms-admin' => [
                'child_routes' => [
                    'contact' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/contact[/:controller[/:action[/:id]]]',
                            'constraints' => [
                                'controller' => '[a-zA-Z\-]*',
                                'action' => '[a-zA-Z\-]*',
                                'id' => '[a-zA-Z0-9\-]*',
                            ],
                            'defaults' => [
                                '__NAMESPACE__' => 'CmsContact\Controller',
                                'controller' => 'Admin',
                                'action' => 'index',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo',
                'text_domain' => __NAMESPACE__,
            ],
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'cmsContact' => 'CmsContact\View\Helper\Contact',
            'cmsContactCollection' => 'CmsContact\View\Helper\Collection',
            'cmsContactEmail' => 'CmsContact\View\Helper\Email',
            'cmsContactMessenger' => 'CmsContact\View\Helper\Messenger',
            'cmsContactPhone' => 'CmsContact\View\Helper\Phone',
            'cmsContactSocialNetwork' => 'CmsContact\View\Helper\SocialNetwork',
            'cmsContactWebsite' => 'CmsContact\View\Helper\Website',
        ],
        'invokables' => [
            'CmsContact\View\Helper\Collection' => 'CmsContact\View\Helper\Collection',
            'CmsContact\View\Helper\Contact' => 'CmsContact\View\Helper\Contact',
            'CmsContact\View\Helper\Email' => 'CmsContact\View\Helper\Email',
            'CmsContact\View\Helper\Messenger' => 'CmsContact\View\Helper\Messenger',
            'CmsContact\View\Helper\Phone' => 'CmsContact\View\Helper\Phone',
            'CmsContact\View\Helper\SocialNetwork' => 'CmsContact\View\Helper\SocialNetwork',
            'CmsContact\View\Helper\Website' => 'CmsContact\View\Helper\Website',
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __NAMESPACE__ => __DIR__ . '/../view',
        ],
    ],
];
