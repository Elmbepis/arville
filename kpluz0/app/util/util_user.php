<?php
/* util_user.php contains the classes used for manipulating the tables related to user information in the database */
require_once('db_connection.php');
require_once('lib/PHPass/PHpass.php');

class UserManager{

	private $kpluz_salt = '8MqQ2GWxv8z23BVDDyCCxwMWAywF9rea';
	private $adapter;
	private $phpassHash;

	function __construct(){
		$this->adapter = new \Phpass\Hash\Adapter\Sha256Crypt(array (
			'iterationCount' => 95000,
			'salt' => $this->kpluz_salt
		));
		$this->phpassHash = new \Phpass\Hash($this->adapter);
	}

	function createUser($username, $password, $gradeLevel = 1, $firstName = '', $middleName = '', $lastName = '', $schoolID = 1){
		$password = $this->hashPassword($password); 		/* hash password for storage */
		$gradeLevel += 1; 							/* grade level ID is 1 higher than the actual grade level i.e. grade level 4 is GradeLevelID 5 in the database */
		$date = date("Y-m-d H:i:s");
		R::exec('INSERT INTO tblUser (Username, Password, fkGradeLevelID, FirstName, MiddleName, LastName, fkSchoolID, DateCreated) VALUES (?,?,?,?,?,?,?,?)', array($username, $password, $gradeLevel, $firstName, $middleName, $lastName, $schoolID, $date));
		$this->createUserAccess($username, 1, true);
		$this->createUserAccess($username, 2, true);
		$this->createUserAccess($username, 3, true);
		$this->createUserAccess($username, 4, true);
		$this->createUserAccess($username, 5, true);
		$new_user_id = R::getCell('SELECT LAST_INSERT_ID();')[0];
		return $new_user_id;
	}

	function createUserAccess($username, $subjectID, $isEnabled){
		$userID = R::getCell('SELECT UserID from tblUser where Username=?', array($username))[0];
		$date = date("Y-m-d H:i:s");
		R::exec('INSERT INTO tblUserAccess (fkUserID, fkSubjectID, isEnabled, DateCreated) VALUES(?,?,?,?)', array($userID, $subjectID, $isEnabled, $date));
	}

	function setUserAccess($username, $subjectID, $isEnabled){
		$userID = R::getCell('SELECT UserID from tblUser where Username=?', array($username))[0];
	}

	function validateUser($username, $password){
		$storedHash = R::getCell( 'SELECT Password FROM tblUser WHERE Username=? LIMIT 1', array($username));	
		return $this->verifyPassword($password, $storedHash);
	}

	function fetchUser($username){
		$user = null;
		$user_details = R::getAll('SELECT * FROM tblUser WHERE Username=?', array($username));
		if(count($user_details) == 1){
			$user = new User();
			$user->fillFromArray($user_details[0]);
		}
		/* function returns a user object */
		return $user;
	}

	function updateUser($user){
		/* function accepts a user object as input */
		R::exec('UPDATE tblUser SET fkSchoolID=?, fkGradeLevelID=?, FirstName=?, MiddleName=?, LastName=? WHERE UserID = ?', array($user->getFkSchoolID(), $user->getFkGradeLevelID(), $user->getFirstName(), $user->getMiddleName(), $user->getLastName(), $user->getUserID()));
	}

	function checkUsernameExists($username){
		$result = R::getCell( 'SELECT Username FROM tblUser WHERE Username=? LIMIT 1', array($username));	
		if($result!=null){
			return true;
		}
		return false;
	}

	function deleteUser($username){
		R::exec('DELETE FROM tblUser WHERE Username=?', array($username));
		return true;
	}

	/* private functions */
	private function hashPassword($password){
		$result = $this->phpassHash->hashPassword($password);
		return $result;
	}

	private function verifyPassword($password, $hashedPassword){
		return $this->phpassHash->CheckPassword($password, $hashedPassword);
	}

	private function isUserInAccount($username, $table){

		$cols = R::inspect($table);

		// print_r($cols);

		$key = 'Username';
		if(array_key_exists('Cardholder', $cols)){
			$key = 'Cardholder';
		}

		$result = R::getCell( 'SELECT '.$key.' FROM '.$table.' WHERE '.$key.'=? LIMIT 1', array($username));	
		if($result!=null){
			return true;
		}
		return false;
	}

