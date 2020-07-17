#!/usr/bin/env bash

set -e
set -x

CURRENT_BRANCH="master"

function split()
{
    SHA1=`./bin/splitsh-lite --prefix=$1`
    git push $2 "$SHA1:refs/heads/$CURRENT_BRANCH" -f
}

function remote()
{
    git remote add $1 $2 || true
}

git pull origin $CURRENT_BRANCH

remote authentication git@github.com:laragle/authentication.git
remote authorization git@github.com:laragle/authorization.git
remote support git@github.com:laragle/support.git

split 'src/Laragle/Authentication' authentication
split 'src/Laragle/Authorization' authorization
split 'src/Laragle/Support' support