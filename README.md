drupal-ant
==========

Apache Ant build scripts for use with Drupal.

How to set up
=============

Alter the environment files to suit your system.

Using Jenkins;

* Add the Apache Ant plugin then create a new project
* The build will require a parameter for "Environment" (suggested to use 'choice' then use the environments provided)
* Poll your VCS for changes, the codebase will automatically be cloned to WORKSPACE
* Add a build step for "Invoke Ant" using the target "deploy"
* Under 'Advanced';
  * Add the location for the build.xml file
  * Add some global variables to be passed to the build script

Properties:

WORKSPACE=$WORKSPACE

BUILD_ID=$BUILD_ID
