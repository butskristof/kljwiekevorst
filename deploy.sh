echo "Reading authentication variables"
REMOTE_USER=$(grep "^REMOTE_USER=" private/secrets/deploy.ini | cut -d'=' -f2-)
REMOTE_SERVER=$(grep "^REMOTE_SERVER=" private/secrets/deploy.ini | cut -d'=' -f2-)
REMOTE_PORT=$(grep "^REMOTE_PORT=" private/secrets/deploy.ini | cut -d'=' -f2-)
REMOTE_PATH=$(grep "^REMOTE_PATH=" private/secrets/deploy.ini | cut -d'=' -f2-)
LOCAL_PATH=www
EXCLUDE=vendor
cd $LOCAL_PATH || exit
rsync -arvz -e "ssh -p $REMOTE_PORT" --progress --delete . --exclude $EXCLUDE $REMOTE_USER@$REMOTE_SERVER:$REMOTE_PATH
ssh $REMOTE_USER@$REMOTE_SERVER -p $REMOTE_PORT "cd $REMOTE_PATH && composer install"
