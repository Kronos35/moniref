#!/bin/bash
git add -A;
read -rsp $'Press enter to continue...\n'
git commit -m "UPDATE";
read -rsp $'Press enter to continue...\n'
git push;
read -rsp $'Press enter to continue...\n'
git pull;
read -rsp $'Press enter to continue...\n'