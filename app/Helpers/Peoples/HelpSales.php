<?php

	namespace App\Helpers\Peoples;
    use URL;
    
    use App\Helpers\HelpAdmin;

    use App\Models\Admin\User;
    use App\Models\Sales\Sale;
    use App\Models\Sales\MonthlySaleResult;
    use App\Models\Sales\AnnualSaleResult;
    use App\Models\Sales\CurrentSaleResult;
    use App\Models\Entities\Entity;

	class HelpSales
	{
        public static function getMyRankingNumSales($user_id) {
            return HelpSales::getRankingNumSales()[$user_id];
        }
        public static function getRankingNumSales() {
            $professionals_users = HelpAdmin::UsersProfessional();
            $offices_users = HelpAdmin::UsersOffice();
            $professionals_and_offices = collect([$professionals_users, $offices_users])->collapse();

            $ranking_sales = [];
            foreach ($professionals_and_offices as $key => $user) {
                if (HelpAdmin::IsUserProfessional($user)) {
                    $professional = $user->UserHasEntity->Entity;
                    if ($professional != null AND $professional->SpecifierSales->count() > 0)
                    {
                        $ranking_sales[$professional->id]['shoppings_num'] = $professional->SpecifierSales->count();
                    } else
                    {
                        $ranking_sales[$professional->id]['shoppings_num'] = 0;
                    }
                } else {
                    $office = $user->UserHasEntity->Entity;
                    if ($office != null AND $office->SpecifierSales->count() > 0)
                    {
                        $ranking_sales[$office->id]['shoppings_num'] = $office->SpecifierSales->count();
                    } else
                    {
                        $ranking_sales[$office->id]['shoppings_num'] = 0;
                    }
                }
            }
            arsort($ranking_sales);

            $position = 1;
            $current_sales = null;
            $current_position = 1;
            foreach ($ranking_sales as $key => $professional) {
                if ($current_sales == $professional['shoppings_num'])
                {
                    $ranking_sales[$key]['position'] = $current_position;
                } else
                {
                    $ranking_sales[$key]['position'] = $position;
                    $current_position = $position;
                }

                $position++;
                $current_sales = $professional['shoppings_num'];
            }

            return $ranking_sales;
        }

        public static function getMyRankingShoppValues($user_id) {
            return HelpSales::getRankingShoppValues()[$user_id];
        }
        public static function getRankingShoppValues() {
            $professionals_users = HelpAdmin::UsersProfessional();
            $offices_users = HelpAdmin::UsersOffice();
            $professionals_and_offices = collect([$professionals_users, $offices_users])->collapse();

            $ranking_sales = [];
            foreach ($professionals_and_offices as $key => $user) {
                if (HelpAdmin::IsUserProfessional($user)) {
                    $professional = $user->UserHasEntity->Entity;
                    if ($professional != null AND $professional->SpecifierSales->count() > 0)
                    {
                        $ranking_sales[$professional->id]['amount'] = 0;
                        foreach ($professional->SpecifierSales as $key => $sale) {
                            $ranking_sales[$professional->id]['amount'] += $sale->value;
                        }
                    } else
                    {
                        $ranking_sales[$professional->id]['amount'] = 0;
                    }
                } else {
                    $office = $user->UserHasEntity->Entity;
                    if ($office != null AND $office->SpecifierSales->count() > 0)
                    {
                        $ranking_sales[$office->id]['amount'] = 0;
                        foreach ($office->SpecifierSales as $key => $sale) {
                            $ranking_sales[$office->id]['amount'] += $sale->value;
                        }
                    } else
                    {
                        $ranking_sales[$office->id]['amount'] = 0;
                    }
                }
            }
            arsort($ranking_sales);

            $position = 1;
            $current_amount = null;
            $current_position = 1;
            foreach ($ranking_sales as $key => $professional) {
                if ($current_amount == $professional['amount'])
                {
                    $ranking_sales[$key]['position'] = $current_position;
                } else
                {
                    $ranking_sales[$key]['position'] = $position;
                    $current_position = $position;
                }

                $position++;
                $current_amount = $professional['amount'];
            }

            return $ranking_sales;
        }

        public static function getApproximateRankingPosition($position) {
            if ($position >= 1 AND $position <= 5) {
                return 5;
            } elseif ($position >= 6 AND $position <= 10) {
                return 10;
            } elseif ($position >= 11 AND $position <= 20) {
                return 20;
            } elseif ($position >= 21 AND $position <= 30) {
                return 30;
            } elseif ($position >= 31 AND $position <= 40) {
                return 40;
            } elseif ($position >= 41 AND $position <= 50) {
                return 50;
            } elseif ($position >= 51 AND $position <= 70) {
                return 70;
            } elseif ($position >= 71 AND $position <= 100) {
                return 100;
            } elseif ($position >= 101 AND $position <= 150) {
                return 150;
                
            } elseif ($position >= 151 AND $position <= 200) {
                return 200;
            } elseif ($position >= 201 AND $position <= 300) {
                return 300;
            } elseif ($position >= 301 AND $position <= 400) {
                return 400;
            } elseif ($position >= 401 AND $position <= 500) {
                return 500;
            } elseif ($position >= 501 AND $position <= 700) {
                return 700;
            } elseif ($position >= 701 AND $position <= 1000) {
                return 1000;
            } else {
                return 000;
            }
        }

        public static function getFilteredSales($data = []) {
            $sales = Sale::orderBy('created_at')->where('validated', '!=', null);
            if (!empty($data)) {
                $sales = $sales->whereIn('entity_id', $data['shopkeepers_select'])
                ->whereIn('specifier_id', $data['prof_and_offices_select']);
            }
            $sales = $sales->get();

            if (isset($data['selected_month']) AND $data['selected_month'] != null) {
                $start_date = date('Y').'-'.$data['selected_month'].'-01';
                $end_date = date("Y-m-t", strtotime($start_date));
                
                $sales = $sales->whereBetween('purchase_date', [$start_date, $end_date]);
            }

            if (isset($data['purchase_date']) AND $data['purchase_date'] != null) {
                // $purchase_date = explode(' - ', $data['purchase_date']);
                
                // foreach ($sales as $key => $sale) {
                //     if ($sale->purchase_date->format('Y/m/d') < $purchase_date[0] OR
                //         $sale->purchase_date->format('Y/m/d') > $purchase_date[1]) 
                //     {
                //         unset($sales[$key]);
                //     }
                // }
                // whereBetween
            }
            if (isset($data['created_at']) AND $data['created_at'] != null) {
                // $created_at = explode(' - ', $data['created_at']);
                // foreach ($sales as $key => $sale) {
                //     if ($sale->created_at->format('Y/m/d') < $created_at[0] OR
                //         $sale->created_at->format('Y/m/d') > $created_at[1])
                //     {
                //         unset($sales[$key]);
                //     }
                // }
            }
            return $sales;
        }

        public static function prepareRanking($data_received = [], $sales) {
            $data = [
                'ranking_types' => 1,
            ];
            $data = array_merge($data, $data_received);

            if ($data['ranking_types'] == 1) {
                $ranking = HelpSales::scoreOfSales($sales, $data);
            } elseif ($data['ranking_types'] == 2) {
                $ranking = HelpSales::numberOfSales($sales, $data);
            } elseif ($data['ranking_types'] == 3) {
                $ranking = HelpSales::scoreAndNumberOfSales($sales, $data);
                dd();
            } else {}

            return $ranking;
        }

        public static function scoreOfSales($sales, $data) {
            if (isset($data['prof_and_offices_select'])) {
                $specifiers = $data['prof_and_offices_select'];
            } else {
                $data['users_professionals'] = HelpAdmin::UsersProfessional()->where('group_for_entity_id', 1);
                $data['users_offices'] = HelpAdmin::UsersOffice()->where('group_for_entity_id', 1);
                $specifiers = $data['users_professionals']->merge($data['users_offices']);
    
                $specifiers = collect($specifiers)->map(function ($specifier) {
                    if ($specifier->UserHasEntity != null) {
                        return $specifier->UserHasEntity->Entity->id;
                    }
                });
            }
            
            if (isset($data['shopkeepers_select'])) {
                $shopkeepers_ids = $data['shopkeepers_select'];
            } else {
                $data['users_shopkeepers'] = HelpAdmin::UsersShopkeeper()->where('group_for_entity_id', 1);
                $shopkeepers_ids = $data['users_shopkeepers'];
                
                $shopkeepers_ids = collect($shopkeepers_ids)->map(function ($shopkeeper) {
                    if ($shopkeeper->UserHasEntity != null) {
                        return $shopkeeper->UserHasEntity->Entity->id;
                    }
                });
            }
            
            $rating_by_store = [];
            foreach ($shopkeepers_ids as $key => $shopkeeper_id) {
                $store_sales = $sales->where('entity_id', $shopkeeper_id);
                
                foreach ($specifiers as $key => $specifier_id) {
                    // $entity_specifier = Entity::find($specifier_id);
                    $rating_by_store[$shopkeeper_id][$specifier_id]['points'] = 0;
                    $shoppings_user = $store_sales->where('specifier_id', $specifier_id);
                    
                    foreach ($shoppings_user as $key => $shopping_user) {
                        $rating_by_store[$shopkeeper_id][$specifier_id]['points'] += $shopping_user->value;
                    }
                }
                arsort($rating_by_store[$shopkeeper_id]);
                
                $rating_by_store[$shopkeeper_id] = array_map(function($val) {
                    return explode(',', $val['points'])[0];
                }, $rating_by_store[$shopkeeper_id]);
            }
            $results['rating_by_store'] = $rating_by_store;

            $rating_of_user_points = [];
            foreach ($specifiers as $key => $specifier_id) {
                
                $rating_of_user_points[$specifier_id]['points'] = '0';
                foreach ($results['rating_by_store'] as $key => $rating_by_store) {
                    $rating_of_user_points[$specifier_id]['points'] += $rating_by_store[$specifier_id];
                }
            }
            arsort($rating_of_user_points);
            $results['overall_rating_of_user_points'] = $rating_of_user_points;

            return $results;
        }
        public static function numberOfSales($sales, $data) {
            $specifiers = $data['prof_and_offices_select'];

            $shopkeepers_ids = $data['shopkeepers_select'];

            $rating_by_store = [];
            foreach ($shopkeepers_ids as $key => $shopkeeper_id) {
                $store_sales = $sales->where('entity_id', $shopkeeper_id);
            
                foreach ($specifiers as $key => $specifier_id) {
                    $shoppings_user = $store_sales
                        ->where('specifier_id', $specifier_id)
                        ->pluck('cpf_or_cnpj_client')->toArray();

                    $rating_by_store[$shopkeeper_id][$specifier_id]['points'] = count(array_unique($shoppings_user));
                    // $rating_by_store[$shopkeeper_id][$specifier_id]['sales'] = count(array_unique($shoppings_user));
                }
                arsort($rating_by_store[$shopkeeper_id]);

                // $points = 100;
                // $current_amount = null;
                // $current_points = 100;
                // foreach ($rating_by_store[$shopkeeper_id] as $key => $user) {
                //     if ($user['sales'] == 0) {
                //         $rating_by_store[$shopkeeper_id][$key]['points'] = 0;
                //     } else {
                //         if ($current_amount == $user['sales']) {
                //             $rating_by_store[$shopkeeper_id][$key]['points'] = $current_points;
                //         } else {
                //             $rating_by_store[$shopkeeper_id][$key]['points'] = $points;
                //             $current_points = $points;
                //         }
    
                //         $points--;
                //         $current_amount = $user['sales'];
                //     }
                // }
            }
            $results['rating_by_store'] = $rating_by_store;
            // dd($results['rating_by_store']);

            $rating_of_user_points = [];
            foreach ($specifiers as $key => $specifier_id) {
                
                $rating_of_user_points[$specifier_id]['points'] = 0;
                foreach ($results['rating_by_store'] as $key => $rating_by_store) {
                    $rating_of_user_points[$specifier_id]['points'] += $rating_by_store[$specifier_id]['points'];
                }
            }
            arsort($rating_of_user_points);
            $results['overall_rating_of_user_points'] = $rating_of_user_points;
            // dd($results['overall_rating_of_user_points']);

            return $results;
        }
        public static function scoreAndNumberOfSales($sales, $data) {
            $shopping_values = HelpSales::scoreOfSales($sales, $data);
            $number_of_purchases = HelpSales::numberOfSales($sales, $data);

            foreach ($shopping_values['rating_by_store'] as $shopkeeper_id => $rating_by_store_1) {
                $rating_by_store_2 = $number_of_purchases['rating_by_store'][$shopkeeper_id];

                foreach ($rating_by_store_1 as $user_id => $user) {
                    $rating_by_store[$shopkeeper_id][$user_id]['points'] = $user['points'] + $rating_by_store_2[$user_id]['points'];
                }
                arsort($rating_by_store[$shopkeeper_id]);
            }
            $results['rating_by_store'] = $rating_by_store;


            $overall_rating_of_user_points = [];
            foreach ($results['rating_by_store'] as $shopkeeper_id => $rating_by_store) {
                foreach ($rating_by_store as $user_id => $user) {
                    if (isset($overall_rating_of_user_points[$user_id])) {
                        $overall_rating_of_user_points[$user_id]['points'] += $user['points'];
                    } else {
                        $overall_rating_of_user_points[$user_id]['points'] = $user['points'];
                    }
                }
            }
            arsort($overall_rating_of_user_points);
            $results['overall_rating_of_user_points'] = $overall_rating_of_user_points;
            
            return $results;
        }

        //
        public static function computingNewSalesForReports() {
            // $un_computed_sales = Sale::where([
            //     ['computed_for_reporting', null],
            //     ['validated', '!=', null],
            // ])->get();

            // if ($un_computed_sales->count()) {
            //     $specifier_id_array = array_unique($un_computed_sales->pluck('specifier_id')->toArray());    
            //     $entity_id_array = array_unique($un_computed_sales->pluck('entity_id')->toArray());    
    
            //     $un_computed_sales_dates = $un_computed_sales->pluck('purchase_date');
            //     $un_computed_sales_dates = $un_computed_sales_dates->map(function ($date) {
            //         return $date->format('Y-m');
            //     });
            //     $un_computed_sales_dates = array_unique($un_computed_sales_dates->toArray());
    
            //     // dd($un_computed_sales, $specifier_id_array, $un_computed_sales_dates, $entity_id_array);

            //     $data = [];
            //     foreach ($specifier_id_array as $specifier_id) {
            //         $data['specifier_id'] = $specifier_id;
            //         foreach ($entity_id_array as $entity_id) {
            //             $data['entity_id'] = $entity_id;
            //             foreach ($un_computed_sales_dates as $key => $un_computed_sale_date) {
            //                 $data['year'] = explode('-', $un_computed_sale_date)[0];
            //                 $data['month'] = explode('-', $un_computed_sale_date)[1];

            //                 dd($data, $sales);

                        
            //                 // $sales = Sale::where([
            //                 //     ['validated', '!=', null],
            //                 //     ['specifier_id', $specifier_id],
            //                 //     ['purchase_date', 'like', $un_computed_sale_date.'%'],
            //                 // ])->get();
        
        
        
            //                 // HelpSales::computingAccumulatedPoints($sales, $specifier_id);
            //                 // HelpSales::computingNumberOfSales($sales, $specifier_id);
            //             }
            //         }
            //     }
            // }
        }
        public static function computingAccumulatedPoints($sales, $specifier_id) {
            // foreach ($sales as $key => $sale) {
            //     $year = $sale->purchase_date->format('Y');
            //     $month = $sale->purchase_date->format('m');

            //     // MonthlySaleResult
            //         $monthly_sale_result = MonthlySaleResult::where([
            //             ['specifier_id', $specifier_id],
            //             ['entity_id', $sale->entity_id],
            //             ['year', $year],
            //             ['month', $month],
            //         ])->first();
                    
            //         if ($monthly_sale_result != null) {
            //             $data = ['accumulated_points' => intval($sale->value) + $monthly_sale_result->accumulated_points];
            //             // dd($data, $sale, $monthly_sale_result);

            //             $monthly_sale_result->update($data);
            //         } else {
            //             $data = [
            //                 'accumulated_points' => intval($sale->value),
            //                 'specifier_id' => $specifier_id,
            //                 'entity_id' => $sale->entity_id,
            //                 'year' => $year,
            //                 'month' => $month,
            //             ];

            //             MonthlySaleResult::create($data);
            //         }
            //     // MonthlySaleResult

            //     // AnnualSaleResult
            //         $annual_sale_result = AnnualSaleResult::where([
            //             ['specifier_id', $specifier_id],
            //             ['entity_id', $sale->entity_id],
            //             ['year', $year],
            //         ])->first();
                    
            //         if ($annual_sale_result != null) {
            //             $data = ['accumulated_points' => intval($sale->value) + $annual_sale_result->accumulated_points];
            //             // dd($data, $sale, $annual_sale_result);

            //             $annual_sale_result->update($data);
            //         } else {
            //             $data = [
            //                 'accumulated_points' => intval($sale->value),
            //                 'specifier_id' => $specifier_id,
            //                 'entity_id' => $sale->entity_id,
            //                 'year' => $year,
            //             ];

            //             AnnualSaleResult::create($data);
            //         }
            //     // AnnualSaleResult

            //     // CurrentSaleResult
            //         $current_sale_result = CurrentSaleResult::where([
            //             ['specifier_id', '=', $specifier_id],
            //             ['entity_id', '=', $sale->entity_id]
            //         ])->first();
            //         if ($current_sale_result != null) {
            //             $data = ['accumulated_points' => intval($sale->value) + $current_sale_result->accumulated_points];
            //             // dd($data, $sale, $current_sale_result);

            //             $current_sale_result->update($data);
            //         } else {
            //             $data = [
            //                 'accumulated_points' => intval($sale->value),
            //                 'specifier_id' => $specifier_id,
            //                 'entity_id' => $sale->entity_id,
            //             ];
                        
            //             CurrentSaleResult::create($data);
            //         }
            //     // CurrentSaleResult

            //     $sale->update(['computed_for_reporting' => date(now())]);
            // }
        }
        public static function computingNumberOfSales($sales, $specifier_id) {
            // $dates = $sales->pluck('purchase_date');
            // $dates = $dates->map(function ($date) {
            //     return $date->format('Y-m');
            // });
            // $dates = array_unique($dates->toArray());
            // // dd($dates);

            // foreach ($dates as $date) {
            //     // $year = $sale->purchase_date->format('Y');
            //     // $month = $sale->purchase_date->format('m');
                
            //     dd(Sale::where('specifier_id', $specifier_id)->where('purchase_date', 'like', '2021-02%')->get());
            //     // dd(2021-01);


            //     // MonthlySaleResult
            //         $monthly_sale_result = MonthlySaleResult::where([
            //             ['specifier_id', $specifier_id],
            //             ['entity_id', $sale->entity_id],
            //             ['year', $year],
            //             ['month', $month],
            //         ])->first();
                    
            //         if ($monthly_sale_result != null) {
            //             $data = ['accumulated_points' => intval($sale->value) + $monthly_sale_result->accumulated_points];
            //             // dd($data, $sale, $monthly_sale_result);

            //             $monthly_sale_result->update($data);
            //         } else {
            //             $data = [
            //                 'accumulated_points' => intval($sale->value),
            //                 'specifier_id' => $specifier_id,
            //                 'entity_id' => $sale->entity_id,
            //                 'year' => $year,
            //                 'month' => $month,
            //             ];

            //             MonthlySaleResult::create($data);
            //         }
            //     // MonthlySaleResult

            //     // AnnualSaleResult
            //         $annual_sale_result = AnnualSaleResult::where([
            //             ['specifier_id', $specifier_id],
            //             ['entity_id', $sale->entity_id],
            //             ['year', $year],
            //         ])->first();
                    
            //         if ($annual_sale_result != null) {
            //             $data = ['accumulated_points' => intval($sale->value) + $annual_sale_result->accumulated_points];
            //             // dd($data, $sale, $annual_sale_result);

            //             $annual_sale_result->update($data);
            //         } else {
            //             $data = [
            //                 'accumulated_points' => intval($sale->value),
            //                 'specifier_id' => $specifier_id,
            //                 'entity_id' => $sale->entity_id,
            //                 'year' => $year,
            //             ];

            //             AnnualSaleResult::create($data);
            //         }
            //     // AnnualSaleResult

            //     // CurrentSaleResult
            //         $current_sale_result = CurrentSaleResult::where([
            //             ['specifier_id', '=', $specifier_id],
            //             ['entity_id', '=', $sale->entity_id]
            //         ])->first();
            //         if ($current_sale_result != null) {
            //             $data = ['accumulated_points' => intval($sale->value) + $current_sale_result->accumulated_points];
            //             // dd($data, $sale, $current_sale_result);

            //             $current_sale_result->update($data);
            //         } else {
            //             $data = [
            //                 'accumulated_points' => intval($sale->value),
            //                 'specifier_id' => $specifier_id,
            //                 'entity_id' => $sale->entity_id,
            //             ];
                        
            //             CurrentSaleResult::create($data);
            //         }
            //     // CurrentSaleResult

            //     $sale->update(['computed_for_reporting' => date(now())]);
            // }
        }
        //


        public static function deleteInvalidSales() {
            $sales = Sale::orderBy('created_at', 'desc')->get();
            $count = 0;
            foreach ($sales as $sale) {
                if ($sale->User == null OR $sale->Specifier == null OR $sale->Entity == null) {
                    $sale->delete();
                    $count++;
                }
            }
            return $count;
        }

        public static function getEntity($entity_id) {
            return Entity::find($entity_id);
        }
    }