<?php
namespace common\components;
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use yii\web\ForbiddenHttpException;
use common\models\UserType;
use common\models\Clients;
use common\models\User;
use common\models\Departments;
 
class GRbacManager extends Component
{
	const ROLE_OWNER = 0;
	const ROLE_DIRECTOR = 1;
	const ROLE_SUPERVISOR = 2;
	const ROLE_STAFF = 3;
	const ROLE_LEADER = 4;

	// systems default roles - as per clients specs
	public $defaultRoles = ['owner', 'director', 'supervisor', 'staff', 'leader'];
	// system default departments - as per clients specs
	public $defaultDepartments = ['Financial'];
	
	public $backendItems = [
		//controller => array of actions
		'site' => ['login','index','resetPassword','logout','error'],
		'clients'=> ['index','view','create','update','delete'],
		'user'=> ['index','view','create','update','delete', 'profile'],
		'user-type'=> ['index','view','update','delete'], // 'create' cannot create since 9/10/2015
		'settings'=> ['index'],
	];

	public $clientItems = [
		//controller => array of actions
		'client-settings' => ['add-settings'],
		'site' => ['logout', 'index', 'login', 'error', 'notifications', 'chat', 'update-user-history'],
		'user' => ['index', 'view', 'create', 'update', 'delete', 'profile', 'invite'],
		'user-type' => ['index', 'view', /*'create',*/ 'update'],
		'departments' => ['index', 'view', 'create', 'update', 'delete'],
		'vendors' => ['index', 'view', 'create', 'update','delete'],
		'items' => ['index', 'view', 'create', 'update', 'delete', 'addvendor', 'updatevendor', 'deletevendor'],
		'projects' => ['index', 'create', 'update', 'delete', 'detail', 'copy', 'invite', 'update-user-history','archive'],
		'tasks' => ['index', /*'view',*/ 'create', 'update', 'delete', 'detail','upload-file','delete-task-file','add-comment','update-comment','delete-comment','copy', 'update-user-history'],
		'phases' => ['create', 'delete','detail'],
		'purchase-orders' => ['index', 'view', 'create', 'update','delete','add-item','update-item','delete-item', 'update-approval','approvedAcrossDepartment','delete-selected','archived-selected'],
		'settings' => ['index'],
		'budget' => ['index', 'view', 'create' , 'update' , 'delete'],
		'project-notifications' => ['new-comment','new-file','update-status','update-duedate','update-description','phase-added'],
		'task-notifications' => ['new-comment','new-file','update-status','update-duedate','update-description']
	];

	public function checkUserAccess($userId, $controllerName, $actionName)
	{
		$auth = Yii::$app->authManager;
		return $auth->checkAccess((int) $userId,$controllerName . "-" . $actionName, []);
	}

	/**
	 * Creates a new role
	 * @param  [string] $roleName - role name, should be unique
	 * @return [boolean]
	 */
	public function createRole ($roleName)
	{
		$role = Yii::$app->authManager->createRole($roleName);
        // throws exception if not valid role name
        return Yii::$app->authManager->add($role);
	}

	/**
	 * updates a role
	 * @param  [string] $newRoleName 
	 * @param  [string] $oldRoleName 
	 * @return boolean
	 */
	public function updateRole ($newRoleName, $oldRoleName)
	{
		// we will not allow rolename change on client end, we will use user type name for display
		if(isset(Yii::$app->client)){
			return true;
	    }
	    $role = Yii::$app->authManager->createRole($newRoleName);
        // throws exception if not valid role name
        if(isset($role)){
        	return Yii::$app->authManager->update($oldRoleName,$role);
        }
		return false;
	}

	/**
	 * removes a role
	 * @param  [string] $roleName
	 * @return [boolean]
	 */
	public function removeRole($roleName)
	{
		$role = $this->getRole($roleName);
		if(isset($role)){
        	return Yii::$app->authManager->remove($role);
        }
		return false;
	}
	
	/**
	 * returns a role based on role name
	 * @param  [str] $roleName
	 * @return [role]/[null] 
	 */
	public function getRole ($roleName)
	{
		return Yii::$app->authManager->getRole($roleName);
	}

	/**
	 * returns a role based on role name, if not found it creates and returns
	 * @param  [str] $roleName
	 * @return [role]/[null] 
	 */
	public function getRoleByForce ($roleName)
	{
		return (null !== $this->getRole($roleName)) ?  $this->getRole($roleName) : $this->createRole($roleName); 
	}

	/**
	 * creates a new permission
	 * @param  string $name   
	 * @param  string $description 
	 * @return [boolean]         
	 */
	public function createPermission ($name, $description = '')
	{
		$permission = Yii::$app->authManager->createPermission($name);
        
        if($description == '')
        	$description = 'permission to access '.$name;
        
        $permission->description = $description;
        return Yii::$app->authManager->add($permission);
	}

