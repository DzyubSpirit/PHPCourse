<?php
	// session_start();
	define("LOG_TIME_FOR_WRONG_PASSWORD", "60");
	define("PUNISH_TIME_FOR_WRONG_PASSWORD", "3600");
	define("LOG_COUNT_TRIES", "3");

	function connectRedis() {
		$redis = new Redis();
		$redis->connect('localhost');
		return $redis;
	}

	function isNickLocked($redis, $nick) {
		$punishName = 'user_pass_attemps_punish_'.$nick;
		$ex = $redis->exists($punishName);
		if ($ex) {
			return array($ex, $redis->ttl($punishName));
		} else {
			$keyName = 'user_pass_attemps_'.$nick;
			$triesCount = 0;
			if ($redis->exists($keyName)) {
				$triesCount = $redis->get($keyName);
			}
			return array($ex, $triesCount);
		}
	}

	function getRemainingPunishTime($redis, $nick) {
		$punishName = 'user_pass_attemps_punish_'.$nick;
		$ex = $redis->exists($punishName);
		if (!$ex) {
			$keyName = 'user_pass_attemps_'.$nick;
			$triesCount = 0;
			if ($redis->exists($keyName)) {
				$triesCount = $redis->get($keyName);
				// echo $triesCount;
			}
			return array(!$ex, $triesCount);	
		}
	}

	function redisClearLogs($redis, $nick) {
		$keyName = 'user_pass_attemps_'.$nick;
		if ($redis->exists($keyName)) {
			$redis->delete($keyName);
		}
	}

	function redisIncLogs($redis, $nick) {
		$keyName = 'user_pass_attemps_'.$nick;
		if ($redis->exists($keyName)) {
			$n = $redis->incr($keyName);
			$redis->setTimeout($keyName, LOG_TIME_FOR_WRONG_PASSWORD);
		} else {
			$redis->set($keyName, '1');
			$redis->setTimeout($keyName, LOG_TIME_FOR_WRONG_PASSWORD);
			$n = 1;
		}
		if ($n > LOG_COUNT_TRIES)  {
			$punishName = 'user_pass_attemps_punish_'.$nick;
			$redis->set($punishName, 'true');
			$redis->setTimeout($punishName, PUNISH_TIME_FOR_WRONG_PASSWORD);
			// echo 'You are hazker!!!';
		}
		// echo $n;
	}
	// echo $redis;
?>