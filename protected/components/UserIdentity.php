<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

        private $_id;

    
	public function authenticate()
	{

		$user = User::model()->findByAttributes(array('username'=>$this->username));
                if($user===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
                
                // comparing against the pass column NOT password column when using oracle/postgres db
		else if($user->pass !== $user->encrypt($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
                        $this->_id = $user->id;
                            if($user->last_login_time === null){
                                $lastLogIn = time();
                                //User::model()->updateByPk($user->id,array('last_login_time'=> date("Y-m-d H:i:s")));
                            }
                            else{ 
                                $lastLogIn = strtotime($user->last_login_time);
                                //User::model()->updateByPk($user->id,array('last_login_time'=> date("Y-m-d H:i:s")));
                            }
                        $this->setState('lastLoginTime', $lastLogIn);
			$this->username=$user->username;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
                
	}	

      
	public function getId()
	{
            
		return $this->_id;
	}    
    
    
    
}