	/**
	 * removes all permissions for a rolename
	 * @param   $rolename 
	 * @return 
	 */
	public function removeAllPermissions ($rolename)
	{
		$role = $this->getRole($rolename);
		if(isset($role)){
			Yii::$app->authManager->removeChildren($role);
		}
		return true;
	}

	/**
	 * gets all system permissions 
	 * @return [type] [description]
	 */
	public function getSystemPermissions ()
	{
		$perms = [];
		$sysPermissions = Yii::$app->authManager->getPermissions();
		foreach ($sysPermissions as $perm) {
			$perms[] = $perm->name;
		}
		return $perms;
	}

	/**
	 * creates permissions from system permissions for backend
	 * @return 
	 */
	public function createPermissionsForBackend()
	{
		$existingPermissions = $this->getSystemPermissions();

		foreach ($this->backendItems as $controller => $actions) {
			foreach ($actions as $pos => $actionName) {
				if (!in_array($controller."-".$actionName, $existingPermissions))	
					$this->createPermission($controller."-".$actionName, 'permission to access '.$actionName);
			}
		}
	}

	/**
	 * creates permissions for clientend 
	 * @return
	 */
	public function createPermissionsForClientend()
	{
		$existingPermissions = $this->getSystemPermissions();

		foreach ($this->clientItems as $controller => $actions) {
			foreach ($actions as $pos => $actionName) {
				if (!in_array($controller."-".$actionName, $existingPermissions))	
					$this->createPermission($controller."-".$actionName, 'permission to access '.$actionName);
			}
		}
	}

	/**
	 * returns permission by permission name 
	 * @param  string $permissionName 
	 * @return          
	 */
	public function getPermission ($permissionName)
	{
		return Yii::$app->authManager->getPermission($permissionName);
	}

	/**
	 * returns all permissions for a role 
	 * @param  string $roleName 
	 * @return            
	 */
	public function getPermissionsForRole ($roleName)
	{
		$perms = [];
		$sysPermissions = Yii::$app->authManager->getPermissionsByRole($roleName);

		foreach ($sysPermissions as $perm) {
			$perms[] = $perm->name;
		}
		return $perms;
	}

	/**
	 * returns all permissions for a controller name - action list
	 * @param  string $roleName       
	 * @param  string $controllerName 
	 * @return                  
	 */
	public function getPermissionsForRoleByControllerName ($roleName, $controllerName)
	{
		$perms = [];
		//$allPermissions = $this->getSystemPermissions();
		$rolePermissions = $this->getPermissionsForRole($roleName);
		
		// HEHE //you naughty boy
		//$controllerActions = $allPermissions[$controllerName];
		if(isset(Yii::$app->client))
			$controllerActions = $this->clientItems[$controllerName];
		else
			$controllerActions = $this->backendItems[$controllerName];

		foreach ($controllerActions as $key => $action) {
			if(in_array($controllerName."-".$action, $rolePermissions))	
				array_push($perms, $action);
		}
		return $perms;
	}

	/**
	 * assigns a permission to a role 
	 * @param  string $roleName   
	 * @param  object $permission 
	 * @return              
	 */
	
	public function assignPermissionToRole ($roleName, $permission)
	{
		// echo $roleName."<br>";
		// print_r($permission);
		// echo "<br>";
		$role = $this->getRole ($roleName);
		if(isset($role) && !Yii::$app->authManager->hasChild($role, $permission)){
			Yii::$app->authManager->addChild($role, $permission);
		}
	}

	/**
	 * revoke all rights of a user
	 * @param  int $userId 
	 * @return          
	 */
	
	public function revokeAllUser ($userId)
	{
		return Yii::$app->authManager->revokeAll($userId);
	}

	/**
	 * assign a role to a user
	 * @param  int $userTypeId 
	 * @param  int $userId     
	 * @return              
	 */
	
	public function assignRoleToUser($userTypeId, $userId)
	{
		//get role from user type Id
		$userType = UserType::find()->where(['id' => $userTypeId])->one();
		if(isset($userType)){	
			//get role from usertype name
			$role = isset(Yii::$app->client) ? $this->getRole($userType->auth_manager_name) : $this->getRole($userType->type);
			if(isset($role)){
				// assign role to user
				Yii::$app->authManager->assign($role, $userId);
			}
		}
	}

	/**
	 * creates default roles and user types for a client to use at creation of a new client
	 * @param  int $clientId 
	 * @return     
	 */
	public function createDefaultRolesForClient ($clientId)
	{
		// validate client
		$client = Clients::find()->where(['id' => $clientId])->one();
		if(isset($client->id)){	
			// get all default roles
			foreach ($this->defaultRoles as $role) {
				// create types for these roles if it doesnt exist
				$clientType = UserType::find()->where(['auth_manager_name' => $client->id."-".$role])->one();
				if(!isset($clientType)){
					$model = new UserType();
					$model->type = $role.$client->id;
					$model->label = $role;
		            $model->active = 1;
		            $model->added_at = date('U');
		            $model->updated_at = date('U');
					$model->status = 0;
					$model->ut_client_id = $client->id;
					$model->auth_manager_name = $client->id."-".$role;
					if($model->save())
					{
						// create roles for the create types
						$role = $this->getRoleByForce($client->id."-".$role);
						// assign default permissions to these roles accordingly
						$this->createDefaultPermissionForUserTypes($model);
					}
				}
			}
		}
		// finishta!
	}

