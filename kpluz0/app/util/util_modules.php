<?php
/* util_modules.php contains the functions used for manipulating the tables related to kpluz modules in the database */
require_once('db_connection.php');

class ModuleManager{

	function __construct(){

	}

	function dbFetchModules($SubjectID, $GradeLevel, $ParentID){
		return R::getAll('SELECT * from tblModule WHERE fkSubjectID=? and fkGradeLevelID=? and ParentModuleID=? and ParentModuleID!=ModuleID ORDER BY ModuleID', array($SubjectID, $GradeLevel + 1, $ParentID));	
	}

	function dbFetchTopModules($SubjectID, $GradeLevel){
		return R::getAll('SELECT * from tblModule WHERE fkSubjectID=? and fkGradeLevelID=? and ParentModuleID=ModuleID ORDER BY ModuleID', array($SubjectID, $GradeLevel + 1));	
	}

	function dbFetchAllModules($GradeLevel){
		return R::getAll('SELECT * from tblModule WHERE fkGradeLevelID=? ORDER BY ParentModuleID, ParentModuleID=ModuleID DESC', array($GradeLevel + 1));	
	}

	function dbFetchAllSubjects(){
		return R::getAll('SELECT * from tblSubject WHERE isActive=1 ORDER BY SortOrder');
	}

	function getLegacyUrl($moduleID){
		return R::getAll('SELECT * FROM tblModule JOIN tblSubject ON(tblModule.fkSubjectID = tblSubject.SubjectID) WHERE ModuleID=?', array($moduleID))[0];
	}

}

?>