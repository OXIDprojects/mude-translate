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




class mude_oxlang extends mude_oxlang_parent
{
    
    public function translateString(  $sStringToTranslate, $iLang = null, $blAdminMode = null )
    {
       
        if ( $sStringToTranslate != 'charset') {
                 $sTranslation =  parent::translateString( $sStringToTranslate, $iLang , $blAdminMode  );
            $sTranslation = $sTranslation . "(#*" . $sStringToTranslate . "*)";

               
            $aTranslationHooks = oxSession::getInstance()->getVar('mude_translations'); //smarty->get_template_vars('mude_translations');
        
            $aTranslationHooks[$sStringToTranslate] = $sTranslation;
            oxSession::getInstance()->setVar('mude_translations', $aTranslationHooks);//$smarty->assign('mude_translations', $aTranslationHooks);
            return $sTranslation;
                     } else {

           return parent::translateString( $sStringToTranslate, $iLang , $blAdminMode  );  

     
        }
        
    }

}