<?php
/*if (!defined('GLPI_ROOT')) { define('GLPI_ROOT', realpath(__DIR__ . '/../..')); }
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

/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_patchcore_install() {
   $files = [];
   $pathes = new RecursiveTreeIterator(new RecursiveDirectoryIterator(GLPI_ROOT.'/plugins/patchcore/patch', RecursiveDirectoryIterator::SKIP_DOTS));
   foreach($pathes as $path) {
      if(!(is_dir(mb_substr($path, strpos($path, '/'))) || strpos($path, 'README.md')))
         array_push($files, str_replace(GLPI_ROOT.'/plugins/patchcore/patch', '', mb_substr($path, strpos($path, '/'))));
   }
   print_r('');
   foreach($files as $file){
      if(!(copy(GLPI_ROOT.$file, GLPI_ROOT.'/plugins/patchcore/backup'.$file) && copy(GLPI_ROOT.'/plugins/patchcore/patch'.$file, GLPI_ROOT.$file))) 
         return false;
   }
   return true;
}

/**
 * Plugin uninstall process
 *
 * @return boolean
 */
function plugin_patchcore_uninstall() {
   $files = [];
   $pathes = new RecursiveTreeIterator(new RecursiveDirectoryIterator(GLPI_ROOT.'/plugins/patchcore/patch', RecursiveDirectoryIterator::SKIP_DOTS));
   foreach($pathes as $path) {
      if(!(is_dir(mb_substr($path, strpos($path, '/'))) || strpos($path, 'README.md')))
         array_push($files, str_replace(GLPI_ROOT.'/plugins/patchcore/patch', '', mb_substr($path, strpos($path, '/'))));
   }
   foreach($files as $file){
      if(!copy(GLPI_ROOT.'/plugins/patchcore/backup'.$file, GLPI_ROOT.$file)) return false;
   }
   return true;
}