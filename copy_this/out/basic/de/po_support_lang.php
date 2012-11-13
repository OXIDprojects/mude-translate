<?php
/**
 *    This file is part of Musterdenker Translate Module for OXID eShop.
 *
 *    Musterdenker Prepayment Module for OXID eShop is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    Musterdenker Translate Module for OXID eShop is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Musterdenker Prepayment Module for OXID eShop.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @link http://www.musterdenker.de
 */

$sLangName  = "Deutsch";
$iLangNr    = 0;
// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------

require_once ( getShopBasePath() . "/core/File_Gettext-0.4.1/Gettext.php");
require_once ( getShopBasePath() . "/core/File_Gettext-0.4.1/Gettext/PO.php");


$aLang = array(

'charset'                                       => 'UTF-8'
);
    
    $o = new File_Gettext ();
        
    $po = $o->factory('PO', getShopBasePath(). "/out/basic/de/lang.po");
    
    $po->load();
    
    $po->strings;
    $aLang = array_merge($aLang, $po->strings);
