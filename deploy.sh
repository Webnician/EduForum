#!/bin/bash
set -x

# Import the SSH deployment key
openssl aes-256-cbc -K $encrypted_22009518e18d_key -iv $encrypted_22009518e18d_iv -in deploys.enc -out deploys -d
rm deploys.enc # Don't need it anymore
chmod 600 deploys
mv deploys ~/.ssh/id_rsa

if [ $TRAVIS_BRANCH == 'master' ] ; then
    # Initialize a new git repo in _site, and push it to our server.
    cd _site
    git init

    git remote add deploy "ssh://deploy@107.170.53.95/var/repo/site.git"
    git config user.name "Travis CI"
    git config user.email "olafbroms@gmail.com"

    git add .
    git commit -m "Deploy"
    git push --force deploy master
else
    echo "Not deploying, since this branch isn't master."
fi