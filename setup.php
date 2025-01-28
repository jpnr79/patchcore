<?php

/**
 * -------------------------------------------------------------------------
 * patchcore plugin for GLPI
 * -------------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of patchcore.
 *
 * patchcore is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * any later version.
 *
 * patchcore is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with patchcore. If not, see <http://www.gnu.org/licenses/>.
 * -------------------------------------------------------------------------
 * @copyright Copyright (C) 2022-2022 by Oleg Кapeshko
 * @license   GPLv2 https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/exilitywork/patchcore
 * -------------------------------------------------------------------------
 */

define('PLUGIN_PATCHCORE_VERSION', '0.1.0');

// Minimal GLPI version, inclusive
define("PLUGIN_PATCHCORE_MIN_GLPI_VERSION", "10.0.1");
// Maximum GLPI version, exclusive
define("PLUGIN_PATCHCORE_MAX_GLPI_VERSION", "12.0.99");

use Glpi\Plugin\Hooks;

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_patchcore()
{
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['patchcore'] = true;

    if (!Plugin::isPluginActive('patchcore')) {
        return false;
    }
}

/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_patchcore()
{
    return [
        'name'           => 'patchcore',
        'version'        => PLUGIN_PATCHCORE_VERSION,
        'author'         => '<a href="https://www.linkedin.com/in/oleg-kapeshko-webdev-admin/">Oleg Kapeshko</a>',
        'license'        => 'GPL-2.0-or-later',
        'homepage'       => 'https://github.com/exilitywork/patchcore',
        'requirements'   => [
            'glpi' => [
                'min' => PLUGIN_PATCHCORE_MIN_GLPI_VERSION,
                'max' => PLUGIN_PATCHCORE_MAX_GLPI_VERSION,
            ]
        ]
    ];
}