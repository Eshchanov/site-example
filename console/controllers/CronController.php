<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\helpers\FileHelper;

class CronController extends Controller
{
	public function sendMessageToChannel($info)
	{
		$apiToken = '1399590062:AAEFMMFbafAVxdIl88LFbNrPBoihB8uhXyE';
		$data = [
			// 'chat_id' => '-1001740823963', // BTS Coders
			'chat_id' => '-1001391403109', // BTS Backup
			'text' => $info,
		];
		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
	}

	public function sendMessageToRasulbek($info)
	{
		$apiToken = '681245143:AAH1jv9QWp_yYy1Tvt8WV-SorF_BUF27QQ8';
        $data['chat_id'] = '402975684';
        $data['text'] = $info;
		$response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data));
	}

	public function actionFreeDisk()
	{
		$freeBytes = disk_free_space("/");
		if ($freeBytes < 5 * 1024 * 1024 * 1024) {
			$this->sendMessageToRasulbek("❗️❗️❗️5GB dan kam qoldi❗️❗️❗️");
		}
	}

	public function actionFormatSizeUnits($bytes)
	{
		if ($bytes >= 1073741824)
		{
			$bytes = number_format($bytes / 1073741824, 2) . ' GB';
		}
		elseif ($bytes >= 1048576)
		{
			$bytes = number_format($bytes / 1048576, 2) . ' MB';
		}
		elseif ($bytes >= 1024)
		{
			$bytes = number_format($bytes / 1024, 2) . ' KB';
		}
		elseif ($bytes > 1)
		{
			$bytes = $bytes . ' bytes';
		}
		elseif ($bytes == 1)
		{
			$bytes = $bytes . ' byte';
		}
		else
		{
			$bytes = '0 bytes';
		}

		return $bytes;
	}

	public function actionBackupRename($operatingSystem = 'ubuntu')
	{
		date_default_timezone_set('Asia/Tashkent');
		$this->actionFreeDisk();
		$bathFilePath = "/home/adham/data/backup-database/";
		if ($operatingSystem == 'windows') {
			$bathFilePath = "D:/data/backup-database/";
		}
		$baseFileName = "bts_postgres.tar";
		$backupFilePath = rtrim(rtrim($bathFilePath, '/'), 'backup-database') . $baseFileName;

		if (is_file($backupFilePath)) {
			$backupDate = date('Y-m-d', filemtime($backupFilePath));
			$backupDateDir = $bathFilePath . $backupDate . '/';
			$yesterdayDate = date('Y-m-d', strtotime('-1 day', strtotime($backupDate)));
			$yesterdayDateDir = null;
			$isDir = is_dir($backupDateDir);
			if (!$isDir) {
				$yesterdayDate = date('Y-m-d', strtotime('-1 day', strtotime($backupDate)));
				$yesterdayDateDir = $bathFilePath . $yesterdayDate . '/';
				FileHelper::createDirectory($backupDateDir, 0777);
			}
			$fileName = date("H:i", filemtime($backupFilePath));
			$fileName = str_replace(":", "-", $fileName);
			$fileName .= '.tar';
			$fileNamePath = $backupDateDir . $fileName;
			// $lastFileSize = $this->actionLastFileSize($bathFilePath, $backupDate);
			// $sizeFlag = true;
			// if ($lastFileSize > filesize($backupFilePath)) {
			// 	$sizeFlag = false;
			// }
			$result = copy($backupFilePath, $fileNamePath);
			if (!$result) {
				$this->sendMessageToChannel("Jurabek aka, Backup file rename bo'lmadi!!!");
			} else {
				$backupFileSize = $this->actionFormatSizeUnits(filesize($backupFilePath));
				$this->sendMessageToChannel($backupFileSize);
			}

			$this->actionDaysOfMonthCheckFolder($bathFilePath, $backupDate);
			$this->actionDaysOfYearCheckFolder($bathFilePath, $backupDate);

			if ($yesterdayDateDir and $result) {
				$this->actionYesterdayCheckFiles($yesterdayDateDir);
			}
		} else {
			$this->sendMessageToChannel("Jurabek aka, " . $baseFileName . " - mavjud emas!!!");
		}
	}

	public function actionLastFileSize($bathFilePath, $date)
	{
		$size = 0;
		$fileName = $this->actionFindLastFilePath($bathFilePath, $date);
		if (is_file($fileName)) {
			$size = filesize($fileName);
		}
		return $size;
	}

	public function actionFindLastFilePath($bathFilePath, $date)
	{
		$baseFileName = '';
		if (is_dir($bathFilePath)) {
			$folders = scandir($bathFilePath, 1);
			foreach ($folders as $key => $folder) {
				$tmpFolder = $bathFilePath . $folder . '/';
				if (is_dir($tmpFolder)) {
					if ($folder <= $date) {
						$files = scandir($tmpFolder, 1);
						foreach ($files as $key => $file) {
							$fileName = $tmpFolder . $file;
							if (is_file($fileName)) {
								$baseFileName = $fileName;
								break 2;
							}
						}
					}
				}
			}
		}
		return $baseFileName;
	}

	public function actionCreateFile($bathFilePath)
	{
		// $isDir = is_dir($bathFilePath);
		// if (!$isDir) {
		// 	FileHelper::createDirectory($bathFilePath, 0777);
		// }
		// date_default_timezone_set('Asia/Tashkent');
		// $flag = 1;
		// $inc = 0;
		// for ($i=0; $i < 24; $i++) {
		// 	$fileName = $i;
		// 	if ($fileName < 10) {
		// 		$fileName = '0' . $fileName;
		// 	}
		// 	if ($flag == 1) {
		// 		$fileName .= ':30';
		// 		$flag = 2;
		// 	} else {
		// 		$fileName .= ':25';
		// 		$flag = 1;
		// 	}
		// 	$fileName = str_replace(":", "-", $fileName);
		// 	$fileName .= ".tar";
		// 	$filePath = $bathFilePath . $fileName;
		// 	$file = fopen($filePath, "w") or die("Unable to open file!");
		// 	$txt = "$fileName\n";
		// 	fwrite($file, $txt);
		// 	fclose($file);
		// 	$inc++;
		// }
		// return $inc;
	}

	public function actionCreateFolderMonth($date)
	{
		// $bathFilePath = "D:/data/backup-database/";
		// $beginDayOfMonth = date('Y-m-01', strtotime($date));
		// $endDayOfMonth = date('Y-m-t', strtotime($date));
		// while ($beginDayOfMonth <= $endDayOfMonth) {
		// 	$folderPath = $bathFilePath . $beginDayOfMonth . "/";
		// 	if (!is_dir($folderPath)) {
		// 		FileHelper::createDirectory($folderPath, 0777);
		// 		$this->actionCreateFile($folderPath);
		// 	}
		// 	$beginDayOfMonth = date('Y-m-d', strtotime('+1 day', strtotime($beginDayOfMonth)));
		// }
		// echo "Created Folders and Files";
	}

	public function actionYesterdayCheckFiles($bathFilePath)
	{
		date_default_timezone_set('Asia/Tashkent');
		if (is_dir($bathFilePath)) {
			$files = scandir($bathFilePath);
			$countFiles = count($files);
			foreach ($files as $key => $file) {
				if (($key + 2) <= $countFiles) {
					$deletedFile = $bathFilePath . $file;
					if (is_file($deletedFile)) {
						unlink($deletedFile);
					}
				}
			}
		}
	}

	public function actionDaysOfMonthCheckFolder($bathFilePath, $date)
	{
		$beginDayOfMonth = date('Y-m-01', strtotime($date));
		$endDayOfMonth = date('Y-m-t', strtotime($date));
		$days = [];
		$inc  = 0;
		while ($beginDayOfMonth <= $endDayOfMonth) {
			$dayOfWeek = date('D', strtotime($beginDayOfMonth));
			if ($dayOfWeek == 'Sun' or $beginDayOfMonth == $endDayOfMonth) {
				$days[$inc] = $beginDayOfMonth;
				$inc++;
			}
			$beginDayOfMonth = date('Y-m-d', strtotime('+1 day', strtotime($beginDayOfMonth)));
		}
		$oldDate = $date;
		for ($i=1; $i <= 3; $i++) { 
			$oldDate = date('Y-m-d', strtotime("-$i day", strtotime($date)));
			if (!in_array($oldDate, $days)) {
				$days[$inc] = $oldDate;
				$inc++;
			}
		}
		$days[$inc] = $date;
		sort($days);

		$beginDayOfMonth = date('Y-m-01', strtotime($date));
		$endDayOfMonth = date('Y-m-t', strtotime($date));
		while ($beginDayOfMonth <= $endDayOfMonth) {
			if (!in_array($beginDayOfMonth, $days)) {
				if (is_dir($bathFilePath.$beginDayOfMonth)) {
					FileHelper::removeDirectory($bathFilePath.$beginDayOfMonth);
					// $this->actionDeleteFilesInFolder($bathFilePath . $beginDayOfMonth . "/");
					// rmdir($bathFilePath.$beginDayOfMonth);
				}
			}
			$beginDayOfMonth = date('Y-m-d', strtotime('+1 day', strtotime($beginDayOfMonth)));
		}
	}

	public function actionDeleteFilesInFolder($folder)
	{
		if (is_dir($folder)) {
			$files = scandir($folder);
			foreach ($files as $key => $file) {
				$deletedFile = $folder . $file;
				if (is_file($deletedFile)) {
					unlink($deletedFile);
				}
			}
		}
	}

	public function actionDaysOfYearCheckFolder($bathFilePath, $date)
	{
		$year = date('Y', strtotime($date));
		$mainMonth = date('m', strtotime($date));
		$months = [];
		for ($i=1; $i <= 12; $i++) { 
			$month = $i;
			if ($month < 10) {
				$month = "0".$month;
			}
			$month = (string)$month;
			if ($month < $mainMonth) {
				$beginDayOfMonth = "$year-$month-01";
				$endDayOfMonth = date("Y-m-t", strtotime($beginDayOfMonth));
				while ($beginDayOfMonth < $endDayOfMonth) {
					if (is_dir($bathFilePath.$beginDayOfMonth)) {
						FileHelper::removeDirectory($bathFilePath.$beginDayOfMonth);
						// $this->actionDeleteFilesInFolder($bathFilePath . $beginDayOfMonth . "/");
						// rmdir($bathFilePath.$beginDayOfMonth);
					}
					$beginDayOfMonth = date('Y-m-d', strtotime('+1 day', strtotime($beginDayOfMonth)));
				}
			}
		}
	}

	public function actionReturnNameFile($operatingSystem = 'ubuntu')
	{
		date_default_timezone_set('Asia/Tashkent');
		$bathFilePath = "/home/adham/data/backup-database/";
		if ($operatingSystem == 'windows') {
			$bathFilePath = "D:/data/backup-database/";
		}
		$files = scandir($bathFilePath, 1);
		$dirName = '';
		foreach ($files as $key => $dir) {
			if ($dirName) {
				continue;
			}
			if (is_dir($bathFilePath . '/' . $dir)) {
				if (empty($dirName)) {
					$dirName = $bathFilePath . $dir;
				}
			}
		}
		$dirName .= '/';
		$files = scandir($dirName, 1);
		$fileName = '';
		foreach ($files as $key => $file) {
			if ($fileName) {
				continue;
			}
			if (is_file($dirName . $file)) {
				if (empty($fileName)) {
					$fileName = $dirName . $file;
				}
			}
		}

		if ($fileName) {
			$filePath = $fileName;
			chmod($filePath, 0777);
			$command = 'sshpass -p "BtsExpress2023$" scp -r -P 22 ' . $filePath . ' user@185.74.6.112:/home/user/data/bts_postgres.tar';
			echo 'command: ' . $command . "\n";
			$output = shell_exec($command);
			$this->sendMessageToChannel("Backup DataBase Uzinfocom!!!");
		}
	}

    public function actionSendLastBackup($operatingSystem = 'ubuntu')
	{
		date_default_timezone_set('Asia/Tashkent');
		$bathFilePath = "/home/adham/data/backup-database/";
		if ($operatingSystem == 'windows') {
			$bathFilePath = "D:/data/backup-database/";
		}
		$files = scandir($bathFilePath, 1);
		$dirName = '';
		foreach ($files as $key => $dir) {
			if ($dirName) {
				continue;
			}
			if (is_dir($bathFilePath . '/' . $dir)) {
				if (empty($dirName)) {
					$dirName = $bathFilePath . $dir;
				}
			}
		}
		$dirName .= '/';
		$files = scandir($dirName, 1);
		$fileName = '';
		foreach ($files as $key => $file) {
			if ($fileName) {
				continue;
			}
			if (is_file($dirName . $file)) {
				if (empty($fileName)) {
					$fileName = $dirName . $file;
				}
			}
		}

		if ($fileName) {
			$filePath = $fileName;
			chmod($filePath, 0777);
			$command = 'sshpass -p "@Btsexpress#2009" scp -r -P 2022 ' . $filePath . ' administrator@195.158.24.30:/home/administrator/data/bts_postgres.tar';
			echo 'command: ' . $command . "\n";
			$output = shell_exec($command);
			$this->sendMessageToChannel("Backup DataBase MainOffice!!!");
		}
	}
}