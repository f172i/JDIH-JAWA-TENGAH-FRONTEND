<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;

class MenuHelper
{
    public static function canAccess($requiredRoles)
    {
        $userRole = Session::get('role');
        
        if (!$userRole) {
            return false;
        }
        
        if (is_string($requiredRoles)) {
            return $userRole === $requiredRoles;
        }
        
        if (is_array($requiredRoles)) {
            return in_array($userRole, $requiredRoles);
        }
        
        return false;
    }
    
    public static function getUserRole()
    {
        return Session::get('role');
    }
    
    public static function isRole($role)
    {
        return Session::get('role') === $role;
    }
    
    public static function getMenuItems()
    {
        $userRole = Session::get('role');
        
        $menuItems = [
            [
                'label' => 'Dashboard',
                'route' => 'admin.dashboard',
                'icon' => 'fa-home',
                'roles' => ['superadmin', 'admin', 'opd']
            ],
            [
                'label' => 'Produk Hukum',
                'route' => 'admin.master.file',
                'icon' => 'fa-file',
                'roles' => ['superadmin', 'admin', 'opd']
            ]
        ];
        
        // Only superadmin can access these features
        if ($userRole === 'superadmin') {
            $menuItems = array_merge($menuItems, [
                [
                    'label' => 'Master Kategori',
                    'route' => 'admin.master.kategori',
                    'icon' => 'fa-list',
                    'roles' => ['superadmin']
                ],
                [
                    'label' => 'Master Berita',
                    'route' => 'admin.master.berita',
                    'icon' => 'fa-newspaper',
                    'roles' => ['superadmin']
                ],
                [
                    'label' => 'Master User',
                    'route' => 'admin.master.user',
                    'icon' => 'fa-users',
                    'roles' => ['superadmin']
                ],
                [
                    'label' => 'Master Banner',
                    'route' => 'admin.master.banner',
                    'icon' => 'fa-image',
                    'roles' => ['superadmin']
                ],
                [
                    'label' => 'Master Galeri',
                    'route' => 'admin.master.galeri',
                    'icon' => 'fa-images',
                    'roles' => ['superadmin']
                ],
                [
                    'label' => 'Master Video',
                    'route' => 'admin.master.video',
                    'icon' => 'fa-video',
                    'roles' => ['superadmin']
                ]
            ]);
        }
        
        // Filter menu items based on user role
        return array_filter($menuItems, function($item) use ($userRole) {
            return in_array($userRole, $item['roles']);
        });
    }
}
