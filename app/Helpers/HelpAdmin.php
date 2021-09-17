<?php

	namespace App\Helpers;
	use URL;

	use App\Models\Admin\Group;
	use App\Models\Admin\User;
	use App\Models\Admin\CreatedPermission;

	use App\Models\Entities\Entity;
	use App\Models\Entities\TypeOfEntity;
	
	/**
	* HelpAdmin
	*/
	class HelpAdmin
	{
		public static function completName($user = null) {
			if ($user == null) {
				$user = \Auth::user();
			}	

			$completName = $user->first_name .' '. $user->last_name;
			return $completName;
		}

		public static function permissionsUser($user = null) {
			if ($user == null) {
				$user = \Auth::user();
			}

			$data = [];
			if (HelpAdmin::IsUserDeveloper($user))
			{
				$data = CreatedPermission::all()->pluck('route')->toArray();
			} else
			{
				$permissions_user = $user->Group->Permission->pluck('created_permission_id')->toArray();
				$data = CreatedPermission::whereIn('id', $permissions_user)->pluck('route')->toArray();
			}
	        
	        return $data;
		}

		public static function UsersDevelopers() {
			$group = Group::where('tag', 'developer')->first();
			$users = $group->User;
			
			return $users;
		}
		public static function UsersAdministrator() {
			$group = Group::where('tag', 'administrator')->first();
			$users = $group->User;
			
			return $users;
		}
		public static function UsersProfessional() {
			$group = Group::where('tag', 'professional')->first();
			$users = $group->User;
			
			return $users;
		}
		public static function GetProfessional() {
			$type_of_entity = TypeOfEntity::where('tag', 'professional')->first();
			$entity = Entity::where('type_of_entity_id', $type_of_entity->id)->orderBy('created_at', 'desc')->get();
			
			return $entity;
		}

		public static function UsersOffice() {
			$group = Group::where('tag', 'office')->first();
			$users = $group->User;
			
			return $users;
		}
		public static function UsersShopkeeper() {
			$group = Group::where('tag', 'shopkeeper')->first();
			$users = $group->User;
			
			return $users;
		}

		public static function IsUserDeveloper($user = null) {
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'developer')
			{
				return true;
			}
			return false;
		}
		public static function IsUserAdministrator($user = null) {
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'administrator')
			{
				return true;
			}
			return false;
		}
		public static function IsUserProfessional($user = null) {
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'professional')
			{
				return true;
			}
			return false;
		}
		public static function IsUserOffice($user = null) {
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'office')
			{
				return true;
			}
			return false;
		}
		public static function IsUserShopkeeper($user = null) {
			if ($user == null)
			{
				$user = \Auth::user();
			}

			$group = $user->Group;
			if ($group->tag == 'shopkeeper')
			{
				return true;
			}
			return false;
		}
		

		public static function prepareNotification($notification) {
			$notification = explode(':', $notification);
			$result['type'] = $notification[0];
			$result['msg'] = $notification[1];
		
			return $result;
		}

		public static function getPreviousRoute() {
			return app('router')->getRoutes()->match(app('request')->create(url()->previous()))->getName();
		}

		public static function getStorageUrl() {
			$bar = DIRECTORY_SEPARATOR;
			$host_name = request()->getHttpHost();
			$storage_url = '';
			if ($host_name == '127.0.0.1:8000') {
				$storage_url = 'storage/';
			} else {
				$storage_url = '../storage/app/public/';
			}

			return $storage_url;
		
		}

		public static function calcPercent($value_reached, $amount) {
			$percentage = number_format(($value_reached / $amount) * 100, 2, '.', '') . '%';
			return $percentage;
		}

		public static function getUrlToSaveStorageMpdf() {
			$host_name = URL::to('/');
			$bar = DIRECTORY_SEPARATOR;

			return '../storage'.$bar.'app'.$bar.'public'.$bar;
		}
		
		public static function getColorGroup($tag) {
			return Group::where('tag', $tag)->first()->tag_color;
		}
	}