<?php

	namespace App\Helpers\Peoples;
    use URL;
    
    use App\Helpers\HelpAdmin;

    use App\Models\Admin\User;
    use App\Models\Sales\Sale;
    use App\Models\Entities\Entity;
	
	/**
	* HelpProfessional
	*/
	class HelpProfessional
	{

        public static function shoppingsByStore($professional)
        {
            $id_shopkeepers = array_filter($professional->SpecifierSales->pluck('entity_id')->toArray());
            $shopkeepers = Entity::select('id', 'name')->whereIn('id', $id_shopkeepers)->get();

            foreach ($shopkeepers as $key => $shopkeeper) {
                $shopkeeper->for_the_professional = $shopkeeper->SpecifierSales
                    ->where('specifier_id', $professional->id)->count();

                $shopkeeper->last_shopping = $shopkeeper->SpecifierSales->sortByDesc('purchase_date')->first();
            }

            return $shopkeepers;
        }

    }