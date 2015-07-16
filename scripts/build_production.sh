if [[ "$PWD" != *scripts ]]; then
    echo "Please go to the scripts directory!"
    exit 0
fi
cd ..
grunt build

if [ ! -d production ]; then
    mkdir production
fi

cp -R sungaelee/* production/
rm -r production/scss
rm -r production/**/.DS_Store
