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


class mude_oxoutput extends mude_oxoutput_parent
{
    
public function process($sOutoput, $sClassName)
{
    $sRes = parent::process( $sOutoput, $sClassName);
    
      
     $aTranslationHooks = oxSession::getInstance()->getVar('mude_translations');

     foreach( $aTranslationHooks as $sIdent => $sTranslation) {
     
     if($sIdent && $sTranslation) {
        
     $iPos = strpos($sRes, "(#*$sIdent*)"); 
     if ($iPos > 0) {
     $iInsertAt1 = strpos($sRes, "<", $iPos);
     $iInsertAt2 = strpos($sRes, ">", $iPos); 

  
     if ( $iInsertAt1 > $iInsertAt2) {
        $iInsertAt = $iInsertAt2 ;
     } else {
        $iInsertAt = $iInsertAt1 -1;  
     }       

   
        
     $sOut = '
     <div class="mude_lang_editor" id="btn'.$sIdent.'" class="mude_lang_editor"></div>

                        <script>
                         $(document).ready(function() {
                            $("#btn'.$sIdent.'").click(function() {
                                    var c =  "'.$sIdent.'";
                                    var reply = prompt("Die neue Übersetzung für:  " + c, "'.$sTranslation.'");
                                    if ( reply) {
                                        $.get("index.php?fnc=mude_do_translate", { mude_const: c, mude_translate: reply },function(data){    
                                        }); 
                                    }
                                    return false;
                                });
                                
                         });
                        </script>
                        ';
   

     $iLength = strlen($sRes);
     $sA = substr($sRes, 0, ($iInsertAt+1-$iRemoveLength));
     $sB = substr($sRes, ($iInsertAt+1), $iLength);
     $sRes = $sA . $sOut . $sB;
     
     $sRes = str_replace("(#*$sIdent*)", "", $sRes);
        
     }
     }
    }
       
    return $sRes;    
}
    
    }