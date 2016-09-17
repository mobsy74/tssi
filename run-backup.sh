backupDir=/mnt/hgfs/server_files_3tb/high/Tom/code/home_code/game-web-code-backup
htmlDir=/var/www/html
tsDir=$htmlDir/ts
vampsDir=$htmlDir/game
currentDate=`date +%Y-%m-%d_%H-%M-%S`
newBackupName=backup-$currentDate
newBackupPath=$backupDir/$newBackupName

numBackups=`ls $backupDir | wc -l`

if [ $numBackups -gt 5 ]
then
	fileList=`ls -tr $backupDir | grep -v run-backup.sh`
	read -ra files <<< "$fileList"
	rm -rf $backupDir/"${files[0]}"
fi

mkdir $newBackupPath
cp -ar $tsDir $newBackupPath/. 2>/dev/null
cp -ar $vampsDir $newBackupPath/. 2>/dev/null