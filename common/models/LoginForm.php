<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\Cookie;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
	///public $password_hash;
	public $email;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            //$user->user_type_id == User::TYPE_ADMIN || $user->user_type_id == User::TYPE_SUB_ADMIN
            if(true){
                $da = Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);

                $cookie = new Cookie([
                    'name' => 'sockssid',
                    'value' => session_id(),
                    'domain' => '.rococpm.net'
                ]);
                \Yii::$app->getResponse()->getCookies()->add($cookie);

                return $da;
            }
            else{
                Yii::$app->getSession()->setFlash('error', 'Sorry, you are not authorized user.');
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function loginClient()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            $da =  Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
            /*if($user->user_type_id == User::TYPE_ADMIN || $user->user_type_id == User::TYPE_SUB_ADMIN){
                return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
            }
            elseif ($user->user_type_id == User::TYPE_CLIENT_USER){
                if( $this->checkClientUsers() ){
                    return Yii::$app->user->login($user, $this->rememberMe ? 3600 * 24 * 30 : 0);
                }
                else{
                    Yii::$app->getSession()->setFlash('error', 'Sorry, you are not authorized user.');
                    return false;
                }
            }*/

             $cookie = new Cookie([
                    'name' => 'sockssid',
                    'value' => session_id(),
                    'domain' => '.rococpm.net'
                ]);
                \Yii::$app->getResponse()->getCookies()->add($cookie);

                return $da;
            
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
    
    private function checkClientUsers(){
        $clientUser = ClientsUsers::findOne ( [ 
                    'user_id' => $this->_user->id,
                    'client_id' => \Yii::$app->client->id,
                    'userStatus' => 1
		] );
        if($clientUser)
            return true;
        else
            false;
    }
}