	public function createDefaultPermissionForUserTypes($model)
	{
		// $this->createPermissionsForClientend();
        $siteActions['site'] = $this->clientItems['site'];
        
        foreach ($siteActions as $controller => $actionList)
        {
            foreach ($actionList as $action) {
                $perm= $controller."-".$action;
                //check if permission exists
                $permission = $this->getPermission($perm);
                //else create it
                if(!isset($permission))
                    $permission = $this->createPermission($perm);
                
                //assign new permissions
                $this->assignPermissionToRole($model->auth_manager_name, $permission);
            }
        }
	}

	/**
	 * creates default roles and user types for a client to use at creation of a new client
	 * @param  int $clientId 
	 * @return     
	 */
	public function createDefaultDeparmentsForClient($clientId)
	{
		// validate client
		$client = Clients::find()->where(['id' => $clientId])->one();
		if(isset($client->id)){	
			// get all default departments
			foreach ($this->defaultDepartments as $dept) {
				// create types for these roles if it doesnt exist
				// $clientType = UserType::find()->where(['auth_manager_name' => $client->id."-".$role])->one();
				// if(!isset($clientType)){
					$model = new Departments();
					$model->dep_client_id = $clientId;
					$model->dep_name = $dept;
					if($model->save())
						$model->addConversation();
				// }
			}
		}
		// finishta!
	}

	/**
	 * deletes default roles and user types for a client when client is deleted - TBD
	 * @param  int $clientId 
	 * @return     
	 */
	public function removeDefaultRolesForClient ($clientId)
	{

	}

	public function getClientEndSideBar($filter = false)
	{
		// @todo some cache system
		$sideBar = [
			'dashboard' => [
				'name' => 'Dashboard',
				'url' => ['site/index'], // so if Url::home is different we are screwed :D
				'active' => 'site' 
			],
			'projects' => [
				'name' => 'Projects',
				'url' => ['projects/index'],
				'active' => 'projects'
			],
			'vendors' => [
				'name' => 'Vendors',
				'url' => ['vendors/index'],
				'active' => 'vendors'
			],
			'items' => [
				'name' => 'Items',
				'url' => ['items/index'],
				'active' => 'items'
			],
			'purchaseorders' => [
				'name' => 'Purchase Orders',
				'url' => ['purchase-orders/index'],
				'active' => 'purchase-orders'
			],
			'budget' => [
				'name' => 'Budgets',
				'url' => ['budget/index'],
				'active' => 'budget'
			]		
		];

		if($this->isProCreator() === false)
		{
			if(\Yii::$app->user->can('projects-index') === false)
				unset($sideBar['projects']);

			if(\Yii::$app->user->can('vendors-index') === false)
				unset($sideBar['vendors']);

			if(\Yii::$app->user->can('items-index') === false)
				unset($sideBar['items']);

			if(\Yii::$app->user->can('purchase-orders-index') === false)
				unset($sideBar['purchaseorders']);

			if(\Yii::$app->user->can('budget-index') === false)
				unset($sideBar['budget']);
		}

		return $sideBar;
	}

	public function isValidRole($roleName)
	{
		$userRole = User::getCurrentUserRole();

		if(isset($userRole))
		{
			if($userRole == (Yii::$app->client->id . '-' . $roleName))
				return true;
		}

		return false;
	}

	public function isOwner()
	{
		return $this->isValidRole($this->defaultRoles[self::ROLE_OWNER]);	
	}

	public function isDirector()
	{
		return $this->isValidRole($this->defaultRoles[self::ROLE_DIRECTOR]);
	}

	public function isSupervisor()
	{
		return $this->isValidRole($this->defaultRoles[self::ROLE_SUPERVISOR]);
	}

	public function isStaff()
	{
		return $this->isValidRole($this->defaultRoles[self::ROLE_STAFF]);
	}

	public function isLeader()
	{
		return $this->isValidRole($this->defaultRoles[self::ROLE_LEADER]);
	}

	public function getClientRoleLeader()
	{
		return Yii::$app->client->id . '-' . $this->defaultRoles[self::ROLE_LEADER];
	}

	public function isAdmin()
	{
		return User::isAdmin();
	}

	// Owner Or Admin
	public function isProCreator()
	{
		return ($this->isOwner() || $this->isAdmin());
	}

	public function isModerator()
	{
		return ($this->isDirector() || $this->isSupervisor() || $this->isStaff() || $this->isLeader());
	}

	public function formatRoleName($roleName)
	{
		return str_replace(' ', '-', strtolower($roleName));
	}
}