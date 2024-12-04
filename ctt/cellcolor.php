<?php
error_reporting(0);
                          if($rowvc['mt1'] != null || $rowvc['mb1'] != null)
                          {
                            $mtp1 = ((($rowvc['mt1']-$rowvc['mb1'])/$rowvc['mt1'])*100);
                          }
                          else
                          {
                            $mtp1 = '0.00';
                          }
                          if($rowvc['mt2'] != null || $rowvc['mb2'] != null)
                          {
                            $mtp2 = ((($rowvc['mt2']-$rowvc['mb2'])/$rowvc['mt2'])*100);
                          }
                          else
                          {
                            $mtp2 = '0.00';
                          }
                          if($rowvc['mt3'] != null || $rowvc['mb3'] != null)
                          {
                            $mtp3 = ((($rowvc['mt3']-$rowvc['mb3'])/$rowvc['mt3'])*100);
                          }
                          else
                          {
                            $mtp3 = '0.00';
                          }
                          if($rowvc['mt4'] != null || $rowvc['mb4'] != null)
                          {
                            $mtp4 = ((($rowvc['mt4']-$rowvc['mb4'])/$rowvc['mt4'])*100);
                          }
                          else
                          {
                            $mtp4 = '0.00';
                          }
                          if($rowvc['mt5'] != null || $rowvc['mb5'] != null)
                          {
                            $mtp5 = ((($rowvc['mt5']-$rowvc['mb5'])/$rowvc['mt5'])*100);
                          }
                          else
                          {
                            $mtp5 = '0.00';
                          }
                          if($rowvc['mt6'] != null || $rowvc['mb6'] != null)
                          {
                            $mtp6 = ((($rowvc['mt6']-$rowvc['mb6'])/$rowvc['mt6'])*100);
                          }
                          else
                          {
                            $mtp6 = '0.00';
                          }
                          if($rowvc['mt7'] != null || $rowvc['mb7'] != null)
                          {
                            $mtp7 = ((($rowvc['mt7']-$rowvc['mb7'])/$rowvc['mt7'])*100);
                          }
                          else
                          {
                            $mtp7 = '0.00';
                          }
                          if($rowvc['mt8'] != null || $rowvc['mb8'] != null)
                          {
                            $mtp8 = ((($rowvc['mt8']-$rowvc['mb8'])/$rowvc['mt8'])*100);
                          }
                          else
                          {
                            $mtp8 = '0.00';
                          }





                          if($mtp1<75 && $mtp1>0)
                          {
                            $mtc1='red';
                          }
                          else
                          {
                            $mtc1='transparent';
                          }
                          if($mtp2<75 && $mtp2>0)
                          {
                            $mtc2='red';
                          }
                          else
                          {
                            $mtc2='transparent';
                          }
                          if($mtp3<75 && $mtp3>0)
                          {
                            $mtc3='red';
                          }
                          else
                          {
                            $mtc3='transparent';
                          }
                          if($mtp4<75 && $mtp4>0)
                          {
                            $mtc4='red';
                          }
                          else
                          {
                            $mtc4='transparent';
                          }
                          if($mtp5<75 && $mtp5>0)
                          {
                            $mtc5='red';
                          }
                          else
                          {
                            $mtc5='transparent';
                          }
                          if($mtp6<75 && $mtp6>0)
                          {
                            $mtc6='red';
                          }
                          else
                          {
                            $mtc6='transparent';
                          }
                          if($mtp7<75 && $mtp7>0)
                          {
                            $mtc7='red';
                          }
                          else
                          {
                            $mtc7='transparent';
                          }
                          if($mtp8<75 && $mtp8>0)
                          {
                            $mtc8='red';
                          }
                          else
                          {
                            $mtc8='transparent';
                          }




                          if($rowvc['mdbm'] <= '20' && $rowvc['mdbm'] > '0')
                          {
                            $mdbcolc ='Green';
                          }
                          elseif($rowvc['mdbm'] > '20' && $rowvc['mdbm'] < '34')
                          {
                            $mdbcolc ='Yellow';
                          }
                          elseif($rowvc['mdbm'] >= '35')
                          {
                            $mdbcolc ='Red';
                          }
                          else
                          {
                            $mdbcolc ='Transparent';
                          }
                          if($rowvc['mndbm'] <= '20' && $rowvc['mndbm'] > '0')
                          {
                            $mndbcolc ='Green';
                          }
                          elseif($rowvc['mndbm'] > '20' && $rowvc['mndbm'] < '34')
                          {
                            $mndbcolc ='Yellow';
                          }
                          elseif($rowvc['mndbm'] >= '35')
                          {
                            $mndbcolc ='Red';
                          }
                          else
                          {
                            $mndbcolc ='Transparent';
                          }





                            //------------------MAIN ENGIN----------------------//

                            $sqlvckt = mysqli_query($db,"select `equipment`.`eqpt_id`, `equipment`.`cl`, `equipment`.`fdnl`, `equipment`.`lcul`, `equipment`.`lstl`, `equipment`.`nopvl`, `equipment`.`wjfacl`, `semap`.`sclass_id` from equipment, semap where equipment.eqpt_id = semap.eqpt_id AND equipment.eqpt_id='$eqpt'");   
                            $rowvckt = mysqli_fetch_array($sqlvckt,MYSQLI_ASSOC);
                            if($rowvckt['sclass_id'] == 1)
                            {
                                $limitkt = $rowvckt['wjfacl'];
                            }
                            elseif($rowvckt['sclass_id'] == 2)
                            {
                                $limitkt = $rowvckt['lcul'];
                            }
                            elseif($rowvckt['sclass_id'] == 7)
                            {
                                $limitkt = $rowvckt['lstl'];
                            }
                            elseif($rowvckt['sclass_id'] == 8)
                            {
                                $limitkt = $rowvckt['cl'];
                            }
                            elseif($rowvckt['sclass_id'] == 9)
                            {
                                $limitkt = $rowvckt['nopvl'];
                            }
                            elseif($rowvckt['sclass_id'] == 10)
                            {
                                $limitkt = $rowvckt['fdnl'];
                            }

                                if($rowvc['vpt1']>$limitkt)
                                {
                                    $vpt1c = 'red';
                                }
                                else
                                {
                                    $vpt1c = 'transparent';
                                }

                                if($rowvc['vpt2']>$limitkt)
                                {
                                    $vpt2c = 'red';
                                }
                                else
                                {
                                    $vpt2c = 'transparent';
                                }
                                
                                if($rowvc['vpt3']>$limitkt)
                                {
                                    $vpt3c = 'red';
                                }
                                else
                                {
                                    $vpt3c = 'transparent';
                                }

                                if($rowvc['vpt4']>$limitkt)
                                {
                                    $vpt4c = 'red';
                                }
                                else
                                {
                                    $vpt4c = 'transparent';
                                }

                                if($rowvc['vpt5']>$limitkt)
                                {
                                    $vpt5c = 'red';
                                }
                                else
                                {
                                    $vpt5c = 'transparent';
                                }

                                if($rowvc['vpt6']>$limitkt)
                                {
                                    $vpt6c = 'red';
                                }
                                else
                                {
                                    $vpt6c = 'transparent';
                                }

                                if($rowvc['vpt7']>$limitkt)
                                {
                                    $vpt7c = 'red';
                                }
                                else
                                {
                                    $vpt7c = 'transparent';
                                }

                                if($rowvc['vpt8']>$limitkt)
                                {
                                    $vpt8c = 'red';
                                }
                                else
                                {
                                    $vpt8c = 'transparent';
                                }

                                if($rowvc['vpt9']>$limitkt)
                                {
                                    $vpt9c = 'red';
                                }
                                else
                                {
                                    $vpt9c = 'transparent';
                                }

                                if($rowvc['vpt10']>$limitkt)
                                {
                                    $vpt10c = 'red';
                                }
                                else
                                {
                                    $vpt10c = 'transparent';
                                }

                                if($rowvc['vpt11']>$limitkt)
                                {
                                    $vpt11c = 'red';
                                }
                                else
                                {
                                    $vpt11c = 'transparent';
                                }

                                if($rowvc['vpt12']>$limitkt)
                                {
                                    $vpt12c = 'red';
                                }
                                else
                                {
                                    $vpt12c = 'transparent';
                                }

                                if($rowvc['vpt13']>$limitkt)
                                {
                                    $vpt13c = 'red';
                                }
                                else
                                {
                                    $vpt13c = 'transparent';
                                }

                                if($rowvc['vpt14']>$limitkt)
                                {
                                    $vpt14c = 'red';
                                }
                                else
                                {
                                    $vpt14c = 'transparent';
                                }
                            
                            //-------------------------------------------------//


                            
                            ?>