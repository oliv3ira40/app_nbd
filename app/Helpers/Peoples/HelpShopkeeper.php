<?php

	namespace App\Helpers\Peoples;
    use URL;
    
    use App\Helpers\HelpAdmin;

    use App\Models\Admin\User;
    use App\Models\Entities\Entity;
    use App\Models\Entities\TypeOfEntity;
	
	/**
	* HelpShopkeeper
	*/
	class HelpShopkeeper
	{
        // Buyers Selector
        public static function getUsersConnectedToOffices() {
            $type_of_entity = TypeOfEntity::where('tag', 'office')->first();
            $entities = Entity::where('type_of_entity_id', $type_of_entity->id)->get();
            dd($entities);
            $offices = Office::select('id', 'name')->get();
            foreach ($offices as $key => $office) {
                $offices_has_professionals = $office->OfficesHasProfessionals;

                if ($offices_has_professionals->count() > 0)
                {
                    $n = [];
                    foreach ($offices_has_professionals as $key => $office_has_professional) {
                        $professional = $office_has_professional->Professional;
                        $user = $professional->User;
                        
                        array_push($n, $user);
                    }
                    $office['users'] = $n;
                } else
                {
                    unset($offices[$key]);
                }
            }

            return $offices;
        }
        public static function getUsersOnly() {
            $users_professional = HelpAdmin::UsersProfessional();
            foreach ($users_professional as $key => $user) {
                if ($user->Professional == null OR $user->Professional->OfficeHasProfessional != null) {
                    unset($users_professional[$key]);
                }
            }

            return $users_professional;
        }

        
    }