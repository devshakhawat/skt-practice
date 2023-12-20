echo "$(tput setaf 6)" &&

echo 'Building production version...' &&

npm run production
echo -ne 'Production version created......              (30%)\r'

rm -rf build
mkdir -p build/skt-practice #multiple folder creation

echo -ne 'Cleanup and building files started........            (40%)\r'

rsync -r --exclude '.git' --exclude '.svn' --exclude 'build' --exclude 'node_modules' --exclude 'dev' --exclude '.vscode' . build/skt-practice/

echo -ne 'Files copied............        (60%)\r'

rm -rf build/skt-practice/mix-manifest.json &&
rm -rf build/skt-practice/package.json &&
rm -rf build/skt-practice/package-lock.json &&
rm -rf build/skt-practice/webpack.mix.js &&
rm -rf build/skt-practice/.babelrc &&
rm -rf build/skt-practice/.gitignore &&
find . -type f -name '*.DS_Store' -ls -delete &&
rm -rf build/skt-practice/.AppleDouble &&
rm -rf build/skt-practice/.LSOverride &&
rm -rf build/skt-practice/.Trashes &&
rm -rf build/skt-practice/.AppleDB &&
rm -rf build/skt-practice/.idea &&
rm -rf build/skt-practice/build.sh &&
rm -rf build/skt-practice/yarn.lock &&
rm -rf build/skt-practice/composer.json &&
rm -rf build/skt-practice/composer.lock &&
rm -rf build/skt-practice/task.txt &&


rm -rf build/skt-practice/includes/integrations/assets/gutenberg-data/gutenberg-data-widget.js &&
rm -rf build/skt-practice/includes/integrations/assets/gutenberg-form/gutenberg-form-widget.js &&

find . -type f -name '*.LICENSE.txt' -ls -delete &&

echo -ne 'Creating skt-practice.zip file................    (80%)'

cd build
zip -r skt-practice.zip skt-practice/.
rm -r skt-practice

echo -ne 'Congratulations... Successfully done....................(100%)'

npm run development
echo -ne 'Development version restored....................(100%)\r'

echo "$(tput setaf 2)" &&
echo "Clean process completed!"
echo "$(tput sgr0)"