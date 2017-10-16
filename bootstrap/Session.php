<?php

	class Session{
		static function init(){
			session_start();
		}
		static function destroy(){
			session_destroy();
		}
		static function getValue($val){
			return $_SESSION[$val];
		}
		static function setValue($val,$conteudo){
			$_SESSION[$val]=$conteudo;
		}
		static function unsetValue($val){
			if($_SESSION[$val]){
				unset($_SESSION[$val]);
			}
		}
		static function exist($val){
			if(sizeof($_SESSION[$val])>0){
				return true;
			}else{
				return false;
			}

		}

	}
?>