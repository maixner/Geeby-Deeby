<?php
/**
  *
  * Copyright (c) Demian Katz 2009.
  *
  * This program is free software; you can redistribute it and/or modify
  * it under the terms of the GNU General Public License version 2,
  * as published by the Free Software Foundation.
  *
  * This program is distributed in the hope that it will be useful,
  * but WITHOUT ANY WARRANTY; without even the implied warranty of
  * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  * GNU General Public License for more details.
  *
  * You should have received a copy of the GNU General Public License
  * along with this program; if not, write to the Free Software
  * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
  *
  */
require_once 'Gamebooks/Tables/Platform.php';

/**
 * Handler for platforms page.
 *
 * @param   UI  $interface      Current instance of user interface class.
 */
function platforms($interface)
{
    // Load platforms from database:
    $platforms = new PlatformList();
    $platforms->assign($interface);
    
    // Display page with appropriate Javascript:
    $interface->addJavascript('edit_platforms.js');
    $interface->showPage('platforms.tpl');
}
?>