	function getModulesForUser($username){
		// return R::getAll('SELECT * FROM tblModule JOIN tblUser ON(tblUser.fkGradeLevelID = tblModule.fkGradeLevelID) JOIN tblUserAccess ON (tblUser.UserID = tblUserAccess.fkUserID) WHERE tblUser.Username=? AND tblModule.isActive = 1 AND tblUserAccess.isEnabled = 1 AND tblModule.fkSubjectID = tblUserAccess.fkSubjectID', array($username));
		$result = array();
		$subjects = array();
		$modules = array();
		$tables = array('EPluz_accounts'=>'English', 'MPluz_Accounts' => 'Math', 'SPluz_accounts' => 'Science','APluz_accounts' => 'Araling Panlipunan', 'FPluz_accounts' => 'Filipino' );

		foreach ($tables as $table => $subjectName) {
			if($this->isUserInAccount($username, $table)){

				$cols = R::inspect($table);
				$key = 'Username';
				if(array_key_exists('Cardholder', $cols)){
					$key = 'Cardholder';
				}

				$gradeLevel = intval(R::getCell('SELECT Level FROM '.$table.' WHERE '.$key.'=?', array($username))[0]);
				$_subject = R::getAll('SELECT * FROM tblSubject WHERE SubjectName=?', array($subjectName));
				// $_modules = R::getAll('SELECT ModuleID, ModuleName, fkGradeLevelID, fkSubjectID, ParentModuleID, LegacyUrl FROM tblModule JOIN tblSubject ON(tblModule.fkSubjectID = tblSubject.SubjectID) WHERE SubjectName = ? AND GradeLevelID = ? ORDER BY  ParentModuleID, ParentModuleID=ModuleID DESC', array($subjectName, $gradeLevel+1));
				$_modules = R::getAll('SELECT ModuleID, ModuleName, fkGradeLevelID, fkSubjectID, ParentModuleID, LegacyUrl FROM tblModule JOIN tblSubject ON(tblModule.fkSubjectID = tblSubject.SubjectID) WHERE SubjectName=? AND fkGradeLevelID=? AND tblModule.isActive=1 ORDER BY  ParentModuleID, ParentModuleID=ModuleID DESC', array($subjectName, $gradeLevel+1));
				foreach ($_modules as $__module) {
							
					$subject_modules = array();
					array_push($modules, $__module);
				}
				array_push($subjects, $_subject[0]);
			}
		}
		$result["Subjects"] = $subjects;
		$result["Modules"] = $modules;
		
		return $result;
	}

}

class User{

	private $UserID;
	private $fkSchoolID;
	private $fkGradeLevelID;
	private $Username;
	private $FirstName;
	private $MiddleName;
	private $LastName;

	public function fillFromArray($array){
		if(is_array($array)){
			foreach ($array as $key => $value) {
				if($key != 'Password'){
					$this->{$key} = $value;
				}
			}
		}
	}

    public function getUserID(){
        return $this->UserID;
    }

    public function getFkSchoolID()
    {
        return $this->fkSchoolID;
    }

    public function setFkSchoolID($fkSchoolID)
    {
        $this->fkSchoolID = $fkSchoolID;
        return $this;
    }


    public function getFkGradeLevelID()
    {
        return $this->fkGradeLevelID;
    }

    public function setFkGradeLevelID($fkGradeLevelID)
    {
        $this->fkGradeLevelID = $fkGradeLevelID;
        return $this;
    }

    public function getUsername()
    {
        return $this->Username;
    }

    public function getFirstName()
    {
        return $this->FirstName;
    }

    public function setFirstName($FirstName)
    {
        $this->FirstName = $FirstName;
        return $this;
    }

    public function getMiddleName()
    {
        return $this->MiddleName;
    }

    public function setMiddleName($MiddleName)
    {
        $this->MiddleName = $MiddleName;
        return $this;
    }

    public function getLastName()
    {
        return $this->LastName;
    }

    public function setLastName($LastName)
    {
        $this->LastName = $LastName;
        return $this;
    }

}

?>